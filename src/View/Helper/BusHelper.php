<?php
namespace App\View\Helper;

use Cake\View\Helper;

class BusHelper extends Helper
{
	private $types = ['hight_class'=>'Hight Class Bus',
												'big_top'=>'Big Top',
												'bisnis'=>'Bisnis'
												];
    public function getLabel($type)
    {
    	return $this->types[$type];
    }

    public function toOptionsArray(){
    	return $this->types;
    }
}