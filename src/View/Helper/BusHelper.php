<?php
namespace App\View\Helper;

use Cake\View\Helper;

class BusHelper extends Helper
{
    private $_buses = null;

	private $types = [
        'hight_class'=>'Hight Class Bus',
        'big_top'=>'Big Top',
        'sleeper_seat'=>'Sleeper Seat',
	];

    private $capacity = [
        'hight_class' => 28,
        'big_top'=> 21,
        'sleeper_seat'=> 18,
        ];

    public function getLabel($type)
    {
        return $this->types[$type];
    }

    public function getCapacity($type=null)
    {
        if($type==null){
            return $this->capacity;
        }
        return $this->capacity[$type];
    }

    public function toOptionsArray(){
        return $this->types;
    }

    public function getBusList(){
        if($this->_buses==null){
            $this->_setBuses();
        }
    	return $this->_buses;
    }

    private function _setBuses(){
        return $this->_buses = $this->request->Session()->read('Buses.list');
    }

}