<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Bintang Timur: Bus untuk anda semua';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Bintang Timur
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-select.min.css') ?>
    <?= $this->Html->css('global.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('owl.theme.default.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    
    <?= $this->Html->script('jquery-1.11.3');?>
    <?= $this->Html->script('jquery-3.1.1.min');?>
    <?= $this->Html->script('owl.carousel');?>
    <?= $this->Html->script('appjquery');?>
    <?= $this->Html->script('bootstrap.min');?>
    <?= $this->Html->script('bootstrap-select.min');?>
    <?= $this->Html->script('jquery-ui.min');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- Header -->
    <div id="header">
        <div id="header-container">
            <a href="/pages/home" class="logo-header">
                <?= $this->Html->image('logo.png', ['alt' => 'Bintang Timur']);?>
            </a>
            <div class="menulist-mobile"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;</div>
            <ul class="menu-list">
                <li class="check-ticket">
                    <a href="/tickets/check"><i class="fa fa-book" aria-hidden="true"></i> Cek Ticket</a>
                </li>
                <li class="contact-us">
                    <a href="/pages/bantuan#contact_us"><i class="fa fa-phone" aria-hidden="true"></i> Kontak Kami</a>
                </li>
                <li class="login-menu">
                    <?php $user = $this->request->session()->read('Auth.User'); ?>
                    <?php //debug($user) ?>
                    <?php if($user){ ?>
                        <a href="/users/logout"><i class="fa fa-user" aria-hidden="true"></i> Logout</a>
                    <?php }else{ ?>
                        <a href="/users/login"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Header -->

    <?= $this->Flash->render() ?>
    <div id="main-container">
        <?= $this->fetch('content') ?>
    </div>
    
    <!-- Footer -->
    <div id="footer">
        <div id="footer-container">
            <div class="bantuan-footer">
                <h1>Bantuan</h1>
                <?= $this->Html->link(
                    'Cara Pemesanan',
                    '/pages/bantuan#cara_pesan',
                    ['class' => 'cara-pemesanan']
                );?>
                <?= $this->Html->link(
                    'Kontak Kami',
                    '/pages/bantuan#contact_us',
                    ['class' => 'contact-us']
                );?>
                <?= $this->Html->link(
                    'Tentang Bintang Timur',
                    '/pages/bantuan#about_us',
                    ['class' => 'about-us']
                );?>
            </div>
            <div class="media-sosial">
                <h1>Media Sosial</h1>
                <ul>
                    <li class="medsos-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                    <li class="medsos-fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                </ul>
            </div>
            <div class="rute-footer">
                <h1>Rute yang Tersedia (Dari/Ke Makassar)</h1>
                <ul class="rute-list">
                    <li>Sorowako</li>
                    <li>Wawondula</li>
                    <li>Wasuponda</li>
                    <li>Malili</li>
                    <li>Mangkutana</li>
                    <li>Kalaena Kiri</li>
                    <li>Bone Bone</li>
                    <li>Sukamaju</li>
                    <li>Masamba</li>
                    <li>Tolada</li>
                    <li>Seriti</li>
                    <li>Lamasi</li>
                    <li>Batusitanduk</li>
                    <li>Rantaidamai</li>
                    <li>Palopo</li>
                    <li>Belopa</li>
                    <li>Bajo</li>
                    <li>Toraja</li>
                    <li>Mamuju</li>
                </ul>
            </div>
        </div>
        <div class="copy-right">
            Copyright @2016 Kenyok, Inc. All rights reserved.
        </div>
    </div>
    <!-- End footer -->
</body>
</html>
