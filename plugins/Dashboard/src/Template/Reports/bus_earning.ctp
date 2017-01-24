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
					<a href='#' class="btn btn-primary btn-sm pull-right" onclick="reportPrint()"> Print</a>
					<a href='bus-earning' class="btn btn-warning btn-sm pull-right"> Reset</a>
					<button class="btn btn-success btn-sm pull-right" type="submit"> Tampilkan</a>
                <?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_content">
			<div id="printArea" class="table-responsive" style="display:inline-block;margin-bottom:20px;color:#000;width:100%;">
				<table class="table" id="busReportTable" style="width:100%;border-collapse:collapse;box-sizing: border-box;color:#000;">
                  <thead>
                    <tr>
                      <th style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;">#</th>
                      <th style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;">Bus</th>
                      <th style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;">Tgl Keberangkatan</th>
                      <th style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;">Pendapatan</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php $i=1;?>
					<?php $sum=0?>
					<?php foreach ($results as $result) { ?>
					<tr>
						<td style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;"><?= $i ?></td>
						<td style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;"><?= $result->busname ?></td>
						<td style="padding:5px;text-align:left;font-size:12px;border:1px solid #000;"><?= $this->MyDate->formatDate($result->date,'full') ?></td>
						<td style="padding:5px;text-align:right;font-size:12px;border:1px solid #000;">
							<?php 
							$total = $result->earning; 
							$sum +=$total;?>
						<?php echo number_format($total);?></td>
					</tr>
					<?php $i++;?>
					<?php }?>
					<tr>
						<td style="padding:5px;text-align:right;font-size:12px;border:1px solid #000;" colspan="3">Total Pendapatan :</td>
						<td style="padding:5px;text-align:right;font-size:12px;border:1px solid #000;"><strong>Rp <?= number_format($sum) ?></strong></td>
					</tr>
				  </tbody>
                </table>
			</div>			  
		  </div>
		</div>
	</div>
</div>

<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; display: none"></iframe>
<?php 
	echo $this->Html->script([
		'Dashboard.jquery.dataTables.min',
		'Dashboard.dataTables.bootstrap.min',
		'Dashboard.dataTables.custom',		
		'Dashboard.dataTables.buttons.min'],['block'=>'script']);
?>
<script type="text/javascript">
	function reportPrint(){
		var content = document.getElementById("printArea");
		var pri = document.getElementById("ifmcontentstoprint").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
</script>
<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('input[name="daterange"]').daterangepicker();
		$('#busReportTable').dataTable();
	});
<?php $this->Html->scriptEnd(); ?>