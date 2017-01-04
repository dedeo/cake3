<?php
$this->Html->addCrumb('Jadwal Keberangkatan Bus', '');
$this->assign('title', 'Daftar Penumpang Bus');

$gender = ['female'=>'P','male'=>'L'];

// debug($routes);

?>
<a href='#' class="btn btn-warning btn-sm pull-right" onclick="reportPrint()"> Print</a>
<div id="printArea" style="display:inline-block;margin-bottom:20px;color:#000;">
	<div style="display:inline-block;width:100%;background:#fff;padding:15px;margin-bottom:10px;border:1px solid #000;box-sizing: border-box;">
		<div style="display:inline-block;width:50%;float:left;">
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Tgl Keberangkatan</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ' .date('d-M-Y',strtotime($ticket->date)) ?></div>
			</div>
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Tipe Bus</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ' .$this->Bus->getLabel($ticket->bus->class)?></div>
			</div>
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Kota Asal</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ' .$ticket->schedule->route->source?></div>
			</div>
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Kota Tujuan</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ' .$ticket->schedule->route->destination?></div>
			</div>			
		</div>
		<div style="display:inline-block;width:50%;float:left;">
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">No.Pol Bus</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ' .$ticket->bus->plat_no?></div>
			</div>
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Sopir</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ....'?></div>
			</div>
			<div style="display:inline-block;width:100%;">
				<div style="width:150px;float:left;text-align:left;font-weight:bold;">Kondektur</div>
				<div style="width:150px;float:left;text-align:left;clear:right;"><?= ' : ....'?></div>
			</div>								
		</div>
	</div>
	<div style="display:inline-block;width:100%;padding:10px 0px;background:#fff;">
	<table id="tableRoutes" style="width:100%;border-collapse:collapse;box-sizing: border-box;color:#000;">
		<thead>
		    <tr>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">Kursi</th>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">Penumpang</th>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">Code Tiket</th>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">L/P</th>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">CP</th>
		        <th scope="col" style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;">Harga</th>
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
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $seet->seet_number ?></td>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $seet->ticket_order->customer->name?></td>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $seet->ticket_order->ticket_code ?></td>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $gender[$seet->gender] ?></td>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $person->ticket_order->customer->phone;?></td>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?= $seet->ticket_order->fare?></td>
		            </tr>
		        <?php $total += $seet->ticket_order->fare; ?>
		        <?php else:?>
		            <tr>
		                <td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"><?=$i?></td><td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"></td><td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"></td><td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"></td><td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"></td><td style="padding:10px;text-align:left;font-size:13px;border:1px solid #000;"></td>
		            </tr>
		        <?php endif ?>
		    	<?php $i++; ?>
		    <?php endforeach; ?>
		    <tr>
		    	<td colspan="5" style="padding:10px;text-align:left;font-size:15px;border:1px solid #000;"><strong>Total</strong></td>
		    	<td style="padding:10px;text-align:left;font-size:15px;border:1px solid #000;"><strong>Rp <?php echo $total;?></strong></td>
		    </tr>
		</tbody>
	</table>
	</div>
</div>

<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; display: none"></iframe>
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