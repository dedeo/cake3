<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReportsController extends AppController
{
    public $helpers = array('Bus');

    public function initialize(){
    	parent::initialize();
        $this->loadModel('TicketOrders');
    }

    public function index()
    {

    }

    public function busEarning()
    {
        $this->set('title','Laporan Pendapatan Bus/Armada');
        $results = null;
        $options = [];

        if(!$this->request->is('post')){

            $curentYear = date('Y', strtotime('now'));
            $current = strtotime('this month');
            $last = strtotime('last month');

            $d1 = 19;//date('d', strtotime('19'));
            $m1 = date('m', $last);
            $y1 = date('Y', $last);

            $d2 = 20;//date('d', strtotime('19'));
            $m2 = date('m', $current);
            $y2 = date('Y', $current);

            $startDate = date('Y-m-d', strtotime($d1.'-'.$m1.'-'.$y1));
            $endDate = date('Y-m-d', strtotime($d2.'-'.$m2.'-'.$y2));

            // $options['fields']      = [
            //                 'earning'=>'sum(TicketOrders.total)',
            //                 'busname'=>'Buses.name',
            //                 'departure_date'=>'TicketOrders.departure_date',
            //         ];
            $options['contain']     =['Tickets'=>['Buses']];
            $options['conditions']  = [
                            'TicketOrders.departure_date >='=>$startDate,
                            'TicketOrders.departure_date <='=>$endDate
                        ];
            // $options['group'] = ['Buses.name'];

        }else{

            //filter data aktif
            $formData = $this->request->data;

            if(empty($formData['busid']) || empty($formData['daterange'])){
                $this->Flash->error(__('Bus atau tanggal belum dipilih'));
                return $this->redirect(['action'=>'busEarning']);
            }

            // 'daterange' => '12/01/2016 - 12/29/2016'
            $tglrange = split(' - ', $formData['daterange']);

            $startDate = date('Y-m-d', strtotime($tglrange[0]));
            $endDate = date('Y-m-d', strtotime($tglrange[1]));

            // $options['fields']      = [
            //                 'earning'=>'sum(TicketOrders.total)',
            //                 'busname'=>'Buses.name',
            //                 'departure_date'=>'TicketOrders.departure_date',
            //         ];
            $options['contain']     =['Tickets'=>['Buses']];
            $options['conditions']  = [
                            'Tickets.bus_id'=>$formData['busid'],            
                            'TicketOrders.departure_date >='=>$startDate,
                            'TicketOrders.departure_date <='=>$endDate
                        ];
            // $options['group'] = ['Buses.name'];

        }

        $results = $this->TicketOrders->find('all', $options);

        // debug($results->toArray());
        // debug($results);
        // die();

        $this->set(compact('results'));
    }

    public function ticketBus($ticketId=null){
        if($ticketId){
            $ticketModel = $this->loadModel('Tickets');
            $ticket = $ticketModel->get($ticketId,[
                    'contain'=>['Routes','Buses','TicketOrders'=>['Customers']]
                ]);

            $orderModel = $this->loadModel('TicketOrders');
            $orders = $orderModel->find('all',[
                    'contain'=>['Tickets','Customers'],
                    'conditions'=>['Tickets.id'=>$ticketId],
                    'order' => ['TicketPassengers.seet_number' => 'ASC']
                ]);
        }
        $this->set(compact('ticket','passengers'));
    }

    public function ticketSales()
    {
        $this->set('title','Laporan Penjualan Tiket Bus/Armada');
        $results = null;

        if($this->request->is('post')){
            $formData = $this->request->data;

            if(empty($formData['daterange'])) {
                $this->Flash->error(__('Bus atau tanggal belum dipilih'));
                return $this->redirect(['action'=>'ticketSales']);
            }

            /////////////////////////////////////////////////////////////////////
            // sampe data
            // formData = 
            // 'buses' => [
            //  (int) 0 => '1',
            //  (int) 1 => '2',
            //  (int) 2 => '3'
            // ],
            // 'daterange' => '12/01/2016 - 12/29/2016'
            $resultRange = $formData['daterange'];

            $tglrange = explode(' - ', $formData['daterange']);

                $startDate = date('Y-m-d', strtotime($tglrange[0]));
                $endDate = date('Y-m-d', strtotime($tglrange[1]));

            $ticketModel = TableRegistry::get('TicketOrders');
            $results = $ticketModel->find('all',[
                    'fields' => [
                            'id'=>'TicketOrders.id',
                            'ticket_id'=>'TicketOrders.ticket_id',
                            'earning'=>'sum(TicketOrders.total)',
                            'route'=>'Routes.name',
                            'stock'=>'Buses.capacity',
                            'sell'=>'Tickets.stock',
                            'busname'=>'Buses.name',
                            'date'=>'Tickets.date'],
                    'contain'=>['Tickets'=>['Buses','Routes'],'Customers'],
                    'conditions'=>[
                            // 'Tickets.bus_id IN'=>$formData['buses'],
                            'TicketOrders.departure_date >='=>$startDate,
                            'TicketOrders.departure_date <='=>$endDate
                            ],
                    'group' =>['date', 'busname']
                ]);
        }
        $this->set(compact('results','resultRange'));
    }

    // public function ticketSales()
    // {
    // 	$this->set('title','Laporan Penjualan Tiket');
    // 	$results = null;

    // 	if($this->request->is('post')){
    // 		$formData = $this->request->data;
    		
    // 		$tglrange = split(' - ', $formData['daterange']);

    // 		// if($tglrange[0]==$tglrange[1]){
    // 			$startDate = date('Y-m-d', strtotime($tglrange[0]));
    // 			$endDate = date('Y-m-d', strtotime($tglrange[1]));
    // 		// }else{
    // 		// 	$startDate = date('Y-m-d 00:00:00', strtotime($tglrange[0]));
    // 		// 	$endDate = date('Y-m-d 23:59:59', strtotime($tglrange[1]));    			
    // 		// }

    // 		$ticketModel = TableRegistry::get('TicketOrders');
    // 		$results = $ticketModel->find('all',[
    // 				// 'contain'=>['Tickets'=>['Schedules'=>['Buses']]]
    // 				// 'contain'=>['Tickets.Schedules.Buses'=> function ($q) {
				// 		  //       return $q->where(['Buses.id' => $formData['buses']]);
    // 				// 		}]
    // 				'fields' => [
    // 						'earning'=>'sum(TicketOrders.total)',
    // 						'route'=>'Schedules.route_name',
    // 						'date'=>'TicketOrders.date_create_at'
    // 						],
    // 				'contain'=>['Tickets'=>['Schedules']],
    // 				'conditions'=>[
    // 						'Tickets.route_id IN'=>$formData['routes'],
    // 						'TicketOrders.date_create_at >='=>$startDate,
    // 						'TicketOrders.time_create_at <='=>$endDate
    // 						],
    // 				'group' =>['TicketOrders.date_create_at']
    // 			]);
    // 	}
    // 	$this->set(compact('results'));    	
    // }    

}
