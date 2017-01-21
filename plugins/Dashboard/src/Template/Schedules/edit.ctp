<?php
$this->Html->addCrumb('Schedules', '');
$this->assign('title', $title);
use Cake\Routing\Router;
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
				<?php echo $this->Form->create($schedule, ['id'=>'scheduleForm','class'=>'form-horizontal form-label-left','data-parsley-validate']);
		            echo $this->Form->hidden('id');
		            echo $this->Form->hidden('route_name',['id'=>'route-name']);
		            //echo $this->Form->hidden('class',['id'=>'route-name']);
				?>

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rute <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php echo $this->Form->input(
								'route_id',
								[
									'options' => $routes,
									'empty'=>'- Pulih Rute -',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required',
									'onChange'=>'routeChange(this)'
								]); ?>
						</div>
					</div>

					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bus <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<?php echo $this->Form->input(
								'bus_id', 
								[
									'options' => $buses,
									'empty'=>'- Pulih Bus -',
									'label' => false,
									'class'=>'form-control col-md-7 col-xs-12',
									'required'=>'required',
									'onChange'=>'getBusType()'
								]); ?>
							<!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<?php echo $this->Form->hidden('class',['id'=>'class'])?> 
							<p class="form-control-static" id="bus-type-label"><?php echo $this->Bus->getLabel($schedule->class); ?></p>
						</div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tarif/Harga <span class="required">*</span>
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
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hari Keberangkatan <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<?php 
	                            echo $this->Form->select(
	                                'day',
	                                $this->MyDate->toOptionsArray(), [
										'class'=>'form-control col-md-7 col-xs-12',
										'required'=>'required',
	                                ]);
								?>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	getBusType();

	function routeChange(element){
		var routeName = element.options[element.selectedIndex].text;
		$('#route-name').val(routeName);
		// alert(routeName);
	}

	function getBusType() {
	    var bus=$("#bus-id").val();

	    $.ajax({
	    	type: "POST",
	    	url: "<?php echo Router::url(array('controller'=>'Buses','action'=>'getBusType','_ext'=>'json'));?>",
	    	dataType: "json",
	    	async: false,
	    	data: 'id='+bus,
	    	success: function(data){
	    		$('#class').val(data.data.type);
	    		$('#bus-type-label').text(data.data.label);
	    		// alert(data.data.type);
	    	},
	    	error: function(data){
	    		alert(data);
	    	}
	    });
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