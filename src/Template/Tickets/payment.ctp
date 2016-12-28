<?php
	
	$penumpang = $formData['penumpang'];
	$customer = $formData['customer'];

	$rute = $ticket['route'];
	$bus = $ticket['bus'];

	if($this->request->session()->read('Ticket.detail')){
		$tiket = $this->request->session()->read('Ticket.detail');
	}

	// debug($tiket);
	// die();

?>
<body class="pembayaran">
	<div class="total-price-wrapper">
		<h1>Total Bayar</h1>
		<div class="total-price">Rp. <?=$tiket['total']?></div>
	</div>
	<div class="detail-order">
		<h1>Detail Pesanan Tiket: <?=count($tiket['penumpang'])?> Orang</h1>
		<ul class="detail-list">
			<li class="detail-ticket">
				<h2>Detail Tiket</h2>
				<table>
					<tbody>
						<tr>
							<td>Kode Pesan</td>
							<td>00001</td>
						</tr>
						<tr>
							<td>Rute Perjalanan</td>
							<td><?=$tiket['rute']?></td>
						</tr>
						<tr>
							<td>Tanggal Keberangkatan</td>
							<td><?= $tiket['tanggal']?></td>
						</tr>
						<tr>
							<td>Jam Keberangkatan</td>
							<td><?= $tiket['jam_keberangkatan']?></td>
						</tr>
						<tr>
							<td>Jumlah Penumpang</td>
							<td><?=count($tiket['penumpang'])?></td>
						</tr>
						<tr>
							<td>Tipe Bus</td>
							<td>HIGHT CLASS BUS</td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td><?=$tiket['bus']['nopol']?></td>
						</tr>
					</tbody>
				</table>
			</li>
			<li class="detail-penumpang">
				<h2>Detail Penumpang</h2>
				<table>
					<thead>
						<tr>
							<th>No. Kursi</th>
							<th>Nama Penumpang</th>
							<th>Jenis Kelamin</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($tiket['penumpang'] as $data) { ?>
						<tr>
							<td>#<?=$data['kursi']?></td>
							<td><?=$data['name']?></td>
							<td><?=$data['gender']?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</li>
			<li class="detail-kontak">
				<h2>Kontak Yang Bisa Dihubungi</h2>
				<table>
					<thead>
						<tr>
							<th>Pemesan</th>
							<th>No. Telepon</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$tiket['customer']['name']?></td>
							<td><?=$tiket['customer']['phone']?></td>
							<td><?=$tiket['customer']['email']?></td>
						</tr>
					</tbody>
				</table>
			</li>
		</ul>
	</div>
	<div class="buttom-wrapper">
		<?php echo $this->Form->create('Ticket',['url'=>'/tickets/saveorder/']) ?>
		<a href="/" class="batal-btn">Batalkan</a>
		<button type="submit" class="finish-btn">Selesai &amp; Bayar</button>
		<?php echo $this->Form->end() ?>
	</div>

</body>
</html>