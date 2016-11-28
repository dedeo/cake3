<!DOCTYPE html>
<html>
<body class="home">
    <div class="ticket-search ticket-search-home">
        <h1 class="title">Cari Tiket Bus</h1>
        <div class="search-form">
            <form>
                <div class="input-list">
                    <label for="rute-perjalanan"><i class="fa fa-map-marker" aria-hidden="true"></i> Rute Perjalanan</label>
                    <select class="selectpicker" id="rute-perjalanan" title="Pilih rute perjalanan">
                        <option>Makassar - Palopo</option>
                        <option>Makassar - Palopo</option>
                        <option>Makassar - Palopo</option>
                        <option>Makassar - Palopo</option>
                        <option>Makassar - Palopo</option>
                        <option>Makassar - Palopo</option>
                      </select>
                </div>
                 <div class="input-list">
                    <label for="tanggal-berangkat"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Keberangkatan</label>
                    <input type="text" id="tanggal-berangkat" placeholder="Pilih tanggal keberangkatan">
                </div>
                <div class="input-list">
                    <label for="jumlah-penumpang"><i class="fa fa-user-plus" aria-hidden="true"></i> Jumlah Penumpang</label>
                    <select class="selectpicker" id="jumlah-penumpang" title="Pilih jumlah penumpang">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                </div>
               
              <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
            </form>
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
