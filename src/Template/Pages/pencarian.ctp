<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian</title>
</head>
<body class="hasil-pencarian">
	<div class="toogle-menu">
		<a href="#" class="toogle-menu-a"><h1>Ganti Pencarian Ticket <i class="fa fa-caret-down" aria-hidden="true"></i></h1></a>
		<div class="search-form search-top">
			<?= $this->element('search'); ?>
		</div>
	</div>
	<div class="hasil-pencarian-content row">
		<div class="top-info col-sm-12 row">
			<div class="rute-info col-sm-8">Hasil Pencarian: Makassar-Palopo	</div>
			<div class="date-info col-sm-4"><i class="fa fa-calendar" aria-hidden="true"></i>01 Des 2016</div>
		</div>
		<div class="result-search">
			<table>
				<thead>
					<tr>
						<th>
							Bus
						</th>
						<th>
							Tipe
						</th>
						<th>
							Berangkat
						</th>
						<th>
							Kapasitas
						</th>
						<th colspan="2">
							Tarif
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="search-img">
							<?= $this->Html->image('slider-img/slider1.jpg', ['alt' => 'search-img']);?>
						</td>
						<td class="search-tipe">
							<span>Hight Class Bus</span>
							Fasilitas <br>
							- Ac <br>
							- Selimut <br>
							- Bantal <br>
						</td>
						<td class="search-time">
							<span>19:00 PM</span>
							Lama Perjalanan: <br>
							8 jam
						</td>
						<td class="search-capacity">
							<span>12/</span>28
						</td>
						<td class="search-price">
							<span>Rp. 180.000</span>
						</td>
						<td class="search-order">
							<a href="#" class="order-button"><i class="fa fa-tag" aria-hidden="true"></i> Pesan</a>
						</td>
					</tr>
					<tr>
						<td class="search-img">
							<?= $this->Html->image('slider-img/slider1.jpg', ['alt' => 'search-img']);?>
						</td>
						<td class="search-tipe">
							<span>Hight Class Bus</span>
							Fasilitas <br>
							- Ac <br>
							- Selimut <br>
							- Bantal <br>
						</td>
						<td class="search-time">
							<span>19:00 PM</span>
							Lama Perjalanan: <br>
							8 jam
						</td>
						<td class="search-capacity">
							<span>12/</span>28
						</td>
						<td class="search-price">
							<span>Rp. 180.000</span>
						</td>
						<td class="search-order">
							<a href="#" class="order-button"><i class="fa fa-tag" aria-hidden="true"></i> Pesan</a>
						</td>
					</tr>
					<tr>
						<td class="search-img">
							<?= $this->Html->image('slider-img/slider1.jpg', ['alt' => 'search-img']);?>
						</td>
						<td class="search-tipe">
							<span>Hight Class Bus</span>
							Fasilitas <br>
							- Ac <br>
							- Selimut <br>
							- Bantal <br>
						</td>
						<td class="search-time">
							<span>19:00 PM</span>
							Lama Perjalanan: <br>
							8 jam
						</td>
						<td class="search-capacity">
							<span>12/</span>28
						</td>
						<td class="search-price">
							<span>Rp. 180.000</span>
						</td>
						<td class="search-order">
							<a href="#" class="order-button"><i class="fa fa-tag" aria-hidden="true"></i> Pesan</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
</body>
</html>