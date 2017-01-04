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

		<div class="table-responsive">
		  <table class="table" id="tableRoutes">
	        <thead>
	            <tr>
	                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('day','Hari') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('route_id','Rute') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('bus_id','Bus') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('Routes.fare','Harga') ?></th>
	                <!-- <th scope="col"><?= $this->Paginator->sort('create_at') ?></th> -->
	                <th scope="col"><?= $this->Paginator->sort('departure_time','Berangkat') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('arival_time','Datang') ?></th>
	                <!-- <th scope="col"><?= $this->Paginator->sort('status') ?></th> -->
	                <th scope="col" class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($schedules as $schedule): ?>
	            <tr>
	                <td><?= $this->Number->format($schedule->id) ?></td>
	                <td><?= $this->MyDate->getLabel($schedule->day) ?></td>
	                <td><?= $schedule->has('route') ? $this->Html->link($schedule->route->name, ['controller' => 'Schedules', 'action' => 'edit', $schedule->id]) : '' ?></td>
	                <td><?= $schedule->has('bus') ? $schedule->bus->name : '' ?></td>
	                <td><?= $this->Number->format($schedule->route->fare) ?></td>
	                <!-- <td><?= $this->Number->format($schedule->create_at) ?></td> -->
	                <td><?= $this->Time->format($schedule->departure_time,'HH:mm') ?></td>
	                <td><?= $this->Time->format($schedule->arival_time,'HH:mm') ?></td>
	                <!-- <td><?= $this->Number->format($schedule->status) ?></td> -->
					<td class="actions">
				      	<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'edit',$schedule->id])?> class="text-general"><i class="fa fa-edit"></i></a>
						<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id),'escape'=>false,'class'=>'text-danger']) ?>
					</td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>

<!-- 			<thead>
			  <tr class="headings">
				<th class="column-title"><?= $this->Paginator->sort('id','Id') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('source','Kota Asal') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('destination','Kota Tujuan') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('distance','Jarak') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('fare','Tarif') ?> </th>
				<!-- <th class="column-title"><?= $this->Paginator->sort('') ?> </th>
				<th class="column-title no-link last"><span class="nobr">Action</span></th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach ($routes as $route): ?>
				<tr>
					<td><?= $this->Number->format($route->id) ?></td>
					<td><?= $this->Html->link(h($route->source),(['controller'=>'Routes','action'=>'edit',$route->id])) ?></td>
					<td><?= $route->destination ?></td>
					<td><?= $route->distance ?> Km</td>
					<td>Rp <?= $route->fare ?></td>
					<td class="actions">
				      	<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'edit',$route->id])?> class="text-general"><i class="fa fa-edit"></i></a>
						<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id),'escape'=>false,'class'=>'text-danger']) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody> -->
		  </table>
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