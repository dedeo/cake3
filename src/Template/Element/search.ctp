<form action="<?php echo $this->Url->build(['controller'=>'Tickets','action'=>'search'])?>" method="POST">
    <div class="input-list">
        <label for="rute-perjalanan"><i class="fa fa-map-marker" aria-hidden="true"></i> Rute Perjalanan</label>
        <?php echo $this->cell('Routes'); ?>
    </div>
     <div class="input-list">
        <label for="tanggal-berangkat"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Keberangkatan</label>
        <input name="tglKeberangkatan" type="text" id="tanggal-berangkat" placeholder="Pilih tanggal keberangkatan">
    </div>
    <div class="input-list">
        <label for="jumlah-penumpang"><i class="fa fa-user-plus" aria-hidden="true"></i> Jumlah Penumpang</label>
        <select class="selectpicker" id="jumlah-penumpang" title="Pilih jumlah penumpang" name="jmlPenumpang">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
          </select>
    </div>

    <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
</form>