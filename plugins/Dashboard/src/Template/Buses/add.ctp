<?php
$this->Html->addCrumb('Buses', '');
$this->assign('title', 'Tambah Armada Baru');
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
<!-- 				<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'add'])?> class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Simpan</a> -->
				<button class="btn btn-success btn-sm pull-right" onclick="newBus()"><i class="fa fa-plus"></i> Simpan</button>
				<a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'index'])?> class="btn btn-primary btn-sm pull-right"><i class="fa fa-cross"></i> Batal</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php echo $this->Form->create($bus, ['id'=>'newBusForm','class'=>'form-horizontal form-label-left','data-parsley-validate']) ?>
				<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Polisi <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->text(
								'plat_no', 
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Tipe <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->select(
								'class', 
								$this->Bus->toOptionsArray(),
								[
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required',
									'onchange' =>'getCapacity(this)'
								]); ?>
							<?php echo $this->Form->hidden('capacity',['id'=>'capacity']) ?>
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status Armada</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'status', 
								[
									'options'=>['0'=>'Non Aktif','1'=>'Aktif'],
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
<script type="text/javascript">
	function getCapacity(elm){
		var capacityArray = <?php echo json_encode($this->Bus->getCapacity()) ?>;
		var busClass = elm.options[elm.selectedIndex].value;

		// alert(busClass);
		document.getElementById('capacity').value = capacityArray[busClass];
	}

	function newBus(){
		var form = document.getElementById("newBusForm");
		// document.getElementById("your-id").addEventListener("click", function () {
	  	console.log(form);
	  	form.submit();
	}
</script>
<?php
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