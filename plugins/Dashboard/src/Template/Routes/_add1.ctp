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
                            <!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
                        </div>
                    </div>
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
                                    'required'=>'required'
                                ]); ?>
                            <!-- <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> -->
                        </div>
                    </div>

                    <hr>
                    <table>
                        <thead>
                            <th>Kota Tujuan</th>
                            <th>Jarak</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                        <?php $destinations = $route->route_destinations; ?>    
                        <?php //debug($destinations)?>                  
                        <?php for ($i=0; $i<5 ; $i++) { ?> 
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->select('route_destinations.'.$i.'.city',$cities, 
                                            [
                                                // 'options'=>$cities,
                                                'class'=>'form-control',
                                                // 'id'=>'destination'.$i.'-city',
                                                'empty'=>'-Pilih Kota Tujuan-',
                                                'label'=>false,
                                                // 'value'=>$destinations[$i]->city

                                            ]);
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('route_destinations.'.$i.'.distance', 
                                            [
                                                'class'=>'form-control',
                                                // 'id'=>'destination'.$i.'-city',
                                                'label'=>false,
                                                'placeholder'=>'Jarak'
                                            ]);
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('route_destinations.'.$i.'.fare', 
                                            [
                                                'class'=>'form-control',
                                                // 'id'=>'destination'.$i.'-city',
                                                'label'=>false,
                                                'placeholder'=>'Tarif'
                                            ]);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

<!--                     
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tujuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $this->Form->input(
                                'destination', 
                                [
                                    'label' => false,
                                    'value' => '',
                                    'class'=>'form-control col-md-7 col-xs-12',
                                    'required'=>'required'
                                ]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jarak
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input(
                                'distance', 
                                [
                                    'type'=>'number',
                                    'label' => false,
                                    'class'=>'form-control col-md-7 col-xs-12 has-feedback-right'
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
 -->                    
                    <!-- <div class="ln_solid"></div> -->

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