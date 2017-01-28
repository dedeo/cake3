<body class="check-ticket">
	<div class="check-wrapper row">
		<div class="block-header col-sm-12"><hr><h1>Cek Tiket</h1></div>
		<div class="check-content col-sm-7">
			<p class="red-text">Masukkan kode ticket anda</p>
			<?php echo $this->Form->create('checkTicket',['url'=>['controller'=>'Tickets','action'=>'check']]) ?>
			<?php echo $this->Form->input('kode_tiket') ?>
	        <div class="button-grup">
	        	<?php echo $this->Form->button(__('Cek Tiket'),['class'=>'button-red']); ?>
	        </div>
			<?php echo $this->Form->end() ?>
		</div>
	</div>
	<!-- result page -->
<?php if (!empty($ticket)) { ?>
	<?php //debug($ticket)?>
<div id="ticketpri-wrapper" style="width: 595px; margin: 0 auto;">
	<div class="header" style="display: inline-block;width: 100%;border-bottom: 1px solid #fe9901;padding-bottom: 5px;margin-bottom:5px;">
		<h1 style="font-weight: bold;margin-top: 10px;margin-bottom: 0px;float: left;width: 50%;display: inline-block;font-size:15px;"><?=$ticket->ticket_code ?></h1>
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
						<?php echo $this->City->getName($ticket->ticket->route->source).' - '.$this->City->getName($ticket->destination); ?><br>
						<?=$ticket->ticket->bus->plat_no; ?><br>
						
						<?=$this->Bus->getLabel($ticket->ticket->bus->class);?>
					</td>
					<td style="width: 33.33%;">
						Keberangkatan: <?=$ticket->departure_date->i18nFormat('d MMM Y') ?><br>
						<?=$ticket->departure_time->i18nFormat('HH:mm:ss') ?>
					</td>
					<td style="width: 33.33%;">
						Tiba: <?=$ticket->arival_time->i18nFormat('HH:mm:ss') ?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table" style="border: 0px;font-size: 11px;width:100%;">
			<thead>
				<th colspan="3" style="border: 0px;font-size: 11px;background: #d9dfe9;width: 33.33%;text-align:left">Nama</th>
			</thead>
			<tbody>
				<tr>
					<td style="width: 33.33%;">
						<?=$ticket->customer->name; ?><br>
						<?php //debug($ticket); ?>
					</td>
					<td style="width: 33.33%;">
						<?=$ticket->customer->phone; ?>
					</td>
					<td style="width: 33.33%;">
						Nomor Kursi: <?php echo $ticket->sheet ?>
					</td>
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
					<td style="width: 33.33%;"><?=$ticket->fare ?></td>
					<td style="width: 33.33%;">&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 33.33%;">Harga Total:</td>
					<td style="width: 33.33%;"><?=$ticket->total ?></td>
					<td style="width: 33.33%;">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<div class="perhatian-info" style="font-size:10px;background:#d9dfe9;padding:10px 15px;margin-top:10px">
			KETENTUAN PERATURAN TIKET</br>
			1.	Tanggal keberangkatan yang berlaku adalah yang TERTULIS SESUAI pada lembaran tiket</br>
			2.	Tiket TIDAK DAPAT dialihkan pemakaiannya dari daerah atau dari kota lain</br>
			3.	Pembelian tiket dihari keberangkatan 14.00-22.00 tidak dapat dibatalkan atau ditunda lagi</br>
			4.	Setiap penumpang hanya berhak membawa barang bawaan berupa 1(satu) dos &amp; 2 (dua) tas pakaian, selebihnya akan dikenakan biaya tambahan (Charge) sesuai kesepakatan.</br>
			5.	Tempat duduk diatas bus tidak dapat dibeli untuk dipergunakan meletakkan binatang atau barang barang lainnya</br>
			6.	Pembelian tiket dari kota/daerah lain dapat dilayani dengan pembayaran tunai</br>
			7.	Setelah pembayaran dan mengambil tiket penumpang MENYATAKAN SETUJUH &amp; TIDAK KEBERATAN atas semua ketentuan yang ada.</br>
		</div>
	</div>
	<button class="print-ticket" onclick="ticketPrint()" style="width: 40%;border-radius: 0px;background: #5bc0de;color: #fff;text-align: center;font-size: 16px;text-transform: uppercase;margin-top: 15px;padding: 8px 0px;border-style: none;max-width: 300px;display: none;float:left">Print</button>
	<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; display: none"></iframe>
	<?php } ?>

	<?php if($error){ ?>
	<div class="error">
		<?php echo $error; ?>
	</div>
	<?php } ?>
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