<?php
$this->Html->addCrumb('Rute', '');
$this->assign('title', 'Rute Bus');

// debug($routes);

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#routesList">Daftar Rute Bus</a></li>
		  	<li><a data-toggle="tab" href="#cityList">Daftar Kota</a></li>
		</ul>
		<br>
		<div class="tab-content">
			<div id="routesList" class="tab-pane fade in active">
				<div class="x_panel">
					<div class="x_title">
						<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'add'])?> class="btn btn-warning btn-sm pull-right"> Tambah Rute Bus</a>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="table-responsive">
						  <table class="table" id="tableRoutes">
								<thead>
								  <tr class="headings">
									<th class="column-title"><?= $this->Paginator->sort('id','Id') ?> </th>
									<th class="column-title"><?= $this->Paginator->sort('name','Nama') ?> </th>
									<th class="column-title"><?= $this->Paginator->sort('source','Kota Asal') ?> </th>
									<th class="column-title"><?= $this->Paginator->sort('destination','Kota Tujuan') ?> </th>
									<th class="column-title"><?= $this->Paginator->sort('parent_route','Rute Utama') ?> </th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								  </tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($routes as $route): ?>
									<tr>
										<td><?= $this->Number->format($i); $i++; ?></td>
										<td><?= $this->Html->link(h($route->name),(['controller'=>'Routes','action'=>'edit',$route->id])) ?></td>
										<td><?= $this->City->getName($route->source) ?></td>
										<td><?= $this->City->getName($route->destination) ?></td>
										<td>
										<?php
										if($route->parent_route!=0){
										 	echo $this->Routes->getLabel($route->parent_route);
										}else{
											echo '-';
										}
										?></td>
										<td class="actions">
									      	<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'edit',$route->id])?> class="text-general"><i class="fa fa-edit"></i></a>
												<?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id),'escape'=>false,'class'=>'text-danger']) ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
						  </table>
						</div>
					</div><!-- end content panel -->
				</div>			
			</div>
			<!-- ================================================================================= -->
			<div id="cityList" class="tab-pane fade">
				<div class="row">
					<div class="col-md-8">
						<div class="x_panel">
							<!-- <div class="x_title">
								<h2>Kota</h2>
								<div class="clearfix"></div>
							</div> -->
							<div class="x_content">
							<table class="table" id="tableCities">
								<thead>
								  <tr class="headings">
									<th class="column-title"><?= $this->Paginator->sort('id','Id') ?> </th>
									<th class="column-title"><?= $this->Paginator->sort('name','Nama Kota') ?> </th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								  </tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($cities as $city) { ?>
										<tr>
											<td><?=$i; $i++;?></td>
											<td><?= $city->city;?></td>
											<td></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							</div>							
						</div>
					</div>
					<div class="col-md-4">
						<div class="x_panel">
							<div class="x_title">
								<h2>Tambah City</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<form>
								<div class="form-group">
							 		<input type="text" name="name" class="form-control">
							 		<button>Simpan</button>
								</div>
								</form>
							</div>
						</div>							
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div><!-- end tab-content -->
	</div>
</div><!-- end row -->

<?php 
	echo $this->Html->script([
		'Dashboard.jquery.dataTables.min',
		'Dashboard.dataTables.bootstrap.min',
		'Dashboard.dataTables.buttons.min'],['block'=>'script']);
?>
<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('#tableRoutes').dataTable({
			"columnDefs": [
			    { "width": "10%", "targets": 0 }
			  ],
			"autoWidth": false
			});
		$('#tableCities').dataTable();
	});
<?php $this->Html->scriptEnd(); ?>
