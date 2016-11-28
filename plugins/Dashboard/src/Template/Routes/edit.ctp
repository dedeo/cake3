<?php
$this->Html->addCrumb('Routes', '');
$this->assign('title', $title);
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href='#' class="btn btn-warning btn-sm pull-right" id="saveBtn">Simpan</a>
				<a href='#' class="btn btn-general btn-sm pull-right" id="saveNewBtn">Simpan Sebagai Baru</a>
				<a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php echo $this->Form->create($route, ['url'=>['action'=>null],'id'=>'routesForm','class'=>'form-horizontal form-label-left','data-parsley-validate']) ?>
				<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kota Asal <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'source', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tujuan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'destination', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jarak <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<!-- <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name"> -->
							<?php echo $this->Form->input(
								'distance', 
								[
									'type'=>'number',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12 has-feedback-right',
									'required'=>'required'
								]); ?>
							<span class="form-control-feedback right" aria-hidden="true">Km</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tarif Dasar <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback-left">
							<span class="form-control-feedback left" aria-hidden="true">Rp</span>
							<?php echo $this->Form->input(
								'fare', 
								[
									'type'=>'number',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12 has-feedback-left',
									'required'=>'required'
								]); ?>
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
<?php 
$this->Html->scriptStart(['block'=>true]); ?>
	$( "#saveBtn" ).click(function() {
	  $( "#routesForm" ).submit();
	});
	$( "#saveNewBtn" ).click(function(e) {
	  // $( "form" ).submit();
	  var data = $("form").serialize();
	  // alert( "Data Loaded: " + data );
	  e.preventDefault();
	  $('#routesForm').attr('action',"/dashboard/routes/edit/new");
	  $( "#routesForm" ).submit();
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