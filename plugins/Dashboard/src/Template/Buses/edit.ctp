<?php
$this->Html->addCrumb('Buses', '');
$this->assign('title', $title);
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href='#' class="btn btn-warning btn-sm pull-right" id="saveBtn">Simpan</a>
				<!-- <a href='#' class="btn btn-general btn-sm pull-right" id="saveNewBtn">Simpan Sebagai Baru</a> -->
				<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php echo $this->Form->create($bus, ['url'=>['action'=>''],'id'=>'busesForm','class'=>'form-horizontal form-label-left','data-parsley-validate']) ?>
				<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Armada <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'name', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kapasitas <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'capacity', 
								[
									'type'=>'number',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status Armada</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'status', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
						</div>
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
	  $( "#busesForm" ).submit();
	});
	$( "#saveNewBtn" ).click(function() {
	  // $( "form #busesForm" ).submit();
	  var data = $("busesForm").serialize();
	  alert( "Data Loaded: " + data );
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