<body class="ticket-summary">
<?php //if (!empty($ticket)) { ?>
	<div class="ticket-print" id='ticket-content'>
		<h1>BT0981234</h1>
		<h4>Detail Tiket</h4>
		<table class="table">
			<thead>
				<th>Jadwal Keberangkatan</th>
			</thead>
				<tbody>
				<tr>
					<td>
						WAONDULA - MAKASAR<br>
						DP 7879 GM
					</td>
					<td>
						Keberangkatan: 1 Jan 1970<br>
						02:00:00
					</td>
				<td>
					Tiba: 1 Jan 1970<br>
					03:00:00
				</td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Penumpang</th>
			</thead>
			<tbody>
				<tr>
				<td>
				Nama Kamu
				</td>
				<td>
				Female
				</td>
				<td>
					Nomor Kursi: #14
				</td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Kustomer</th>
			</thead>
			<tbody>
				<tr>
				<td>Tony Stark<br>
				</td>
				<td>tony@gmail.com</td>
				<td>08123123123</td>
				</tr>
				<tr>
				<td>Tony Stark<br>
				</td>
				<td>tony@gmail.com</td>
				<td>08123123123</td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<th>Harga</th>
			</thead>
			<tbody>
				<tr>
					<td>Harga tiket: 400000</td>
				</tr>
				<tr>
					<td>Harga Total:</td><td>400000</td>
				</tr>
			</tbody>
		</table>
	</div>
	<button onclick="ticketPrint()">Print</button>
	<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute"></iframe>
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