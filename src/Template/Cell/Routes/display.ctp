<?php
	echo $this->Form->select('rute',$routes,
		array(
			'id'=>'rute-perjalanan',
			'class'=>'selectpicker',
			'title'=>'Pilih rute perjalanan'
			));
?>