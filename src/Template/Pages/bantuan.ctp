<!DOCTYPE html>
<html>
<head>
	<title>Bantuan</title>
</head>
<body class="bantuan-page">
	<div class="bantuan-menu">
		<h2>Bantuan</h2>
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#cara_pesan">Cara Pemesanan</a></li>
		    <li><a data-toggle="tab" href="#contact_us" >Kontak Kami</a></li>
		    <li><a data-toggle="tab" href="#about_us" >Tentang Bintang Timur</a></li>
		</ul>
	</div>
	<div class="bantuan-content tab-content">
		<div class="tab-pane active"  id="cara_pesan">
			<?= $this->element('cara_pemesanan'); ?>
		</div>
		<div class="tab-pane" id="contact_us">
			<?= $this->element('contact_us'); ?>
		</div>
		<div class="tab-pane" id="about_us">
			fasdfsdfdff edit
		</div>
	</div>
</body>
</html>