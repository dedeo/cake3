<?php $this->assign('title', 'Dashboard'); ?>

  <!-- top tiles -->
  <div class="row tile_count" style="min-height:500px;">
    <div class="col-sm-12 col-xs-12 tile_stats_count">
      <span class="count_top"><i class="fa fa-money"></i> Total Penjualan</span>
      <div class="count"><?php echo $jualTotal; ?></div>
      <span class="count_bottom">Bulan <?php echo $this->Time->format($jualBulan,'MMMM'); ?></span>
      <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
    <div class="col-sm-12 col-xs-12 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Pembeli</span>
      <div class="count green"><?php echo $jualPessanger; ?></div>
      <span class="count_bottom">Bulan <?php echo $this->Time->format($jualBulan,'MMMM'); ?></span>
    </div>
  </div>
  <!-- /top tiles -->
