<?php
$this->Html->addCrumb('Routes', '');
$this->assign('title', $title);
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <button class="btn btn-warning btn-sm pull-right" onclick="newRoute()" id="saveBtn">Simpan</button>
                <!-- <a href='#' class="btn btn-general btn-sm pull-right" id="saveNewBtn">Simpan Sebagai Baru</a> -->
                <a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'index'])?> class="btn btn-general btn-sm pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo $this->Form->create($route, ['id'=>'routesForm','class'=>'form-horizontal form-label-left','data-parsley-validate']) ?>
                <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
                <!-- 
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Rute <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input(
                                'name', 
                                [
                                    'label' => false,
                                    'class'=>'form-control col-md-7 col-xs-12',
                                    'required'=>'required',
                                    'placeholder'=> 'contoh: MAKASAR - SOROWAKO - BONE'
                                ]); ?>
                        </div>
                    </div> -->
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kota Asal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input(
                                'source', 
                                [
                                    'options'=>$cities,
                                    'label' => false,
                                    'empty'=>'-Pilih Kota Asal-',
                                    'class'=>'form-control col-md-7 col-xs-12',
                                    'required'=>'required',
                                    // 'default'=>8
                                ]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tujuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input(
                                'destination', 
                                [
                                    'options' => $cities,
                                    'label' => false,
                                    // 'value' => '',
                                    'class'=>'form-control col-md-7 col-xs-12',
                                    'empty'=>'-Pilih Kota Tujuan-',
                                    'required'=>'required'
                                ]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sub Rute Dari <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input(
                                'parent_route', 
                                [
                                    'options' => $routeList,
                                    'label' => false,
                                    // 'value' => '',
                                    'class'=>'form-control col-md-7 col-xs-12',
                                    'empty'=>'-Pilih Rute Utama-',
                                    'required'=>'required'
                                ]); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function newRoute(){
        var form = document.getElementById("routesForm");
        // document.getElementById("your-id").addEventListener("click", function () {
        console.log(form);
        form.submit();
    }
</script>