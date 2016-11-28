<?php
$this->Html->addCrumb('Buses', '');
$this->assign('title', 'List Armada');
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		  <div class="x_title">
	      	<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'edit','new'])?> class="btn btn-warning btn-sm pull-right"> Tambah Armada</a>
		    <div class="clearfix"></div>
		  </div>

		<div class="table-responsive">
		  <table class="table" id="tableBuses">
			<thead>
			  <tr class="headings">
				<th class="column-title"><?= $this->Paginator->sort('id') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('name') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('capacity') ?> </th>
				<th class="column-title"><?= $this->Paginator->sort('status') ?> </th>
				<th class="column-title no-link last"><span class="nobr">Action</span></th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach ($buses as $bus): ?>
				<tr>
					<td><?= $this->Number->format($bus->id) ?></td>
					<td><?= $this->Html->link(h($bus->name),(['controller'=>'Buses','action'=>'edit',$bus->id])) ?></td>
					<td><?= $this->Number->format($bus->capacity) ?></td>
					<td><?= $this->Number->format($bus->status) ?></td>
					<td class="actions">
				      	<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'edit',$bus->id])?> class="text-general"><i class="fa fa-edit"></i></a>
						<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $bus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bus->id),'escape'=>false,'class'=>'text-danger']) ?>
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