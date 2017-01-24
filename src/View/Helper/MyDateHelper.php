<?php
namespace App\View\Helper;

use Cake\View\Helper;

class MydateHelper extends Helper
{
	private $days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
	private $month = ['','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

	public function getLabel($day)
    {
    	return $this->days[$day];
    }

    public function toOptionsArray(){
    	return $this->days;
    }

    public function formatDate($date,$format = null){

    	$date = strtotime($date);

    	$w = date('w', $date);
    	$d = date('d', $date);
    	$m = date('n', $date);
    	$y = date('Y', $date);

    	if($format=='full'){
    		return $this->days[$w].', '.$d.' '.$this->month[$m].' '.$y;
    	}
    	return $d.' '.$this->month[$m].' '.$y;

    }
}