<?php 
$options = ['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6]; 
?>
    <div class="input-list">
        <label for="rute-perjalanan"><i class="fa fa-map-marker" aria-hidden="true"></i> Rute Perjalanan</label>
        <?php echo $this->cell('Routes'); ?>
    </div>
     <div class="input-list">
        <label for="tanggal-berangkat"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Keberangkatan</label>
        <?= $this->Form->input('tglKeberangkatan', array('id'=>'tanggal-berangkat','label'=>false))?>
        <!-- <input name="tglKeberangkatan" type="text" id="tanggal-berangkat" placeholder="Pilih tanggal keberangkatan"> -->
    </div>
    <div class="input-list">
        <label for="jumlah-penumpang"><i class="fa fa-user-plus" aria-hidden="true"></i> Jumlah Penumpang</label>
        <select id="jumlah-penumpang1" title="Pilih jumlah penumpang" name="jmlPenumpang" required>
            <option disabled selected value> Pilih jumlah penumpang </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
    </div>
    <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>