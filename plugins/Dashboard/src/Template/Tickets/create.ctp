<?php
$this->Html->addCrumb('Routes', '');
$this->assign('title', $title);

// debug($schedule);

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href='#' class="btn btn-warning btn-sm pull-right" id="saveBtn">Simpan</a>
				<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table>
					<tr>
						<th>Hari Keberangkatan</th><td>: <?php echo $this->MyDate->getLabel($schedule->day) ?></td>
					</tr>
					<tr>
						<th>Rute Perjalanan</th><td>: <?php echo $schedule->route->name ;?></td>
					</tr>
					<tr>
						<th>No Polisi Bus</th><td>: <?php echo $schedule->bus->plat_no; ?></td>
					</tr>
					<tr>
						<th>Berangkat Pukul</th><td>: <?php echo $this->Time->format($schedule->departure_time, 'HH:mm'); ?></td>
					</tr>
					<tr>
						<th>Sampai Pukul</th><td>: <?php echo $this->Time->format($schedule->arival_time,'HH:mm'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>