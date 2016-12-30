<?php
$this->Html->addCrumb('Jadwal Keberangkatan Bus', '');
$this->assign('title', 'Daftar Penumpang Bus');

$gender = ['female'=>'P','male'=>'L'];

// debug($routes);

?>
<div id="printArea">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		  <div class="x_title">
	      	<a href='#' class="btn btn-warning btn-sm pull-right" onclick="reportPrint()"> Print</a>
		    <div class="clearfix"></div>
		  </div>

		<div class="table-responsive">
		<!-- <div class="row"> -->
			<div class="col-md-4">
				<dl class="dl-horizontal">
				  <dt>Tanggal Keberangkatan</dt><dd><?= date('d-M-Y',strtotime($ticket->date)) ?></dd>
				  <dt>Tipe Bus</dt><dd><?= $this->Bus->getLabel($ticket->bus->class)?></dd>
				  <dt>Kota Asal</dt><dd><?=$ticket->schedule->route->source?></dd>
				  <dt>Kota Tujuan</dt><dd><?=$ticket->schedule->route->destination?></dd>
				</dl>				
			</div>
			<div class="col-md-6">
				<dl class="dl-horizontal">
				  <dt>No.Pol Bus</dt><dd><?=$ticket->bus->plat_no?></dd>
				  <dt>Sopir</dt><dd>....</dd>
				  <dt>Kondekter</dt><dd>....</dd>
				</dl>								
			</div>
		<!-- </div> -->
		</div>
	  </div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		<div class="table-responsive">
		  <table class="table" id="tableRoutes">
	        <thead>
	            <tr>
	                <th scope="col">#</th>
	                <th scope="col">Nama Penumpang</th>
	                <th scope="col">L/P</th>
	                <th scope="col">No.Kursi</th>
	                <th scope="col">CP</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php $no = 1;?>
	            <?php foreach ($passengers as $person): ?>
	            <tr>
	                <td><?= $this->Number->format($no) ?></td>
	                <td><?= $person->name ?></td>
	                <td><?= $gender[$person->gender] ?></td>
	                <td>#<?= $person->seet_number ?></td>
	                <td><?= $person->ticket_order->customer->name.'('.$person->ticket_order->customer->phone.')';?></td>
	            </tr>
	            <?php $no++; ?>
	            <?php endforeach; ?>
	        </tbody>
		  </table>
		</div>
	  </div>
	</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function reportPrint(){
		var elm = document.getElementById('printArea').innerHtml;
		var content = document.body.innerHtml;

		document.body.innerHtml = elm;
		window.print();
		document.body.innerHtml = content;
	}
</script>