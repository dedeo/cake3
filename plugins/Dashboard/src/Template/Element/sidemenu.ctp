<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Bintang Timur</span></a>
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
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-bus']).' Schedule',
                    ['controller'=>'Schedules','action'=>'index'],
                    ['escape'=>false])
                    ?></li>
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-bus']).' Buses',
                    ['controller'=>'Buses','action'=>'index'],
                    ['escape'=>false])
                    ?></li>
                  <!-- 
                  <li><a><i class="fa fa-edit"></i> Bus/Armada <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link('Daftar Bus',['controller'=>'Buses','action'=>'index'])?></li>
                      <li><?= $this->Html->link('Tambah Bus',['controller'=>'Buses','action'=>'add'])?></li>
                    </ul>
                  </li> -->
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-bus']).' Rute Bus',
                    ['controller'=>'Routes','action'=>'index'],
                    ['escape'=>false])
                    ?></li>
                  <li><?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fa fa-user']).' User',
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