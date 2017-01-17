<?php $this->assign('title', 'Dashboard'); ?>
<!-- top tiles -->
<div class="row tile_count" >
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Total Penjualan</span>
    <div class="count"><?php echo $ticketorderTotal; ?></div>
    <span class="count_bottom">Bulan <?php echo $this->Time->format($timeToday,'MMMM'); ?></span>
    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Pembeli</span>
    <div class="count green"><?php echo $ticketorderPasseger; ?></div>
    <span class="count_bottom">Bulan <?php echo $this->Time->format($timeToday,'MMMM'); ?></span>
  </div>
</div>
<!-- /top tiles -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
      <h2>Jadwal Untuk Hari Ini<small><?= date('d-m-Y',strtotime('now'))?></small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Rute</th>
              <th>Bus</th>
              <th>Jam Keberangkatan</th>
              <th>Jam Kedatangan</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $i = 1;
          foreach ($todayRoutes as $route) { ?>
            <tr>
              <th scope="row"><?=$i;$i++?></th>
              <td><?=$route->route->name?></td>
              <td><?=$route->bus->name?></td>
              <td><?=$this->Time->format($route->departure_time,'HH:mm')?></td>
              <td><?=$this->Time->format($route->arival_time,'HH:mm')?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>  
</div>
