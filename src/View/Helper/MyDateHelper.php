<?php
namespace App\View\Helper;

use Cake\View\Helper;

class MydateHelper extends Helper
{
	private $days = [1=>'Senin',2=>'Selasa',3=>'Rabu',4=>'Kamis',5=>'Jumat',6=>'Sabtu',7=>'Minggu'];

    public function getLabel($day)
    {
    	return $this->days[$day];
    }

    public function toOptionsArray(){
    	return $this->days;
    }
}