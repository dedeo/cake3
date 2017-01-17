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
			<label for="startDate">Date Range:</label>
			<input type="text" name="daterange" value=""/>
			<button type='submit' class="btn btn-warning btn-sm"> Apply</button>
			<a href="#" onclick="reportPrint()" class="btn btn-warning btn-sm pull-right"> Print</a>
		</div>
		<?php echo $this->Form->end(); ?>	
		<div id="printArea" style="display:inline-block;margin-bottom:20px;color:#000;width:100%;box-sizing: border-box;">

		  	<?php if ($results) { ?>
		  	<span style="margin-bottom:10px;font-size:16px;color:#000;display:inline-block;width:100%;">Hasil: <?= $resultRange ?></span>
			<div style="display:inline-block;width:100%;padding:10px;background:#fff;box-sizing: border-box;">
			  <table style="border: 1px;font-size: 13px;width:100%;color:#000;border-collapse:collapse;box-sizing: border-box;">
				<thead>
				  <tr>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">#</th>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">Rute</th>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">Bus</th>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">Terjual/Stock</th>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">Tanggal Tiket</th>
					<th style="text-align:left;border:1px solid #000;padding:10px;font-size:13px;">Pendapatan</th>
				  </tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach ($results as $result) { ?>
					<tr>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $i ?></td>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $this->Html->link($result->route,['action'=>'ticketBus',$result->ticket_id],['style'=>'color:#000;text-decoration:none;']) ?></td>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $this->Html->link($result->busname,['action'=>'ticketBus',$result->ticket_id],['style'=>'color:#000;text-decoration:none;']) ?></td>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= ($result->stock - $result->sell).'/'.$result->stock ?></td>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $result->date ?></td>
						<td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">Rp <?= $result->earning?></td>
					</tr>
					<?php $i++;?>
					<?php }?>
				</tbody>
			  </table>
			</div>
		  	<?php } ?> 
		</div>
	</div>
	<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; display: none"></iframe>
</div>

<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('input[name="daterange"]').daterangepicker();
		$('input[name="datesingle"]').daterangepicker({
	        singleDatePicker: true,
	        showDropdowns: true
	    });
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