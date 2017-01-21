<?php
$this->Html->addCrumb('Jadwal Keberangkatan Bus', '');
$this->assign('title', 'Jadwal Keberangkatan Bus');

// debug($schedules->toArray());

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		  <div class="x_title">
	      	<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'add'])?> class="btn btn-warning btn-sm pull-right"> Tambah Jadwal Baru</a>
		    <div class="clearfix"></div>
		  </div>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#menu1">List All</a></li>
		  	<li><a data-toggle="tab" href="#hariIni">Hari ini</a></li>
		</ul>
		<div class="tab-content">
			<div id="hariIni" class="tab-pane fade">
				<!-- Jadwal Hari ini -->
				<h4>Jadwal keberangkatan hari ini ( <?php echo date("d M y",strtotime('now')); ?> )</h4>
				<div class="table-responsive">
				  <table class="table" id="tableTodayRoutes">
			        <thead>
			            <tr>
			                <th scope="col"><?= $this->Paginator->sort('#') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('route_id','Rute') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('bus_id','Bus') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('departure_time','Berangkat') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('arival_time','Datang') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('fare','Harga') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('Route.parent_route','Rute Utama') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $i=1;?>
			        	<?php foreach ($todaySchedules as $schedule) { ?>
			        		<tr>
			        			<td><?=$i; $i++;?></td>
			        			<td><?=$schedule->route_name?></td>
			        			<td><?=$schedule->bus->name?></td>
			        			<td><?=$this->Time->format($schedule->departure_time,'HH:mm')?></td>
			        			<td><?=$this->Time->format($schedule->arival_time,'HH:mm')?></td>
			        			<td><?=$schedule->fare?></td>
			        			<td>
			        			<?php
			        			if($schedule->route->parent_route!=0){
			        				echo $this->Routes->getLabel($schedule->route->parent_route);
			        			}else{
			        				echo '-';
			        			}
			        			?>	
			        			</td>
			        		</tr>	
			        	<?php } ?>
			        </tbody>
				   </table>
			    </div>
			</div>
			<div id="menu1" class="tab-pane fade in active">
				<div class="table-responsive">
				  <table class="table" id="tableRoutes">
			        <thead>
			            <tr>
			                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('day','Hari') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('route_id','Rute') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('bus_id','Bus') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('fare','Harga') ?></th>
			                <!-- <th scope="col"><?= $this->Paginator->sort('create_at') ?></th> -->
			                <th scope="col"><?= $this->Paginator->sort('departure_time','Berangkat') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('arival_time','Datang') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('Route.parent_route','Rute Utama') ?></th>
			                <!-- <th scope="col"><?= $this->Paginator->sort('status') ?></th> -->
			                <th scope="col" class="actions"><?= __('Actions') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $i=1;?>
			            <?php foreach ($schedules as $schedule): ?>
			            <tr>
			                <td><?= $this->Number->format($i); $i++; ?></td>
			                <td><?= $this->MyDate->getLabel($schedule->day) ?></td>
			                <td><?= $schedule->has('route') ? $this->Html->link($schedule->route->name, ['controller' => 'Schedules', 'action' => 'edit', $schedule->id]) : '' ?></td>
			                <td><?= $schedule->has('bus') ? $schedule->bus->name : '' ?></td>
			                <td><?= $this->Number->format($schedule->fare) ?></td>
			                <!-- <td><?= $this->Number->format($schedule->create_at) ?></td> -->
			                <td><?= $this->Time->format($schedule->departure_time,'HH:mm') ?></td>
			                <td><?= $this->Time->format($schedule->arival_time,'HH:mm') ?></td>
		        			<td>
		        			<?php
		        			if($schedule->route->parent_route!=0){
		        				echo $this->Routes->getLabel($schedule->route->parent_route);
		        			}else{
		        				echo '-';
		        			}
		        			?>	
		        			</td>
							<td class="actions">
						      	<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'edit',$schedule->id])?> class="text-general"><i class="fa fa-edit"></i></a>
								<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id),'escape'=>false,'class'=>'text-danger']) ?>
							</td>
			            </tr>
			            <?php endforeach; ?>
			        </tbody>
				  </table>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
	</div>
</div>

<?php
// $this->Html->script(
// 	[
// 	    'jquery.min.js',
// 	    'bootstrap.min.js',
// 	    'fastclick.js',
// 	    'nprogress.js',
// 	    'icheck.min.js',
// 	    'custom.min.js',
// 	],
// 	['block'=>true]
// );
?>