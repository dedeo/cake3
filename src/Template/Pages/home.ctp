<!DOCTYPE html>
<html>
<body class="home">
    <div class="ticket-search ticket-search-home">
        <h1 class="title">Cari Tiket Bus</h1>
        <div class="search-form">
            <?= $this->element('search'); ?>
        </div>
    </div>
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
</body>
</html>
