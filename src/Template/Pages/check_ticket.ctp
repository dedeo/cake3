<!DOCTYPE html>
<html>
<head>
	<title>check tikcet</title>
</head>
<body class="check-ticket">
	<div class="check-wrapper row">
		<div class="block-header col-sm-12"><hr><h1>Cek Tiket</h1></div>
		<div class="check-content col-sm-7">
			<p class="red-text">Masukkan kode ticket anda</p>
			<?php echo $this->Form->create() ?>
			<?php echo $this->Form->input('kode_tiket') ?>
	        <div class="button-grup">
	        	<?php echo $this->Form->button(__('Cek Tiket'),['class'=>'button-red']); ?>
	        </div>
			<?php echo $this->Form->end() ?>
		</div>
		
	</div>

</body>
</html>