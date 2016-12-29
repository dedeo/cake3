<?php
echo $this->Form->select('rute',$routes,[
		'id'=>'rute-perjalanan',
		'empty'=>'Pilih rute perjalanan',
		'title'=>'Pilih rute perjalanan',
		'required'=>true
	]);