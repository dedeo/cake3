<?php
// debug($ticket);
?>
<body class="data-penumpang">
<form action="<?=$this->Url->build(['controller'=>'Tickets','action'=>'payment']) ?>" method="POST">
	<div class="pilih-kursi">
		<h1>Pilih Kursi</h1>
		<div class="kursi-wrapper">
			<div class="bus-info">
				<div class="plat-no"><?= $ticket->bus->plat_no?></div>
				<?= $this->Form->hidden('ticketId',['value'=>$ticket->id]) ?>
				<i class="fa fa-bus" aria-hidden="true"></i>
			</div>
			<div class="kursi-list">
				<!-- List kursi seperti ular tangga -->
				<?php 
					$total_kursi = $ticket->bus->capacity;
					$i = 1;
					if($total_kursi==28){
						$kolom=4;
					}else{
						$kolom=3;
					}
				?><div class="total-kursi-<?php echo $total_kursi ?>"><?php
					$tampung = '';
					$arah = 'ka';
					$sold = $soldSeets;
					while ( $i <= $total_kursi) {
						$sold_class = (in_array($i, $sold))?'sold':'';
						if ($arah == 'ka') {
							if ($i % $kolom == 0) {
								$tampung = $tampung."<li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li></ul>";
								echo $tampung;
								$arah = 'ki';
								$tampung = '';
							}elseif ($i % $kolom == 1) {
								$tampung = "<ul><li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li>".$tampung;
							}else {
								$tampung = $tampung."<li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li>";
							}
						} else {
							if($i % $kolom == 0) {
							  	$tampung = "<ul><li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li>".$tampung;
							  	echo $tampung;
							  	$tampung = '';
							  	$arah = 'ka';
							} elseif ($i % $kolom == 1) {
							  	$tampung = $tampung."<li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li></ul>";
							} else {
							  	$tampung = "<li><div class='checkbox ".$sold_class."'>
								  <label><input type='checkbox' name='kursi[]' value='$i'>$i</label>
								</div></li>".$tampung;
							}
						}

						$i++;
					}
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="penumpang-content">
		<h1>
			<span>Data Penumpang</span>
			<span class="jumlah-ticket">Jumlah Tiket: <?=$formData['jmlPenumpang']  ?></span>
		</h1>

		<div class="penumpang-contact">
			<h2>Kontak yang bisa dihubungi</h2>
			<div class="penumpang-kontak">
				<label for="penumpang-kontak">Nama</label>
				<input type="text" name="customer[name]" placeholder="Input nama yang bisa dihubungi" id="penumpang-kontak" required>
			</div>
			<div class="penumpang-phone">
				<label for="penumpang-phone">Nomor Telepon</label>
				<input type="text" name="customer[phone]" placeholder="Input nomor telepon" id="penumpang-phone" required>
			</div>
			<div class="penumpang-email">
				<label for="penumpang-email">Email (Opsional)</label>
				<input type="text" name="customer[email]" placeholder="Input email" id="penumpang-email">
			</div>
		</div>
	</div>
	
	<div class="buttom-wrapper">
		<a href="/" class="batal-btn">Batalkan</a>
		<button type="submit" class="lanjut-btn">Lanjutkan</button>
	</div>
</form>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		var kursi_count = "<?php echo $formData['jmlPenumpang']; ?>";
		
		$('.kursi-list .checkbox.sold').each(function(){
			$(this).find('input').attr("disabled", true);
		});

		$(".kursi-list .checkbox input").change(function() {
		    if($(this).closest('.checkbox').hasClass('active')) {
		        $(this).closest('.checkbox').removeClass('active');
				plusKursi();
		    }else{
		    	$(this).closest('.checkbox').addClass('active');
				minusKursi();
		    }
		});	

		

		function minusKursi(){
			kursi_count = parseInt(kursi_count)-1;
			if(kursi_count==0){
				$('.kursi-list .checkbox').not('.active, .sold').each(function(){
					$(this).find('input').attr("disabled", true);
				});
			}else{
				$('.kursi-list .checkbox').not('.active, .sold').each(function(){
					$(this).find('input').attr("disabled", false);
				});
			}
		};

		function plusKursi(){
			kursi_count = parseInt(kursi_count)+1;
			if(kursi_count==0){
				$('.kursi-list .checkbox').not('.active, .sold').each(function(){
					$(this).find('input').attr("disabled", true);
				});
			}else{
				$('.kursi-list .checkbox').not('.active, .sold').each(function(){
					$(this).find('input').attr("disabled", false);
				});
			}
		};



		$('.lanjut-btn').click(function() {
	      if(kursi_count!=0) {
	        alert("Pilih "+kursi_count+" kursi");
	        return false;
	      }
	    });

	});
</script>