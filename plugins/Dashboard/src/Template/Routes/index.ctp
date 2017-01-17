<?php
$this->Html->addCrumb('Rute', '');
$this->assign('title', 'Rute Bus');

// debug($routes);

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		  <div class="x_title">
	      	<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'add'])?> class="btn btn-warning btn-sm pull-right"> Tambah Rute Bus</a>
		    <div class="clearfix"></div>
		  </div>

		<div class="table-responsive">
		  <table class="table" id="tableRoutes">
			<thead>
			  <tr class="headings">
				<th class="column-title"><?= $this->Paginator->sort('id','Id') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('name','Nama') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('source','Kota Asal') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('destination','Kota Tujuan') ?> </th>
				<th class="column-title no-link last"><span class="nobr">Action</span></th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach ($routes as $route): ?>
				<tr>
					<td><?= $this->Number->format($route->id) ?></td>
					<td><?= $this->Html->link(h($route->name),(['controller'=>'Routes','action'=>'edit',$route->id])) ?></td>
					<td><?= $this->City->getName($route->source) ?></td>
					<td><?= $this->City->getName($route->destination) ?></td>
					<td class="actions">
				      	<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'edit',$route->id])?> class="text-general"><i class="fa fa-edit"></i></a>
						<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id),'escape'=>false,'class'=>'text-danger']) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
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