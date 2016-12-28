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

        $this->Auth->allow(['search','getTicket','pembayaran', 'saveOrder']);
    }

    public function search($param = array()){

        $jadwal = TableRegistry::get('Schedules');



        $results = null;

        if ($this->request->is('post')) {
            $formData = $this->request->data;
            $this->request->session()->write('Ticket.search', $formData);

            $tgl = date('Y-m-d', strtotime($formData['tglKeberangkatan']));

            // debug($day);
            // die();

            // $results = $jadwal->find('all')
            //             ->where(['Schedules.route_id' => $formData['rute'],
            //                      'Schedules.day' => $day
            //                  ])
            //             ->contain(['Routes','Buses','TicketOrders']);

            $results = $this->Tickets->find('all',
                        [
                            'contain'=>['Schedules'=>['Routes'],'Buses'],
                            'conditions'=>['Tickets.route_id'=>$formData['rute'],
                                            'Tickets.date'=>$tgl

                                            ]
                        ]
                );

            if ($results->count()<1){
                $this->Flash->error(__('Tiket tidak ditemukan'));
            }
        }
        $this->set(compact('results','formData'));
    }

    public function getTicket(){
        if($this->request->is('post')){
            $formData = $this->request->data();

            // debug($formData);
            // die();

            $ticket = $formData['id'];

            // $ticketModel = TableRegistry::get('Tickets');
            // $jadwal = $ticketModel->get($id, [
            //     'contain' => ['Schedules','Buses']
            // ]);
            
            $this->request->Session()->write('Ticket.id', $ticket);
            $this->request->Session()->write('FormData', $formData);
            // $this->set(compact('jadwal','formData'));
            return $this->redirect(['controller'=>'Tickets','action'=>'order']);
        }
        return $this->redirect('/');
    }



    public function order(){
        if($this->request->Session()->read('Ticket.id')){
            $ticketId = $this->request->Session()->read('Ticket.id');
            $formData = $this->request->Session()->read('FormData');

            $ticket = $this->Tickets->get($ticketId,
                        [
                            'contain' => ['Schedules','Buses']
                    ]);
            
            // debug($ticket);
            $this->request->Session()->write('Ticket.ticket', $ticket);
            $this->set(compact('ticket','formData'));


            $orderModel = TableRegistry::get('TicketOrders');

            // cari ticket yang telah terjual
            //
            $soldTicket = $orderModel->find('all', [
                    'condition' => ['TicketOrders.ticket_id'=>$ticketId],
                    'contain' => ['TicketPassengers']
                ]);

            // cari kursi yang terlah terjual
            // berdasarkan tiket yang telah terjual
            $soldSeets = [];
            foreach ($soldTicket as $ticket) {
                $passegers = $ticket->ticket_passengers;
                foreach ($passegers as $passeger) {
                    $soldSeets[] = $passeger->seet_number;
                }
            }

            // debug($soldSeets);
            // die();
            // debug($ticket);

            // die();

            // $this->request->Session()->write('Ticket.sold', $soldTicket);
            $this->set(compact('soldSeets'));
        }
        else{
            return $this->redirect('/');
        }
    }

    public function payment(){
        if($this->request->is('post')){
            $formData = $this->request->data();
            $detail = [];

            // debug($formData);
            // die();


            // debug($formData);
            $ticketId = $formData['ticketId'];

            for ($i=0; $i < count($formData['penumpang']); $i++) { 
                $data['penumpang'][$i] = [
                                            'name' => $formData['penumpang'][$i+1]['name'],
                                            'gender' => $formData['penumpang'][$i+1]['gender'],
                                            'kursi' => $formData['kursi'][$i],
                                            ];
            }


            // debug($data);
            // die();



            $data['customer'] = $formData['customer'];


            $ticketModel = TableRegistry::get('Tickets');
            $ticket = $ticketModel->get($ticketId, [
                'contain' => ['Schedules'=>['Routes'],'Buses']
            ]);


            // $ticket = $ticket->toArray();
            // debug($ticket);
            // die();

            // debug($this->request->session()->read);
            // die();
            $session = $this->request->session()->read('Ticket.search');

            $data['rute'] = $ticket->schedule->route->name;
            $data['dari'] = $ticket->schedule->route->source;
            $data['tujuan'] = $ticket->schedule->route->destination;
            $data['tanggal'] = $session['tglKeberangkatan'];
            $data['jam_keberangkatan'] = $ticket->departure_time;
            $data['jam_kedatangan'] = $ticket->arival_time;
            // $data['distance'] = $jadwal->route->distance;
            $data['jumlah_penumpang'] = count($formData['penumpang']);
            $data['harga'] = $ticket->schedule->route->fare;
            $data['total'] = $ticket->schedule->route->fare * count($formData['penumpang']);
            $data['bus']['tipe'] = $ticket->bus->name;
            $data['bus']['nopol'] = $ticket->bus->plat_no;

            $this->request->session()->write('Ticket.detail', $data);


            // var_dump($data);
            // die();

            $this->set(compact('ticket','formData'));

            // debug($jadwal);
            // die();


        }
    }

    public function saveOrder(){
        $orderData = $this->request->Session()->read('Ticket.detail');
        $orderData1 = $this->request->Session()->read('Ticket.ticket');
        $formData = $this->request->data();

        // var_dump($formData);

        if(empty($orderData)){
            $this->Flash->error(__('Data tiket tidak ditemukan'));
        }

        // debug($orderData);

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
            'ticket_id' => $orderData1->id,
            'ticket_code' => 'BT0'.substr(number_format(time() * rand(),0,'',''),0,6),
            // 'create_at' => date('Y-m-d H:m:s'),
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
            $aa = $this->Tickets->get($orderData1->id);
            $stock = $aa->stock;
            $aa->stock = $stock - $orderData['jumlah_penumpang'];
            $this->Tickets->save($aa);
        }else{
            $this->Flash->error(__('Order tiket tidak dapat disimpan!'));
            return $this->redirect(['action' => 'order']);

        }

        // debug($aneh);

        $penumpangData = $orderData['penumpang'];

        $passegerTable = TableRegistry::get('TicketPassengers');
        foreach ($penumpangData as $dat) {
            $data = ['name' => $dat['name'], 'gender'=> $dat['gender'], 'ticket_order_id'=> $orderId,'seet_number'=>$dat['kursi']];
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
                'contain' => ['TicketPassengers','Customers','Tickets'=>['Schedules'=>['Routes'],'Buses']]
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
