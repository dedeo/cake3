<?php
	
	// $penumpang = $formData['penumpang'];
	$customer = $data['customer'];

	$rute = $ticket['route'];
	$bus = $ticket['bus'];

	if($this->request->session()->read('Order.customer')){
		$customer = $this->request->session()->read('Order.customer');
	}

	// debug($tiket);
	// die();

?>
<body class="pembayaran">
	<div class="total-price-wrapper">
		<h1>Total Bayar</h1>
		<div class="total-price">Rp. <?=$data['total']?></div>
	</div>
	<div class="detail-order">
		<h1>Detail Pesanan Tiket: <?=$data['jumlah_penumpang']?> Orang</h1>
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
							<td><?=$data['rute']?></td>
						</tr>
						<tr>
							<td>Tanggal Keberangkatan</td>
							<td><?= $data['tanggal']?></td>
						</tr>
						<tr>
							<td>Jam Keberangkatan</td>
							<td><?= $data['jam_keberangkatan']?></td>
						</tr>
						<tr>
							<td>Jumlah Penumpang</td>
							<td><?=$data['jumlah_penumpang']?></td>
						</tr>
						<tr>
							<td>Tipe Bus</td>
							<td>HIGHT CLASS BUS</td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td><?=$data['bus']['nopol']?></td>
						</tr>
					</tbody>
				</table>
			</li>
			<li class="detail-penumpang">
				<h2>Kustomer</h2>
				<table>
					<thead>
						<tr>
							<th>Nama Penumpang</th>
							<th>No. Tlp</th>
							<th>No. Kursi</th>
						</tr>
					</thead>
					<tbody>
					<?php //$customer = $formData['customer']; ?>
						<tr>
							<td><?=$data['customer']['name']?></td>
							<td><?=$data['customer']['phone']?></td>
							<td><?=implode(', ', $customer['kursi']);?></td>
						</tr>
					</tbody>
				</table>
			</li>
			<!-- 			
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
			</li> -->
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