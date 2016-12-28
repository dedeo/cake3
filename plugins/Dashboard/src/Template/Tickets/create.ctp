<?php
$this->Html->addCrumb('Routes', '');
$this->assign('title', $title);

//debug($allTickets->toArray());

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php foreach ($allTickets as $allTicket) {?>
					<table>
						<tr>
							<th>Tanggal berlaku</th><td>: <?php echo $this->Time->format($allTicket->date,'dd MMM Y');?></td>
						</tr>
						<tr>
							<th>Hari Keberangkatan</th><td>: <?php echo $this->MyDate->getLabel($allTicket->schedule->day); ?></td>
						</tr>
						<tr>
							<th>Rute Perjalanan</th><td>: <?php echo $allTicket->schedule->route_name;?></td>
						</tr>
						<tr>
							<th>No Polisi Bus</th><td>: <?php echo $allTicket->bus->plat_no; ?></td>
						</tr>
						<tr>
							<th>Berangkat Pukul</th><td>: <?php echo $this->Time->format($allTicket->departure_time, 'HH:mm'); ?></td>
						</tr>
						<tr>
							<th>Sampai Pukul</th><td>: <?php echo $this->Time->format($allTicket->arival_time,'HH:mm'); ?></td>
						</tr>
					</table>
					<br>
				<?php } ?>
			</div>
		</div>
	</div>
</div>