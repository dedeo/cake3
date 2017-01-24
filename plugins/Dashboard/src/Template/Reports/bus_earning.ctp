<?php
$this->Html->addCrumb('Report', '');
$this->assign('title', 'Laporan Pendapatan Tiap Bus');
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Filter Data</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<?php echo $this->Form->create('bus-report',['class'=>'form-inline'])?>
				<!-- <form class="form-inline"> -->
                  <div class="form-group col-sm-4">
                    <!-- <label for="ex3">Bus</label> -->
                    <?= $this->Form->input('busid',[
                    			'label'=>'Bus',
                    			'options'=>$this->Bus->getBusList(),
                    			'class'=>"form-control",
                    			'empty'=>'-Pilih Bus-',
                    			// 'block'=>'aaa'
                    			])?>
                  </div>
				  <div class="form-group">
                    <div class="controls">
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" style="width: 200px" name="daterange" id="daterange" class="form-control active" value="">
                      </div>
                    </div>
                  </div>
					<a href='#' class="btn btn-primary btn-sm pull-right"> Cetak</a>
					<a href='bus-earning' class="btn btn-success btn-sm pull-right"> Reset</a>
					<button class="btn btn-general btn-sm pull-right" type="submit"> Tampilkan</a>
                <?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_content">
			<div class="table-responsive">
				<table class="table" id="busReportTable">
                  <thead>
                    <tr>
                      <th>#</th><th>Bus</th><th>Tgl Keberangkatan</th><th>Pendapatan</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php $i=1;?>
					<?php $sum=0?>
					<?php foreach ($results as $result) { ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $result->ticket->bus->name ?></td>
						<td><?= $this->MyDate->formatDate($result->departure_date,'full') ?></td>
						<td style="text-align: right;">
							<?php 
							$total = $result->total; 
							$sum +=$total;?>
						<?php echo number_format($total);?></td>
					</tr>
					<?php $i++;?>
					<?php }?>
					<tr>
						<td style="text-align: right;" colspan="3">Total Pendapatan :</td>
						<td style="text-align: right;"><strong>Rp <?= number_format($sum) ?></strong></td>
					</tr>
				  </tbody>
                </table>
			</div>			  
		  </div>
		</div>
	</div>
</div>
<?php 
	echo $this->Html->script([
		'Dashboard.jquery.dataTables.min',
		'Dashboard.dataTables.bootstrap.min',
		'Dashboard.dataTables.custom',		
		'Dashboard.dataTables.buttons.min'],['block'=>'script']);
?>
<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('input[name="daterange"]').daterangepicker();
		$('#busReportTable').dataTable();
	});

	function reportPrint(){
		var content = document.getElementById("printArea");
		var pri = document.getElementById("ifmcontentstoprint").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
<?php $this->Html->scriptEnd(); ?>