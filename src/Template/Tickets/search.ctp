<?php
	$dataResult = $results->toArray();

	//debug($results->getData());
?>
<body class="hasil-pencarian">
	<div class="toogle-menu">
		<a href="#" class="toogle-menu-a"><h1>Ganti Pencarian Ticket <i class="fa fa-caret-down" aria-hidden="true"></i></h1></a>
		<div class="search-form search-top">
			<?= $this->element('search'); ?>
		</div>
	</div>
	<div class="hasil-pencarian-content row">
		<div class="top-info col-sm-12 row">
			<div class="rute-info col-sm-8">Hasil Pencarian: <?php //$results->route->name ?></div>
			<div class="date-info col-sm-4"><i class="fa fa-calendar" aria-hidden="true"></i>01 Des 2016</div>
		</div>
		<div class="result-search">
		<?php if($results->count()){ ?>
			<table>
				<thead>
					<tr>
						<th>Bus</th>
						<th>Tipe</th>
						<th>Berangkat</th>
						<th>Kapasitas</th>
						<th colspan="2">Tarif</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($results as $ticket) { ?>
					<tr>
						<td class="search-img">
							<?= $this->Html->image('slider-img/slider1.jpg', ['alt' => 'search-img']);?>
						</td>
						<td class="search-tipe">
							<span>Hight Class Bus</span>
							Fasilitas<br>
							<?php $fasilitas = unserialize($ticket->bus->facilities); ?>
							<?php foreach ($fasilitas as $item) { ?>
								- <?= $item ?><br>
							<?php } ?>
						</td>
						<td class="search-time">
							<span><?= $this->Time->format($ticket->departure_time,'HH:mm'); ?></span>
							Lama Perjalanan: <br>
							<?php $duration = date_diff($ticket->arival_time, $ticket->departure_time); ?>
							<?= $duration->h.' jam, '.$duration->i.' menit'; ?>
						</td>
						<td class="search-capacity">
							<span>12/</span>28
						</td>
						<td class="search-price">
							<span><?= $this->Number->currency($ticket->route->fare,'IDR'); ?></span>
						</td>
						<td class="search-order">
							<a href="#" class="order-button"><i class="fa fa-tag" aria-hidden="true"></i> Pesan</a>
						</td>
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