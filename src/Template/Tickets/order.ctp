<?php
// debug($jadwal);
?>
<body class="data-penumpang">
	<form action="<?=$this->Url->build(['controller'=>'Tickets','action'=>'orderSummary']) ?>" method="POST">
	<div class="pilih-kursi">
		<h1>Pilih Kursi</h1>
		<div class="kursi-wrapper">
			<div class="bus-info">
				<div class="plat-no"><?= $jadwal->bus->plat_no?></div>
				<?= $this->Form->hidden('scheduleId',['value'=>$jadwal->id]) ?>
				<i class="fa fa-bus" aria-hidden="true"></i>
			</div>
			<div class="kursi-list">
				<!-- List kursi seperti ular tangga -->
				<?php 
					$total_kursi = $jadwal->bus->capacity; 
					$i = 1;
					$kolom = 4;
					$tampung = '';
					$arah = 'ka';
					$terpilih= 5;
					while ( $i <= $total_kursi) {
						if ($arah == 'ka') {
							if ($i % $kolom == 0) {
								$tampung = $tampung."<li><a href='#'>$i</a></li></ul>";
								echo $tampung;
								$arah = 'ki';
								$tampung = '';
							}elseif ($i % $kolom == 1) {
								$tampung = "<ul><li><a href='#'>$i</a></li>".$tampung;
							}else {
								$tampung = $tampung."<li><a href='#'>$i</a></li>";
							}
						} else {
							if($i % $kolom == 0) {
							  	$tampung = "<ul><li><a href='#'>$i</a></li>".$tampung;
							  	echo $tampung;
							  	$tampung = '';
							  	$arah = 'ka';
							} elseif ($i % $kolom == 1) {
							  	$tampung = $tampung."<li><a href='#'>$i</a></li></ul>";
							} else {
							  	$tampung = "<li><a href='#'>$i</a></li>".$tampung;
							}
						}

						$i++;
					}
				?>
			</div>
		</div>
	</div>

	<div class="penumpang-content">
		<h1>
			<span>Data Penumpang</span>
			<span class="jumlah-ticket">Jumlah Tiket: <?= $formData['jmlPenumpang'];?></span>
		</h1>
		<ul class="penumpang-list">
			<?php for($n = 1; $n<=$formData['jmlPenumpang']; $n++ ) { ?>
				<li>
					<h2><?php echo "Penumpang #".$n ?> </h2>
					<div class="penumpang-name">
						<label for="nama-penumpang-1">Nama</label>
						<input type="text" name="passenger<?= $n ?>.name" placeholder="Input nama penumpang" id="nama-penumpang-1">
					</div>
					<div class="penumpang-kelamin">
						<h3>Jenis Kelamin</h3>

						<div class="radio">
						  <label><input type="radio" name="passenger<?= $n ?>.gender" value="male"> Laki-laki</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="passenger<?= $n ?>.gender" value="female"> Perempuan</label>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>

		<div class="penumpang-contact">
			<h2>Kontak yang bisa dihubungi</h2>
			<div class="penumpang-kontak">
				<label for="penumpang-kontak">Nama</label>
				<input type="text" name="customer.name" placeholder="Input nama yang bisa dihubungi" id="penumpang-kontak">
			</div>
			<div class="penumpang-phone">
				<label for="penumpang-phone">Nomor Telepon</label>
				<input type="text" name="customer.phone" placeholder="Input nomor telepon" id="penumpang-phone">
			</div>
			<div class="penumpang-email">
				<label for="penumpang-email">Email (Opsional)</label>
				<input type="text" name="customer.email" placeholder="Input email" id="penumpang-email">
			</div>
		</div>
	</div>
	
	<div class="buttom-wrapper">
		<a href="#" class="batal-btn">Batalkan</a>
		<button type="submit" class="lanjut-btn">Lanjutkan</button>
	</div>
	</form>
</body>