<!DOCTYPE>
<html lang="en">
  <head>
  <title>Dashboard - <?php echo h($this->fetch('title')); ?></title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <?php
  echo $this->fetch('meta');


  echo $this->Html->css(
    [
      'Dashboard.bootstrap.min',
      'Dashboard.font-awesome.min',
      'Dashboard.green',
      'Dashboard.bootstrap-progressbar-3.3.4.min',
      'Dashboard.jquery-jvectormap-2.0.3',
      'Dashboard.custom.min']
  );
  echo $this->fetch('css');


  ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
        <?= $this->element('sidemenu'); ?>
        </div>

        <?= $this->element('topnavigation'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
              <div class="title_left">
                <h3><?php echo h($this->fetch('title')); ?></h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> 
          </div>
          <div class="clearfix"></div>
        <?php
        // echo $this->Html->getCrumbs(' > ', [
        //     'text' => 'Home',
        //     'url' => ['controller' => 'Main', 'action' => 'index'],
        //     'escape' => true
        // ]); 
        ?>       
        <?= $this->fetch('content'); ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php //echo $this->element('footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

  <?php
  echo $this->Html->script(
    [
      'Dashboard.jquery.min',
      'Dashboard.bootstrap.min',
      'Dashboard.fastclick',      
      'Dashboard.nprogress',
      'Dashboard.Chart.min',      
      'Dashboard.jquery.min.js',
      'Dashboard.bootstrap.min.js',
      'Dashboard.fastclick.js',
      'Dashboard.nprogress.js',
      'Dashboard.Chart.min.js',
      'Dashboard.gauge.min.js',
      'Dashboard.bootstrap-progressbar.min.js',
      'Dashboard.icheck.min.js',
      'Dashboard.skycons.js',
      'Dashboard.jquery.flot.js',
      'Dashboard.jquery.flot.pie.js',
      'Dashboard.jquery.flot.time.js',
      'Dashboard.jquery.flot.stack.js',
      'Dashboard.jquery.flot.resize.js',
      'Dashboard.jquery.flot.orderBars.js',
      'Dashboard.date.js',
      'Dashboard.jquery.flot.spline.js',
      'Dashboard.curvedLines.js',
      // 'Dashboard.jquery-jvectormap-2.0.3.min.js',
      'Dashboard.moment.min.js',
      'Dashboard.daterangepicker.js',
      'Dashboard.custom.min.js',
    ]
  );
  echo $this->fetch('script');
  ?>
    <!-- jVectorMap -->
    <?php
    echo $this->Html->script(
        [
          'Dashboard.jquery-jvectormap-world-mill-en.js',
          'Dashboard.jquery-jvectormap-us-aea-en.js',
          'Dashboard.gdp-data.js'
        ]
      );
    ?>
  </body>
</html>