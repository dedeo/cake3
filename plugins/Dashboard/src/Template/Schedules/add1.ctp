<?php
$this->Html->addCrumb('Schedules', '');
$this->assign('title', $title);
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href='#' class="btn btn-warning btn-sm pull-right" id="saveBtn">Simpan</a>
				<a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php echo $this->Flash->render() ?>
				<?php echo $this->Form->create($schedule, ['id'=>'scheduleForm','class'=>'form-horizontal form-label-left','data-parsley-validate']) ?>
				<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hari Keberangkatan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php 
								// echo $this->Form->input(
								// 'day',
								// [
								// 	'empty'=>'- Pulih Hari Keberangkatan -',
								// 	'options' => $this->MyDate->toOptionsArray(),
								// 	'label' => false,
								// 	'class'=>'form-control col-md-7 col-xs-12',
								// 	'required'=>'required'
								// ]); 
	                            echo $this->Form->select(
	                                'day',
	                                $this->MyDate->toOptionsArray(), [
	                                    'multiple' => 'checkbox',
	                                    'required'=>'required'
	                                ]);
								?>

							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rute <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'route_id',
								[
									'empty'=>'- Pulih Rute -',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required',
									'onChange'=>'routeChange(this)'
								]); ?>
							<input type="hidden" name='route_name' id="route_name">
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bus <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'bus_id', 
								[
									'empty'=>'- Pulih Bus -',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required',
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jam Keberangkatan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->time(
								'departure_time', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jam Kedatangan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->time(
								'arival_time', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
					
					</div>
					<!-- <div class="ln_solid"></div> -->

				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function routeChange(element){
		var routeName = element.options[element.selectedIndex].text;
		document.getElementById('route_name').value = routeName;
	}
</script>

<?php 
$this->Html->scriptStart(['block'=>true]); ?>
	$( "#saveBtn" ).click(function() {
	  $( "#scheduleForm" ).submit();
	});
	$( "#saveNewBtn" ).click(function(e) {
	  // $( "form" ).submit();
	  var data = $("form").serialize();
	  // alert( "Data Loaded: " + data );
	  e.preventDefault();
	  $('#scheduleForm').attr('action',"/dashboard/schedules/edit/new");
	  $( "#scheduleForm" ).submit();
	});

<?php $this->Html->scriptEnd();
// $this->Html->script(
//  [
//      'jquery.min.js',
//      'bootstrap.min.js',
//      'fastclick.js',
//      'nprogress.js',
//      'icheck.min.js',
//      'custom.min.js',
//  ],
//  ['block'=>true]
// );
?>