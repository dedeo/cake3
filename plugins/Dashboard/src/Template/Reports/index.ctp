<?php
$this->Html->addCrumb('Routes', '');
$this->assign('title', $title);
?>
<div class="row">
	<div class="filter-report">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#report-harian">PerHari</a></li>
		    <li><a data-toggle="tab" href="#report-bulanan" >PerBulan</a></li>
		</ul>
	</div>
	<div class="filter-content tab-content">
		<div class="tab-pane active" id="report-harian">
			<div class="selection-report" style="padding:10px;">
				<label for="startDate">Date Single:</label>
	    		<input type="text" name="datesingle" value=""/>
	    		<a href="#" class="btn btn-warning btn-sm pull-right"> Apply</a>
	    		<a href="#" onclick="harianPrint()" class="btn btn-warning btn-sm pull-right"> Print</a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_content">

					<div class="table-responsive">
					  <table class="table" id="tableRoutes" style="border: 1px;font-size: 12px;width:100%;">
						<thead>
						  <tr class="headings">
							<th class="column-title">Bus</th>
							<th class="column-title">Tanggal</th>
							<th class="column-title">Rute</th>
							<th class="column-title">Jumlah Penumpang</th>
							<th class="column-title">Harga</th>
							<th class="column-title">Total Harga</th>
						  </tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
					</div>
				  </div>
				</div>
				<div class="paginator">
				</div>
			</div>
			
		</div>
		<div class="tab-pane" id="report-bulanan">
			<div class="selection-report" style="padding:10px;">
				<label for="startDate">Date Range:</label>
	    		<input type="text" name="daterange" value=""/>
	    		<a href="#" class="btn btn-warning btn-sm pull-right"> Apply</a>
	    		<a href="#" onclick="bulananPrint()" class="btn btn-warning btn-sm pull-right"> Print</a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_content">

					<div class="table-responsive">
					  <table class="table" id="tableRoutes" style="border: 1px;font-size: 12px;width:100%;">
						<thead>
						  <tr class="headings">
							<th class="column-title">No Bus</th>
							<th class="column-title">Rute</th>
							<th class="column-title">Jumlah Penumpang</th>
							<th class="column-title">Harga</th>
							<th class="column-title">Total Harga</th>
						  </tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
					</div>
				  </div>
				</div>
				<div class="paginator">
				</div>
			</div>
		</div>
	</div>

	<iframe id="ifmcontentharian" style="height: 0px; width: 0px; display: none"></iframe>
	<iframe id="ifmcontentbulanan" style="height: 0px; width: 0px; display: none"></iframe>
</div>

<?php $this->Html->scriptStart(['block'=>true]);?>
	$(document).ready(function() {
		$('input[name="daterange"]').daterangepicker();
		$('input[name="datesingle"]').daterangepicker({
	        singleDatePicker: true,
	        showDropdowns: true
	    });
	});

	function harianPrint(){
		var content = document.getElementById("report-harian");
		var pri = document.getElementById("ifmcontentharian").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	};

	function bulananPrint(){
		var content = document.getElementById("report-bulanan");
		var pri = document.getElementById("ifmcontentbulanan").contentWindow;
		pri.document.open();
		pri.document.write(content.innerHTML);
		pri.document.close();
		pri.focus();
		pri.print();
	}
<?php $this->Html->scriptEnd(); ?>