<?php
$this->Html->addCrumb('Report', '');
$this->assign('title', $title);
// debug($results->toArray());
?>
<hr>
<div class="row">			
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $this->Form->create('report'); ?>
		<div class="selection-report" style="padding:10px;">
			<label for="startDate">Bus/Armada:</label>
			<?php 
			echo $this->Form->select('routes',$this->Routes->getRouteList(),['multiple'=>'true'])

			?>
		</div>
		<div class="selection-report" style="padding:10px;">
			<label for="startDate">Date Range:</label>
			<input type="text" name="daterange" value=""/>
			<button type='submit' class="btn btn-warning btn-sm pull-right"> Apply</button>
			<a href="#" onclick="harianPrint()" class="btn btn-warning btn-sm pull-right"> Print</a>
		</div>
		<?php echo $this->Form->end(); ?>	
		<div class="x_panel">
		  <div class="x_content">
		  	<?php if ($results) { ?>
			<div class="table-responsive">
			  <table class="table" id="tableRoutes" style="border: 1px;font-size: 12px;width:100%;">
				<thead>
				  <tr class="headings">
					<th class="column-title">#</th>
					<th class="column-title">Rute</th>
					<!-- <th class="column-title">Tanggal</th> -->
					<!-- <th class="column-title">Rute</th> -->
					<!-- <th class="column-title">Jumlah Penumpang</th> -->
					<th class="column-title">Tanggal</th>
					<th class="column-title">Pendapatan</th>
				  </tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach ($results as $result) { ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $result->route ?></td>
						<td><?= $result->date ?></td>
						<td>Rp <?= $result->earning?></td>
					</tr>
					<?php $i++;?>
					<?php }?>
				</tbody>
			  </table>
			</div>
		  	<?php } ?> 
		  </div>
		</div>
	</div>
</div>

<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('input[name="daterange"]').daterangepicker();
		$('input[name="datesingle"]').daterangepicker({
	        singleDatePicker: true,
	        showDropdowns: true
	    });
	});

	function harianPrint(){
		var content = document.getElementById("report-harian");
		var pri = document.getElementById("ifmcontentharian").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	};

	function bulananPrint(){
		var content = document.getElementById("report-bulanan");
		var pri = document.getElementById("ifmcontentbulanan").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
<?php $this->Html->scriptEnd(); ?>