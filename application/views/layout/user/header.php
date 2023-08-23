<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- Judul Bagian Pelanggan -->
    <title>Pelanggan | Sarangwayang</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('landing-assets') ?>/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?= base_url('landing-assets') ?>/css/responsive.css">


</head>

<body>

    <!-- Pembuka Loading -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!-- Penutup Loading-->

    <!-- Bagian Header -->
    <div id="sticker-sticky-wrapper" class="sticky-wrapper">
        <div class="top-header-area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <div class="main-menu-wrap">
                            <!-- logo -->
                            <div class="site-logo">
                                <a href="<?= base_url('dashboard') ?>">
                                    <img src="<?= base_url('landing-assets') ?>/img/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo -->

                            <!-- Pembuka Menu -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="<?= base_url('dashboard') ?>">Beranda</a></li>
                                    <li><a href="<?= base_url('dashboard/about') ?>">Profil</a></li>
                                    <li><a href="<?= site_url('dashboard/product') ?>">Produk</a></li>
                                    <li><a href="<?= base_url('dashboard/news') ?>">Wiracarita</a></li>
                                    <?php $keranjang = $this->cart->total_items() ?>
                                    <li> <a href="<?= site_url('dashboard/detail_cart') ?>"><i class="fas fa-shopping-basket"></i>&nbsp; (<?php echo $keranjang ?>)</a></li>
                                    <li>
                                        <div class="header-icons">
                                            <a class="shopping-cart"><i class="fas fa-user"></i>&nbsp; Halo, <?php echo $this->session->userdata('nama_user') ?></a>
                                            <ul class="sub-menu">
                                                <li><a href="<?= base_url('profile') ?>">Pengaturan</a></li>
                                                <li><a href="<?= base_url('transaction') ?>">Transaksi</a></li>
                                                <hr>
                                                <li><a href="<?= base_url('login/logout') ?>">Keluar</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            <div class="mobile-menu"></div>
                            <!-- Penutup Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tutup Bagian Header -->