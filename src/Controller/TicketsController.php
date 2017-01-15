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

        $this->loadModel('Schedules');
        $this->loadModel('Routes');

    }

    public function search($param = array()){

        $results = null;

        if ($this->request->is('post')) {
            $formData = $this->request->data;

            $date = date('Y-m-d', strtotime($formData['tglKeberangkatan']));
            $day = date('w', strtotime($formData['tglKeberangkatan']));
            $passeger = $formData['jmlPenumpang'];

            $route = $this->loadModel('Routes')->get($formData['rute']);

            /* if selected route has parent, get real route id */
            // if($route->parent_route!=0){
            //     $realRouteId = $route->parent_route;

            //     $realRoute = $this->Routes->get($route->parent_route);
            //     $route->real_route = $realRoute;

            // }else{
            //     $realRouteId = $route->id;
            // }

            $realRouteId = $this->_getRealRoute($route->id);
            $route->real_route = $realRouteId;

            $param['route']     = $route->toArray();
            $param['date']      = $date; 
            $param['passeger']  = $passeger; 

            /* save search parameter into session */
            $this->request->session()->write('Search.params', $param);
            // debug($route->parent_route);

            /* find schedule contain selected route */
            $schedules = $this->Schedules->find('all',
                        [
                            'contain'=>['Routes','Buses'],
                            'conditions'=>['Schedules.route_id'=>$formData['rute'],
                                            'Schedules.day'=>$day
                                            ]
                        ]
                );

            // debug($realRouteId);
            // die();

            if(!$schedules->isEmpty()){

                /* is there any ticket for each schedule? */
                foreach ($schedules as $schedule) {
                    $tickets = $this->Tickets->find('all',[
                                    'conditions'=>['route_id'=>$realRouteId, 'date'=>$date, 'bus_id'=>$schedule->bus_id]
                                    // 'conditions'=>['route_id'=>$schedule->route_id, 'date'=>$date]
                                // ByScheduleIdAndDate($schedule->id,$date);
                                ])->first();

                    // debug($tickets->toArray());

                    if(!empty($tickets)){
                        $schedule->has_tickets = $tickets;
                        $schedule->availabel_sheet = $tickets->stock;
                    }
                }
                // debug($tickets->toArray());
                // debug($schedules->toArray());
                // die();


                // if($tickets->isEmpty()){

                    // echo 'kosong mas';
                    
                    /* create new ticket
                     */

                    // foreach ($schedulesId as $scheduleId) {
                    //     $schedule = $this->Schedules->get($schedulesId,[
                    //             'contain'=>['Routes','Buses']
                    //         ]);

                    //     $dataTicket[] = [
                    //         'schedule_id'   => $schedule->id ,
                    //         'route_id'  => $schedule->route_id,
                    //         'date_create_at'    => date('Y-m-d H:m:s',strtotime('now')),
                    //         'departure_time'    => date('H:m:s', strtotime($schedule->departure_time)),
                    //         'date'  =>  date('Y-m-d',strtotime($tgl)),
                    //         'arival_time'   =>  date('H:m:s', strtotime($schedule->arival_time)),
                    //         'stock' => $schedule->bus->capacity,
                    //         'bus_id'    => $schedule->bus_id,
                    //     ];
                    // }

                    // $newTickets = $this->Tickets->newEntities($dataTicket);

                    // foreach ($newTickets as $newTicket) {
                    //     $save = $this->Tickets->save($newTicket);
                    // }

                    // $newTickets;

                // }
    
                // $routes = $ruteParent;
                // $results = $this->Tickets->find('all',[
                //         'conditions'=>['Tickets.route_id IN'=>$routeId],
                //         'contain'=>['Buses','Routes']
                //     ]);
                // $routes = $newTickets;
                $results = $schedules;
                $this->request->session()->write('Search.results',$results->toArray());
                // $this->request->session()->write('Search.params', $formData);

            }
        }
        $this->set(compact('results','routes','formData'));
    }

    public function getTicket(){
        if($this->request->is('post')){
            $formData = $this->request->data();
            // $tgl = $formData['tglKeberangkatan'];
            // debug($formData);
            // die();

            if($formData['ticket']){
                $ticketId = $formData['ticket_id'];
                $scheduleId = $formData['schedule_id'];

                $schedule = $this->Schedules->get($scheduleId,[
                        'contain'=>['Routes','Buses']
                    ]);
            }else{
                /* create new ticket */
                $scheduleId = $formData['schedule_id'];

                $schedule = $this->Schedules->get($scheduleId,[
                        'contain'=>['Routes','Buses']
                    ]);

                $searchParams = $this->request->session()->read('Search.params');

                $dataTicket = [
                    // 'schedule_id'   => $schedule->id,
                    'route_id'  => $searchParams['route']['real_route'],
                    'date_create_at'    => date('Y-m-d',strtotime('now')),
                    'departure_time'    => date('H:m:s', strtotime($schedule->departure_time)),
                    'date'  =>  date('Y-m-d',strtotime($searchParams['date'])),
                    'arival_time'   =>  date('H:m:s', strtotime($schedule->arival_time)),
                    'stock' => $schedule->bus->capacity,
                    'bus_id'    => $schedule->bus_id,
                ];
                $newTicket = $this->Tickets->newEntity();
                $newTicket = $this->Tickets->patchEntity($newTicket,$dataTicket);


                // debug($newTicket);
                // debug($dataTicket);
                // die();
                if($save = $this->Tickets->save($newTicket)){
                    $ticketId = $save->id;
                }
                else{
                    debug($save);
                }
                // die();
            }

            $ticket = $this->Tickets->get($ticketId,[
                    'contain'=>['Buses','Routes']
                ]);
            
            $this->request->Session()->write('Order.ticket', $ticket);
            $this->request->Session()->write('Order.schedule', $schedule);
            $this->request->Session()->write('FormData', $formData);
            // $this->set(compact('jadwal','formData'));
            return $this->redirect(['controller'=>'Tickets','action'=>'order']);
        }
        return $this->redirect('/');
    }



    public function order(){
        if($ticket = $this->request->Session()->read('Order.ticket')){
            $formData = $this->request->Session()->read('FormData');

            /* cari ticket yang telah terjual */
            $this->loadModel('TicketOrders');
            $soldTicket = $this->TicketOrders->find('all', [
                    'conditions' => ['TicketOrders.ticket_id'=>$ticket->id],
                ]);

            /*
             cari kursi yang terlah terjual
             berdasarkan tiket yang telah terjual
            */
            $soldSeets = [];
            if(!$soldTicket->isEmpty()){
                foreach ($soldTicket as $sold) {
                    $sheets = explode(',', $sold->sheet);
                    $soldSeets = array_merge($soldSeets,$sheets);
                }
            }

            // debug($sheets);
            // debug($soldSeets);
            // die();
            // debug($ticket);
            // die();

            $this->request->Session()->write('Order.data', $formData);
            $this->set(compact('soldSeets','formData','ticket'));
        }
        else{
            return $this->redirect('/');
        }
    }

    public function payment(){
        if($this->request->is('post')){
            $formData = $this->request->data();

            $this->request->session()->write('Order.customer', $formData);
            $detail = [];

            // debug($formData);
            $ticketId = $formData['ticketId'];

            $data['customer'] = $formData['customer'];

            // $ticket = $this->Tickets->get($ticketId, [
            //     'contain' => ['Schedules'=>['Routes'],'Buses']
            // ]);

            $ticket = $this->request->session()->read('Order.ticket');
            $schedule = $this->request->session()->read('Order.schedule');
            $orderData = $this->request->session()->read('Order.data');

            $data['rute'] = $ticket->route->name;
            $data['dari'] = $ticket->route->source;
            $data['tujuan'] = $ticket->route->destination;
            $data['tanggal'] = $orderData['tglKeberangkatan'];
            $data['jam_keberangkatan'] = $ticket->departure_time;
            $data['jam_kedatangan'] = $schedule->arival_time;
            // $data['distance'] = $jadwal->route->distance;
            $data['jumlah_penumpang'] = $orderData['jmlPenumpang'];
            $data['harga'] = $schedule->fare;
            $data['total'] = $schedule->fare * $orderData['jmlPenumpang'];
            $data['bus']['tipe'] = $ticket->bus->name;
            $data['bus']['nopol'] = $ticket->bus->plat_no;

            // var_dump($session);
            // var_dump($data);
            // die();

            $this->request->session()->write('Order.payment', $data);



            $this->set(compact('ticket','data'));

            // debug($jadwal);
            // die();


        }
    }

    public function saveOrder(){
        $data = $this->request->Session()->read('Order.data');
        $ticket = $this->request->Session()->read('Order.ticket');
        $customer = $this->request->Session()->read('Order.customer');
        $schedule = $this->request->Session()->read('Order.schedule');
        $payment = $this->request->Session()->read('Order.payment');
        // $summary = $this->request->Session()->read('Order.summary');
        $formData = $this->request->data();

        // var_dump($formData);

        if(empty($ticket) AND empty($customer) AND empty($schedule) ){
            $this->Flash->error(__('Order tiket kosong'));
        }

        // $this->loadModel('Customers');
        // $customer = $this->Customers->newEntity();
        // $customer = $customerTable->patchEntity($customer, $customerData);
        // $customer = $customerTable->newEntity($customerData);

        // if($customerTable->save($customer)){
        //     $customerId = $customer->id;
        // }else{
        //     $this->Flash->error(__('Data kustomer tidak dapat disimpan!'));
        // }

        //
        // then save the ordered ticket detail
        // get ordered ticket id

        // $orderTable = TableRegistry::get('TicketOrders');
        // $lastId = $orderTable->getID();
        // $code = sprintf("%'.6d\n",$lastId);
        // debug($this->_getNextId());
        // die();


        $month = date('m',strtotime($ticket->date));
        $scheduleCode = $schedule->id;

        $orderData = [
            'ticket_id'         => $ticket->id,
            'ticket_code'       => 'BT'.$month.$scheduleCode.substr(number_format(time() * rand(),0,'',''),0,4),
            'date_create_at'    => date('Y-m-d',strtotime('now')),
            'time_create_at'    => date('H:m:s',strtotime('now')),
            // 'departure_time'    => date('H:m:s',$schedule->departure_time),
            'departure_time'    => $schedule->departure_time->i18nFormat('HH:mm:ss'),
            'departure_date'    => date('Y-m-d',strtotime($ticket->date)),
            'arival_time'       => $schedule->arival_time->i18nFormat('HH:mm:ss'),
            'arival_date'       => date('Y-m-d',strtotime($ticket->date)),
            'passegers'         => $data['jmlPenumpang'],
            'fare'              => $payment['harga'],
            'total'             => $payment['total'],
            'destination'       => $payment['tujuan'],
            'sheet'             => implode(',', $customer['kursi']),
            'customer'          => $payment['customer'],
            ];

        $this->loadModel('TicketOrders');
        $newOrder = $this->TicketOrders->newEntity($orderData, [
                'assosiated' => ['Customers']
            ]);

        if($save = $this->TicketOrders->save($newOrder)){
            // $orderId = $order->id;
            $ticket = $this->Tickets->get($ticket->id);
            $stock = $ticket->stock;
            $ticket->stock = $stock - $data['jmlPenumpang'];
            $this->Tickets->save($ticket);

            $result = $save;
        }else{
            $this->Flash->error(__('Order tiket tidak dapat disimpan!'));
            return $this->redirect(['action' => 'order']);

        }


        // debug($result);

        // die();
        // $order = $orderTable->newEntity();

        // echo 'aaaaa'.$order->id;
        // die();

        // $order = $orderTable->patchEntity($order, $ticketData);
        // $order = $orderTable->newEntity($ticketData);

        // if($aneh = $orderTable->save($order)){
        //     $orderId = $order->id;
        //     $aa = $this->Tickets->get($orderData1->id);
        //     $stock = $aa->stock;
        //     $aa->stock = $stock - $orderData['jumlah_penumpang'];
        //     $this->Tickets->save($aa);
        // }else{
        //     $this->Flash->error(__('Order tiket tidak dapat disimpan!'));
        //     return $this->redirect(['action' => 'order']);

        // }

        // // debug($aneh);

        // $penumpangData = $orderData['penumpang'];

        // $passegerTable = TableRegistry::get('TicketPassengers');
        // foreach ($penumpangData as $dat) {
        //     $data = ['name' => $dat['name'], 'gender'=> $dat['gender'], 'ticket_order_id'=> $orderId,'seet_number'=>$dat['kursi']];
        //     $penumpang = $passegerTable->newEntity();
        //     $penumpang = $passegerTable->patchEntity($penumpang, $data);
        //     $penumpang = $passegerTable->newEntity($data);
            
        //     $save = $passegerTable->save($penumpang);

        //     // debug($save);
        // }

        $this->request->session()->write('MyTicket',$result);
        // $this->set('orderId',$orderId);
        return $this->redirect(['action' => 'orderSummary']);
    }

    // public function 

    public function orderSummary(){

        $_ticket = $this->request->session()->read('MyTicket');
        // $ticket = null;

        if(!empty($_ticket)){
            $this->loadModel('TicketOrders');
            $ticket = $this->TicketOrders->find('all',[
                'conditions' => ['TicketOrders.id' => $_ticket->id],
                'contain' => ['Customers','Tickets']
            ]);

        //     $ticket = $ticket->first();

            $this->set('ticket', $ticket);
            $this->set(compact($ticket));
            
        }else{
            $this->Flash->error(__('Ticket summary kosong!.'));
        }
    }

    private function _getNextId(){
        $dataSourceObject = ConnectionManager::get('default'); // $connectionName can be 'default'        
        $dbname = $dataSourceObject->config()['database'];

        $orderTable = TableRegistry::get('TicketOrders');
        $result = $orderTable->query("SELECT `AUTO_INCREMENT` FROM `information_schema`.`TABLES` AS NextId  WHERE TABLE_NAME='ticket_orders' AND TABLE_SCHEMA='$dbname'");
        // return $result[0]['NextId']['Auto_increment'];        
        return $result->toArray();        
    }

    public function check(){
        $result = null;
        $error = null;
        if($this->request->is('post')){
            $code = $this->request->data['kode_tiket'];
            if(!empty($code)){
                $this->loadModel('TicketOrders');
                $ticket = $this->TicketOrders->findByTicketCode($code)
                            ->contain(['TicketPassengers','Customers','Tickets'=>['Schedules'=>['Routes'],'Buses']])
                            ->first();

                if($ticket==null){
                    $error = 'Kode tidak ditemukan, silahkan periksa kembali';
                }
            }else{
                $error='Kode tiket tidak valid';
            }
        }
        $this->set(compact('ticket','error'));
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


    protected function _getRealRoute($routeId){
        $route = $this->Routes->get($routeId);

        if($route->parent_route!=0){
            $parent = $this->Routes->get($route->parent_route);
            return $parent->id;
        }else{
            return $route->id;
        }

    }

}
