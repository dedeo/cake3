<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <div class="site_title"><?= $this->Html->image('logo_dash.png', ['alt' => 'Bintang Timur', 'style'=>'width:55px;']);?> <span>Bintang Timur</span></div>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!--
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-home']).' Home',
                    ['controller'=>'Main','action'=>'index'],
                    ['escape'=>false])
                    ?></li>

                  <li><a><i class="fa fa-bus"></i> Bus/Armada <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link(' Daftar Bus',['controller'=>'Buses','action'=>'index'])?></li>
                      <!-- <li><?= $this->Html->link(' Rute Bus',['controller'=>'Routes','action'=>'index'])?></li> -->
                      <li><?= $this->Html->link(' Tambah Bus',['controller'=>'Buses','action'=>'add'])?></li>
                    </ul>
                  </li>

                  <li>
                    <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-map-marker']).' Rute Perjalanan',
                    ['controller'=>'Routes','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-calendar']).' Jadwal keberangkatan',
                    ['controller'=>'Schedules','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li><a><i class="fa fa-ticket"></i> Tiket <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link(' Daftar Tiket',['controller'=>'Tickets','action'=>'index'])?></li>
                      <li><?= $this->Html->link(' Penjualan Tiket',['controller'=>'Buses','action'=>'index'])?></li>
                      <li><?= $this->Html->link(' Tambah Tiket Baru',['controller'=>'Tickets','action'=>'add'])?></li>
                    </ul>
                  </li>
<!--                   <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-bus']).' Buses',
                    ['controller'=>'Buses','action'=>'index'],
                    ['escape'=>false])
                    ?></li>
 -->                  <!-- 
                  <li><a><i class="fa fa-edit"></i> Bus/Armada <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link('Daftar Bus',['controller'=>'Buses','action'=>'index'])?></li>
                      <li><?= $this->Html->link('Tambah Bus',['controller'=>'Buses','action'=>'add'])?></li>
                    </ul>
                  </li> -->
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-user-secret']).' User',
                    ['controller'=>'Users','action'=>'index'],
                    ['escape'=>false])
                    ?></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>