<body class="ticket-summary">
<?php debug($ticket) ?>
<?php if (!empty($ticket)) { ?>
	<div class="ticket-print" id='ticket-content'>
		<h1><?=$ticket->ticket_code ?></h1>
		<h4>Detail Tiket</h4>
		<table class="table">
			<thead>
				<th>Jadwal Keberangkatan</th>
			</thead>
				<tbody>
				<tr>
				<td>
					<?=$ticket->schedule->route->name; ?><br>
					<?=$ticket->schedule->bus->plat_no; ?>
				</td>
				<td>
					Keberangkatan: <?=$ticket->departure_date->i18nFormat('d MMM Y') ?><br>
					<?=$ticket->departure_time->i18nFormat('HH:mm:ss') ?>
				</td>
				<td>
					Tiba: <?=$ticket->arival_date->i18nFormat('d MMM Y') ?><br>
					<?=$ticket->arival_time->i18nFormat('HH:mm:ss') ?>
				</td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Penumpang</th>
			</thead>
			<tbody>
			<?php $penumpang = $ticket->ticket_passengers ?>
			<?php foreach ($penumpang as $data) { ?>
				<tr>
				<td>
					<?=$data->name; ?><br>
				</td>
				<td>
					<?=$data->gender; ?>
				</td>
				<td>
					Nomor Kursi: #<?=$data->seet_number; ?>
				</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Kustomer</th>
			</thead>
			<tbody>
				<tr>
				<td>
					<?=$ticket->customer->name; ?><br>
				</td>
				<td>
					<?=$ticket->customer->email; ?>
				</td>
				<td>
					<?=$ticket->customer->no_tlp; ?>
				</td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Harga</th>
			</thead>
			<tbody>
				<tr>
					<td>Harga tiket:</td><td><?=$ticket->fare ?></td>
				</tr>
				<tr>
					<td>Harga Total:</td><td><?=$ticket->total ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<button onclick="ticketPrint()">Print</button>
	<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute"></iframe>
<?php }else{ ?>
	Data order tiket kosong, klik <a href="/">disini</a> untuk melakukan pemesanan
<?php } ?>
</body>
<script type="text/javascript">
	function ticketPrint(){
		var content = document.getElementById("ticket-content");
		var pri = document.getElementById("ifmcontentstoprint").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
</script>