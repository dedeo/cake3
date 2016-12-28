<!DOCTYPE html>
<html>
<body class="home">
    <?php //debug($routes->toArray()); ?>
    <div class="top-home">
        <div class="home-slider">
            <ul class="slider-list owl-carousel">
                <li class="item"><?= $this->Html->image('slider-img/slider1.jpg', ['alt' => 'Slider Image']);?></li> 
                <li class="item"><?= $this->Html->image('slider-img/slider2.jpg', ['alt' => 'Slider Image']);?></li> 
                <li class="item"><?= $this->Html->image('slider-img/slider3.jpg', ['alt' => 'Slider Image']);?></li> 
                <li class="item"><?= $this->Html->image('slider-img/slider4.jpg', ['alt' => 'Slider Image']);?></li> 
                <li class="item"><?= $this->Html->image('slider-img/slider5.jpg', ['alt' => 'Slider Image']);?></li> 
                <li class="item"><?= $this->Html->image('slider-img/slider6.jpg', ['alt' => 'Slider Image']);?></li> 
            </ul>
        </div>
        <div class="ticket-search ticket-search-home">
            <h1 class="title">Cari Tiket Bus</h1>
            <div class="search-form">
                <form action="<?php echo $this->Url->build(['controller'=>'Tickets','action'=>'search'])?>" method="POST">
                    <div class="input-list">
                        <label for="rute-perjalanan"><i class="fa fa-map-marker" aria-hidden="true"></i> Rute Perjalanan</label>
                        <?php echo $this->cell('Routes'); ?>
                    </div>
                     <div class="input-list">
                        <label for="tanggal-berangkat"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Keberangkatan</label>
                        <input type="text" id="tanggal-berangkat" placeholder="Pilih tanggal keberangkatan" name="tglKeberangkatan" required>
                    </div>
                    <div class="input-list">
                        <label for="jumlah-penumpang"><i class="fa fa-user-plus" aria-hidden="true"></i> Jumlah Penumpang</label>
                        <select id="jumlah-penumpang" title="Pilih jumlah penumpang" name="jmlPenumpang" required>
                            <option disabled selected value> Pilih jumlah penumpang </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                    </div>
                   
                  <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->element('cara_pemesanan'); ?>
    
    
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#interviewForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'languages[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            'editors[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 3,
                        message: 'Please choose 2 - 3 editors you know'
                    }
                }
            }
        }
    });
});
</script>
