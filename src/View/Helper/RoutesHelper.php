<?php
namespace App\View\Helper;

use Cake\View\Helper;

class RoutesHelper extends Helper
{
    private $_routes = null;

    public function getLabel($route)
    {
        if($this->_routes == null){
            $this->_setRoutes();
        }
    	return $this->_routes[$route];
    }

    public function toOptionsArray(){

        if($this->_routes == null){
            $this->_setRoutes();
        }
        return $this->_routes;
    }

    public function getRouteList(){

        if($this->_routes == null){
            $this->_setRoutes();
        }
        return $this->_routes;
    }


    private function _setRoutes(){
        return $this->_routes = $this->request->Session()->read('Routes.list');
    }

}