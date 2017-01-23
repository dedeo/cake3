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

                  <li>
                    <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-bus']).' Daftar Bus',
                    ['controller'=>'Buses','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li>
                    <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-map-marker']).' Rute Perjalanan',
                    ['controller'=>'Routes','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-calendar']).' Jadwal Rutin',
                    ['controller'=>'Schedules','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-ticket']).' Jadwal Tiket',
                    ['controller'=>'Tickets','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>

                  <li><a class=""><i class="fa fa-list"></i> Laporan</a>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'fa fa-list']).' Penjualan',
                        ['controller'=>'Reports','action'=>'ticketSales'],
                        ['escape'=>false])
                        ?>
                      </li>
                      <li><?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'fa fa-list']).' Pendapatan Bus',
                        ['controller'=>'Reports','action'=>'busEarning'],
                        ['escape'=>false])
                        ?>
                      </li>
                    </ul>
                  </li>
                  
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-user-secret']).' User',
                    ['controller'=>'Users','action'=>'index'],
                    ['escape'=>false])
                    ?>
                  </li>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>