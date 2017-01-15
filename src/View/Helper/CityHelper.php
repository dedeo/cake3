<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CityHelper extends Helper
{
    private $_cities = null;

    public function getName($cityId)
    {
        if($this->_cities==null){
            $this->_setCities();
        }
        return $this->_cities[$cityId];
    }

    public function toOptionsArray(){
        return $this->_cities;
    }

    public function getCityList(){
        if($this->_cities==null){
            $this->_setCities();
        }
    	return $this->_cities;
    }

    private function _setCities(){
        return $this->_cities = $this->request->Session()->read('Cities.list');
    }

}