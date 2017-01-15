<?php
	if(!empty($results)){
		$dataResult = $results->toArray();
	}

	$searchParam = $this->request->session()->read('Search.params');


?>
<body class="hasil-pencarian">
	<div class="toogle-menu">
		<a href="#" class="toogle-menu-a"><h1>Ganti Pencarian Ticket <i class="fa fa-caret-down" aria-hidden="true"></i></h1></a>
		<div class="search-form search-top">
		<?php echo $this->Form->create('ticket'); ?>
			<?= $this->element('search'); ?>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="hasil-pencarian-content row">
		<div class="top-info col-sm-12 row">
			<div class="rute-info col-sm-8">Hasil Pencarian: <?php echo $searchParam['route']['name']; ?></div>
			<div class="date-info col-sm-4">
				<i class="fa fa-calendar" aria-hidden="true"></i><?= $this->Time->format($searchParam['date'],'dd MMM Y') ?>
				</div>
		</div>
		<div class="result-search">
		<?php if(!empty($results)){ ?>
			<table>
				<thead>
					<tr>
						<th>Bus</th>
						<th>Tipe</th>
						<th>Berangkat</th>
						<th>Tersedia/Kapasitas</th>
						<th colspan="2">Tarif</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($results as $schedule) { ?>
					<tr>
						<form action="<?php echo $this->Url->build(['controller'=>'Tickets','action'=>'getTicket']) ?>" method="POST">
							<?php 
								// debug($schedule->id);
								// debug(empty($schedule->tickets));
								if(!empty($schedule->has_tickets)){
									echo $this->Form->hidden('ticket',['value'=>true]);
									echo $this->Form->hidden('ticket_id',['value'=>$schedule->has_tickets->id]);			
									echo $this->Form->hidden('schedule_id',['value'=>$schedule->id]);			
								}else{ 
									echo $this->Form->hidden('ticket',['value'=>false]);
									echo $this->Form->hidden('schedule_id',['value'=>$schedule->id]);			
								} 
							?>
							<?= $this->Form->hidden('jmlPenumpang',['value'=>$formData['jmlPenumpang']]) ?>	
							<?= $this->Form->hidden('tglKeberangkatan',['value'=>$formData['tglKeberangkatan']]) ?>			
							<td class="search-img">
								<?= $this->Html->image('bus.jpg', ['alt' => 'search-img']);?>
								<span class="plat-no"><?= $schedule->bus->plat_no;?></span>
							</td>
							<td class="search-tipe">
								<span><?=$this->Bus->getLabel($schedule->bus->class)?></span>
								Fasilitas<br>
								- AC <br>
								- Selimut <br>
								- Bantal
							</td>
							<td class="search-time">
								<span><?= $this->Time->format($schedule->departure_time,'HH:mm'); ?></span>
								Lama Perjalanan: <br>
								<?php $duration = date_diff($schedule->arival_time, $schedule->departure_time); ?>
								<?= $duration->h.' jam, '.$duration->i.' menit'; ?>
							</td>
							<td class="search-capacity">
								<span>
								<?php if($schedule->has_tickets){
										echo $schedule->availabel_sheet;
									}else{
										echo $schedule->bus->capacity;
									}
								?>
								</span>

								/<?=$schedule->bus->capacity?>
								<!-- <span>12/</span>28 -->
							</td>
							<td class="search-price">
								<span><?= $this->Number->currency($schedule->fare,'IDR'); ?></span>
							</td>
							<td class="search-order">
								<button type="submit" class="order-button"><i class="fa fa-tag" aria-hidden="true"></i> Pesan</button>
							</td>
						</form>
					</tr>
				<?php } ?>			
				</tbody>
			</table>
			<?php }else{ ?>
			<p>Tiket tidak ditemukan</p> 
			<?php } ?>
		</div>
	</div>
