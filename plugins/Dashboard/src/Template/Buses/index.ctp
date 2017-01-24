<?php
$this->Html->addCrumb('Buses', '');
$this->assign('title', 'List Armada');
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		  <div class="x_title">
	      	<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'add'])?> class="btn btn-success btn-sm pull-right"> Tambah Armada</a>
		    <div class="clearfix"></div>
		  </div>

		<div class="table-responsive">
		  <table class="table" id="tableBuses">
			<thead>
			  <tr>
				<th class="column-title">#</th>
				<th class="column-title">Plat No</th>
				<th class="column-title">Tipe/Class</th>
				<th class="column-title">Kapasitas</th>
				<!-- <th class="column-title">Status</th> -->
				<th class="column-title no-link last"><span class="nobr">Action</span></th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach ($buses as $bus): ?>
				<tr>
					<td><?= $this->Number->format($bus->id) ?></td>
					<td><?= $this->Html->link(h($bus->name),(['controller'=>'Buses','action'=>'edit',$bus->id])) ?></td>
					<td><?= $this->Bus->getLabel($bus->class); ?></td>
					<td><?= $bus->capacity; ?></td>
					<!-- <td><?php //echo $this->Number->format($bus->status) ?></td> -->
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
	</div>
</div>

<?php 
	echo $this->Html->script([
		'Dashboard.jquery.dataTables.min',
		'Dashboard.dataTables.bootstrap.min',
		'Dashboard.dataTables.custom',
		'Dashboard.dataTables.buttons.min'],['block'=>'script']);
?>
<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('#tableBuses').dataTable();
	});
<?php $this->Html->scriptEnd(); ?>
