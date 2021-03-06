<body class="ticket-summary">
<?php //if (!empty($ticket)) { ?>
<div id="ticketpri-wrapper" style="width: 595px; margin: 0 auto;">
	<div class="header" style="display: inline-block;width: 100%;border-bottom: 1px solid #fe9901;padding-bottom: 5px;margin-bottom:5px;">
		<h1 style="font-weight: bold;margin-top: 10px;margin-bottom: 0px;float: left;width: 50%;display: inline-block;font-size:15px;">BT0981234</h1>
		<div class="logo" style="float: left;width: 50%;display: inline-block;">
			<img src="/img/logo.png" alt="Bintang Timur" style="width: 150px;float: right;" />
		</div>
	</div>
	<div class="ticket-print" id='ticket-content'>
		<h2 style="margin: 5px 0px;font-size: 13px;">Detail Tiket</h2>
		<table class="table" style="border: 0px;font-size: 11px;width:100%;">
			<thead>
				<th colspan="3" style="border: 0px;font-size: 11px;background: #d9dfe9;width: 33.33%;text-align:left">Jadwal Keberangkatan</th>
			</thead>
				<tbody>
				<tr>
					<td style="width: 33.33%;">
						WAONDULA - MAKASAR<br>
						DP 7879 GM
					</td>
					<td style="width: 33.33%;">
						Keberangkatan: 1 Jan 1970<br>
						02:00:00
					</td>
					<td style="width: 33.33%;">
						Tiba: 1 Jan 1970<br>
						03:00:00
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table" style="border: 0px;font-size: 11px;width:100%;">
			<thead>
				<th colspan="3" style="border: 0px;font-size: 11px;background: #d9dfe9;width: 33.33%;text-align:left">Penumpang</th>
			</thead>
			<tbody>
				<tr>
					<td style="width: 33.33%;">
						Nama Kamu
					</td>
					<td style="width: 33.33%;">
						Female
					</td>
					<td style="width: 33.33%;">
						Nomor Kursi: #14
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table" style="border: 0px;font-size: 11px;width:100%;">
			<thead>
				<th colspan="3" style="border: 0px;font-size: 11px;background: #d9dfe9;width: 33.33%;text-align:left">Kustomer</th>
			</thead>
			<tbody>
				<tr>
					<td style="width: 33.33%;">Tony Stark<br>
					</td>
					<td style="width: 33.33%;">tony@gmail.com</td>
					<td style="width: 33.33%;">08123123123</td>
				</tr>
				<tr>
					<td style="width: 33.33%;">Tony Stark<br></td>
					<td style="width: 33.33%;">tony@gmail.com</td>
					<td style="width: 33.33%;">08123123123</td>
				</tr>
			</tbody>
		</table>
		<table class="table" style="border: 0px;font-size: 11px;width:100%;">
			<thead>
				<th colspan="3" style="border: 0px;font-size: 11px;background: #d9dfe9;width: 33.33%;text-align:left">Harga</th>
			</thead>
			<tbody>
				<tr>
					<td style="width: 33.33%;">Harga tiket:</td>
					<td style="width: 33.33%;">400000</td>
					<td style="width: 33.33%;">&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 33.33%;">Harga Total:</td>
					<td style="width: 33.33%;">400000</td>
					<td style="width: 33.33%;">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="perhatian-info" style="font-size:10px;background:#d9dfe9;padding:10px 15px;margin-top:10px">
			PERHATIAN</br>
			1.	Barang-barang Penumpang diluar tanggungjawab kami,kecuali barang kiriman</br>
			2.	Dilarang merokok diatas bus</br>
			3.	Jagalah kebersihan diatas bus</br>
			4.	Penumpang yang ketinggalan bus tiketnya tidak berlaku lagi</br>
			5.	Pemberangkatan bus sewaktu-waktu dapat berubah</br>
			6.	Cek ulang tanggal yang tertulis pada tiket anda</br>
		</div>
		<div class="perhatian-info" style="font-size:10px;background:#d9dfe9;padding:10px 15px;margin-top:10px">
			KETENTUAN PERATURAN TIKET</br>
			1.	Tanggal keberangkatan yang berlaku adalah yang TERTULIS SESUAI pada lembaran tiket</br>
			2.	Tiket TIDAK DAPAT dialihkan pemakaiannya dari daerah atau dari kota lain</br>
			3.	Pembelian tiket dihari keberangkatan 14.00-22.00 tidak dapat dibatalkan atau ditunda lagi</br>
			4.	Setiap penumpang hanya berhak membawa barang bawaan berupa 1(satu) dos &amp; 2 (dua) tas pakaian, selebihnya akan dikenakan biaya tambahan (Charge) sesuai kesepakatan.</br>
			5.	Tempat dududk diatas bus tidak dapat dibeli untuk dipergunakan mendudukkan binatang atau barang barang lainnya</br>
			6.	Pembelian tiket dari kota/daerah lain dapat dilayani dengan pembayran tunai</br>
			7.	Setelah pembayaran dan mengambil tiket penumpang MENYATAKAN STUJUH &amp; TIDAK KEBERATAN atas semua ketentuan yang ada.</br>
		</div>
	</div>
	<button class="print-ticket" onclick="ticketPrint()" style="width: 100%;border-radius: 0px;background: #5bc0de;color: #fff;text-align: center;font-size: 16px;text-transform: uppercase;margin-top: 15px;padding: 8px 0px;border-style: none;max-width: 300px;display: none">Print</button>
	<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; display: none"></iframe>
</div>
</body>

<script type="text/javascript">
	function ticketPrint(){
		var content = document.getElementById("ticketpri-wrapper");
		var pri = document.getElementById("ifmcontentstoprint").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
</script>