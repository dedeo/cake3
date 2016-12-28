<?php
namespace App\View\Helper;

use Cake\View\Helper;

class MydateHelper extends Helper
{
	private $days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

    public function getLabel($day)
    {
    	return $this->days[$day];
    }

    public function toOptionsArray(){
    	return $this->days;
    }
}