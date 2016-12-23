<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;

use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class TicketsController extends AppController
{
    public $helpers = array('Bus');

    public function initialize(){
        parent::initialize();

        $this->Auth->allow(['search','order','pembayaran', 'saveOrder']);
    }

    public function search($param = array()){

        $jadwal = TableRegistry::get('Schedules');

        $results = null;

        if ($this->request->is('post')) {
            $formData = $this->request->data;
            $this->request->session()->write('Ticket.search', $formData);

            $day = date('N', strtotime($formData['tglKeberangkatan']));

            $results = $jadwal->find('all')
                        ->where(['Schedules.route_id' => $formData['rute'],
                                 'Schedules.day' => $day
                             ])
                        ->contain(['Routes','Buses','TicketOrders']);

            if ($results->count()<1){
                $this->Flash->error(__('Tiket tidak ditemukan'));
            }
        }
        $this->set(compact('results','formData'));
    }

    public function order(){
        if($this->request->is('post')){
            $formData = $this->request->data();

            $id = $formData['id'];

            $schedules = TableRegistry::get('Schedules');
            $jadwal = $schedules->get($id, [
                'contain' => ['Routes','Buses']
            ]);
            
            $this->request->session()->write('Ticket.order', $jadwal);
            $this->set(compact('jadwal','formData'));
        }   
    }

    public function payment(){
        if($this->request->is('post')){
            $formData = $this->request->data();
            $detail = [];

            $scheduleId = $formData['scheduleId'];

            $data['penumpang'] = $formData['penumpang'];
            $data['customer'] = $formData['customer'];

            // debug($formData);

            $schedules = TableRegistry::get('Schedules');
            $jadwal = $schedules->get($scheduleId, [
                'contain' => ['Routes','Buses']
            ]);

            // $jadwal = $jadwal->toArray();

            // debug($this->request->session()->read);
            // die();
            $session = $this->request->session()->read('Ticket.search');

            $data['rute'] = $jadwal->route->name;
            $data['dari'] = $jadwal->route->source;
            $data['tujuan'] = $jadwal->route->destination;
            $data['tanggal'] = $session['tglKeberangkatan'];
            $data['jam_keberangkatan'] = $jadwal->departure_time;
            $data['jam_kedatangan'] = $jadwal->arival_time;
            // $data['distance'] = $jadwal->route->distance;
            $data['jumlah_penumpang'] = count($formData['penumpang']);
            $data['harga'] = $jadwal->route->fare;
            $data['total'] = $jadwal->route->fare * count($formData['penumpang']);
            $data['bus']['tipe'] = $jadwal->bus->name;
            $data['bus']['nopol'] = $jadwal->bus->plat_no;

            $this->request->session()->write('Ticket.detail', $data);


            // var_dump($data);
            // die();

            $this->set(compact('jadwal','formData'));

            // debug($jadwal);
            // die();


        }
    }

    public function saveOrder(){
        $orderData = $this->request->session()->read('Ticket.detail');
        $orderData1 = $this->request->session()->read('Ticket.order');
        $formData = $this->request->data();

        // var_dump($formData);

        if(empty($orderData)){
            $this->Flash->error(__('Data tiket tidak ditemukan'));
        }

        //
        // save customer first, and get customer id;
        //
        $customerData = $orderData['customer'];
        $customerTable = TableRegistry::get('Customers');
        $customer = $customerTable->newEntity();
        $customer = $customerTable->patchEntity($customer, $customerData);
        $customer = $customerTable->newEntity($customerData);

        if($customerTable->save($customer)){
            $customerId = $customer->id;
        }else{
            $this->Flash->error(__('Data kustomer tidak dapat disimpan!'));
        }

        //
        // then save the ordered ticket detail
        // get ordered ticket id

        $orderTable = TableRegistry::get('TicketOrders');
        // $lastId = $orderTable->getID();
        // $code = sprintf("%'.6d\n",$lastId);
        // debug($this->_getNextId());
        // die();


        $ticketData = [
            'customer_id' => $customerId,
            'schedule_id' => $orderData1->id,
            'ticket_code' => 'BT0'.substr(number_format(time() * rand(),0,'',''),0,6),
            'create_at' => date('Y-m-d H:m:s'),
            'departure_time' => $orderData['jam_keberangkatan']->i18nFormat('HH:mm:ss'),
            'departure_date' => date('Y-m-d',strtotime($orderData['tanggal'])),
            'arival_time' => $orderData['jam_kedatangan']->i18nFormat('HH:mm:ss'),
            'arival_date' => date('Y-m-d',strtotime($orderData['tanggal'])),
            'passegers'  => $orderData['jumlah_penumpang'],
            'fare' => $orderData['harga'],
            'total' => $orderData['total'],
            ];

        // var_dump($ticketData);
        // die();

        $order = $orderTable->newEntity();

        // echo 'aaaaa'.$order->id;
        // die();

        $order = $orderTable->patchEntity($order, $ticketData);
        $order = $orderTable->newEntity($ticketData);

        if($aneh = $orderTable->save($order)){
            $orderId = $order->id;
        }else{
            $this->Flash->error(__('Order tiket tidak dapat disimpan!'));
        }

        // debug($aneh);

        $penumpangData = $orderData['penumpang'];

        $passegerTable = TableRegistry::get('TicketPassengers');
        foreach ($penumpangData as $dat) {
            $data = ['name' => $dat['name'], 'gender'=> $dat['gender'], 'ticket_order_id'=> $orderId];
            $penumpang = $passegerTable->newEntity();
            $penumpang = $passegerTable->patchEntity($penumpang, $data);
            $penumpang = $passegerTable->newEntity($data);
            
            $save = $passegerTable->save($penumpang);

            // debug($save);
        }

        $this->request->session()->write('MyTicket',$order);
        // $this->set('orderId',$orderId);
        return $this->redirect(['action' => 'orderSummary']);
    }

    // public function 

    public function orderSummary(){

        $_ticket = $this->request->session()->read('MyTicket');
        $ticket = null;

        if(!empty($_ticket)){
            $ticketOrderTable = TableRegistry::get('TicketOrders');
            $ticket = $ticketOrderTable->find('all',[
                'conditions' => ['TicketOrders.id' => $_ticket->id],
                'contain' => ['TicketPassengers','Customers','Schedules'=>['Routes','Buses']]
            ]);

            $ticket = $ticket->first();

            $this->set('ticket', $ticket);
            $this->set(compact($ticket));
            
        }else{
            $this->Flash->error(__('Ticket summary kosong!.'));
        }


        // if($this->request->is('post')){
        //     $formData = $this->request->data();

        //     $scheduleId = $formData['scheduleId'];
 
        //     // debug($formData);

        //     // foreach ($formData as $key => $value) {
        //     //     $split = explode('_', $key);
        //     //     $data[$split[0]][$split[1]] = $value;
        //     // }

        //     // debug($data);
            
        //     foreach ($data as $key => $value) {
        //         if($key!='customer' && $key!='scheduleId'){
        //             $passeger[]=$value;
        //         }
        //     }
            
        //     //debug($passeger);
        //     $scheduleId = 5;
        //     $customer = ['name' => 'nama1','phone' => '8111122233','email' => 'hallo@gmail.com'];
        //     $passeger = [['name' => 'nama1','gender' => 'female','seet_number'=>'1'],
        //                     ['name' => 'nama2','gender' => 'male','seet_number'=>'2'],
        //                     ['name' => 'nama3','gender' => 'male','seet_number'=>'3'],
        //                     ['name' => 'nama4','gender' => 'male','seet_number'=>'4']
        //                 ];            
        //     // die();

        //     // $id = $formData['id'];

        //     // $schedules = TableRegistry::get('Schedules');
        //     // $jadwal = $schedules->get($id, [
        //     //     'contain' => ['Routes','Buses']
        //     // ]);
            
        //     // $this->set(compact('jadwal','formData'));
        // }   
    }

    private function _getNextId(){
        $dataSourceObject = ConnectionManager::get('default'); // $connectionName can be 'default'        
        $dbname = $dataSourceObject->config()['database'];

        $orderTable = TableRegistry::get('TicketOrders');
        $result = $orderTable->query("SELECT `AUTO_INCREMENT` FROM `information_schema`.`TABLES` AS NextId  WHERE TABLE_NAME='ticket_orders' AND TABLE_SCHEMA='$dbname'");
        // return $result[0]['NextId']['Auto_increment'];        
        return $result->toArray();        
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Avatars']
        ]);

        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $avatars = $this->Customers->Avatars->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'avatars'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // public function login() {
    //     if ($this->request->is('post')) {
    //         $user = $this->Auth->identify();
    //         if ($user) {
    //             $this->Auth->setUser($user);
    //             return $this->redirect($this->Auth->redirectUrl());
    //         }
    //         $this->Flash->error(__('Invalid username or password, try again'));
    //     }
    // }

    // public function logout() {
    //     return $this->redirect($this->Auth->logout());
    // }


}