</body>
<?php
	//debug($dataResult);
	// sampel data resutl
	// (int) 0 => object(App\Model\Entity\Ticket) {

	// 	'id' => (int) 9,
	// 	'schedule_id' => (int) 1,
	// 	'route_id' => (int) 11,
	// 	'create_at' => object(Cake\I18n\FrozenTime) {

	// 		'time' => '2016-12-27T09:37:16+00:00',
	// 		'timezone' => 'UTC',
	// 		'fixedNowTime' => false
		
	// 	},
	// 	'departure_time' => object(Cake\I18n\FrozenTime) {

	// 		'time' => '2016-12-27T07:00:00+00:00',
	// 		'timezone' => 'UTC',
	// 		'fixedNowTime' => false
		
	// 	},
	// 	'date' => object(Cake\I18n\FrozenDate) {

	// 		'time' => '2016-12-30T00:00:00+00:00',
	// 		'timezone' => 'UTC',
	// 		'fixedNowTime' => false
		
	// 	},
	// 	'arival_time' => object(Cake\I18n\FrozenTime) {

	// 		'time' => '2016-12-27T10:00:00+00:00',
	// 		'timezone' => 'UTC',
	// 		'fixedNowTime' => false
		
	// 	},
	// 	'fare' => '170000',
	// 	'stock' => '28',
	// 	'bus_id' => (int) 5,
	// 	'passegers' => null,
	// 	'bus' => object(App\Model\Entity\Bus) {

	// 		'id' => (int) 5,
	// 		'name' => 'DP 7879 GW',
	// 		'class' => 'hight_class',
	// 		'plat_no' => 'DP 7879 GW',
	// 		'facilities' => 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantak";}',
	// 		'capacity' => (int) 28,
	// 		'status' => '1',
	// 		'[new]' => false,
	// 		'[accessible]' => [
	// 			'*' => true
	// 		],
	// 		'[dirty]' => [],
	// 		'[original]' => [],
	// 		'[virtual]' => [],
	// 		'[errors]' => [],
	// 		'[invalid]' => [],
	// 		'[repository]' => 'Buses'
		
	// 	},
	// 	'schedule' => object(App\Model\Entity\Schedule) {

	// 		'id' => (int) 1,
	// 		'day' => (int) 5,
	// 		'route_id' => (int) 11,
	// 		'route_name' => '0',
	// 		'bus_id' => (int) 5,
	// 		'departure_time' => object(Cake\I18n\FrozenTime) {

	// 			'time' => '2016-12-27T07:00:00+00:00',
	// 			'timezone' => 'UTC',
	// 			'fixedNowTime' => false
			
	// 		},
	// 		'arival_time' => object(Cake\I18n\FrozenTime) {

	// 			'time' => '2016-12-27T10:00:00+00:00',
	// 			'timezone' => 'UTC',
	// 			'fixedNowTime' => false
			
	// 		},
	// 		'create_at' => object(Cake\I18n\FrozenTime) {

	// 			'time' => '2016-12-08T19:56:30+00:00',
	// 			'timezone' => 'UTC',
	// 			'fixedNowTime' => false
			
	// 		},
	// 		'route' => object(App\Model\Entity\Route) {

	// 			'id' => (int) 11,
	// 			'name' => 'SUKAMAJU - MAKASAR',
	// 			'source' => 'SUKAMAJU',
	// 			'destination' => 'MAKASAR',
	// 			'distance' => (int) 32,
	// 			'fare' => (int) 170000,
	// 			'create_at' => object(Cake\I18n\Time) {

	// 				'time' => '2017-01-02T23:14:12+00:00',
	// 				'timezone' => 'UTC',
	// 				'fixedNowTime' => false
				
	// 			},
	// 			'[new]' => false,
	// 			'[accessible]' => [
	// 				'*' => true
	// 			],
	// 			'[dirty]' => [],
	// 			'[original]' => [],
	// 			'[virtual]' => [],
	// 			'[errors]' => [],
	// 			'[invalid]' => [],
	// 			'[repository]' => 'Routes'
			
	// 		},
	// 		'[new]' => false,
	// 		'[accessible]' => [
	// 			'*' => true
	// 		],
	// 		'[dirty]' => [],
	// 		'[original]' => [],
	// 		'[virtual]' => [],
	// 		'[errors]' => [],
	// 		'[invalid]' => [],
	// 		'[repository]' => 'Schedules'
		
	// 	},
	// 	'[new]' => false,
	// 	'[accessible]' => [
	// 		'*' => true
	// 	],
	// 	'[dirty]' => [],
	// 	'[original]' => [],
	// 	'[virtual]' => [],
	// 	'[errors]' => [],
	// 	'[invalid]' => [],
	// 	'[repository]' => 'Tickets'
	
	// },	