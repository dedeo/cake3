<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReportsController extends AppController
{
    public $helpers = array('Bus');

    public function initialize(){
    	parent::initialize();
    }

    public function index()
    {

    }

    public function busEarning()
    {
    	$this->set('title','Laporan Pendapatan Bus/Armada');
    	$results = null;

    	if($this->request->is('post')){

    		$formData = $this->request->data;
    		// formData = 
			// 'buses' => [
			// 	(int) 0 => '1',
			// 	(int) 1 => '2',
			// 	(int) 2 => '3'
			// ],
			// 'daterange' => '12/01/2016 - 12/29/2016'

    		$tglrange = split(' - ', $formData['daterange']);

    		// if($tglrange[0]==$tglrange[1]){
    			$startDate = date('Y-m-d', strtotime($tglrange[0]));
    			$endDate = date('Y-m-d', strtotime($tglrange[1]));
    		// }else{
    		// 	$startDate = date('Y-m-d 00:00:00', strtotime($tglrange[0]));
    		// 	$endDate = date('Y-m-d 23:59:59', strtotime($tglrange[1]));    			
    		// }

    		$ticketModel = TableRegistry::get('TicketOrders');
    		$results = $ticketModel->find('all',[
    				// 'contain'=>['Tickets'=>['Schedules'=>['Buses']]]
    				// 'contain'=>['Tickets.Schedules.Buses'=> function ($q) {
						  //       return $q->where(['Buses.id' => $formData['buses']]);
    				// 		}]
    				'fields' => [
    						'earning'=>'sum(TicketOrders.total)',
    						'busname'=>'Buses.name',
    						'date'=>'TicketOrders.date_create_at'],
    				'contain'=>['Tickets'=>['Schedules'=>['Buses']]],
    				'conditions'=>[
    						'Schedules.bus_id IN'=>$formData['buses'],
    						'TicketOrders.date_create_at >='=>$startDate,
    						'TicketOrders.date_create_at <='=>$endDate
    						],
    				'group' =>['TicketOrders.date_create_at']
    			]);
    	}
    	$this->set(compact('results'));
    }

    public function ticketSales()
    {
    	$this->set('title','Laporan Penjualan Tiket');
    	$results = null;

    	if($this->request->is('post')){
    		$formData = $this->request->data;
    		
    		$tglrange = split(' - ', $formData['daterange']);

    		// if($tglrange[0]==$tglrange[1]){
    			$startDate = date('Y-m-d', strtotime($tglrange[0]));
    			$endDate = date('Y-m-d', strtotime($tglrange[1]));
    		// }else{
    		// 	$startDate = date('Y-m-d 00:00:00', strtotime($tglrange[0]));
    		// 	$endDate = date('Y-m-d 23:59:59', strtotime($tglrange[1]));    			
    		// }

    		$ticketModel = TableRegistry::get('TicketOrders');
    		$results = $ticketModel->find('all',[
    				// 'contain'=>['Tickets'=>['Schedules'=>['Buses']]]
    				// 'contain'=>['Tickets.Schedules.Buses'=> function ($q) {
						  //       return $q->where(['Buses.id' => $formData['buses']]);
    				// 		}]
    				'fields' => [
    						'earning'=>'sum(TicketOrders.total)',
    						'route'=>'Schedules.route_name',
    						'date'=>'TicketOrders.date_create_at'
    						],
    				'contain'=>['Tickets'=>['Schedules']],
    				'conditions'=>[
    						'Tickets.route_id IN'=>$formData['routes'],
    						'TicketOrders.date_create_at >='=>$startDate,
    						'TicketOrders.time_create_at <='=>$endDate
    						],
    				'group' =>['TicketOrders.date_create_at']
    			]);
    	}
    	$this->set(compact('results'));    	
    }    

}
