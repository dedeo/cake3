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
	                <th scope="col">No.Kursi</th>
	                <th scope="col">Nama Penumpang</th>
	                <th scope="col">L/P</th>
	                <th scope="col">CP</th>
	                <th scope="col">Harga</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php 
	        	$nSeet = $ticket->bus->capacity;
	        	$_seets = array_fill(1, $nSeet,null);		//create an empty array seets as much as bus capacity

	        	foreach ($passengers as $person) {
	        		$seet_number = $person->seet_number;
	        		$_seets[$seet_number] = $person;
	        	}
	        	$i = 1;
	        	$total = 0;
	            foreach ($_seets as $seet): ?>
		            <?php if(!empty($seet)): ?>
			            <tr>
			                <td><?= $seet->seet_number ?></td>
			                <td><?= $seet->name ?></td>
			                <td><?= $gender[$seet->gender] ?></td>
			                <td><?= $seet->ticket_order->customer->name.'('.$person->ticket_order->customer->phone.')';?></td>
			                <td><?= $seet->ticket_order->fare?></td>
			            </tr>
			        <?php $total += $seet->ticket_order->fare; ?>
			        <?php else:?>
			            <tr>
			                <td><?=$i?></td><td></td><td></td><td></td><td></td>
			            </tr>
			        <?php endif ?>
			    	<?php $i++; ?>
	            <?php endforeach; ?>
	            <tr>
	            	<td colspan="4"><strong>Total</strong></td>
	            	<td>Rp <?php echo $total;?></td>
	            </tr>
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