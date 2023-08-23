<!-- Halaman Dashboard Pelanggan -->

<!-- Pembuka Bagian Tampilan Slider -->
<div class="homepage-slider">

    <!-- Slider 1 -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Nyawiji Nguri Uri</p>
                            <h1>Budoyo Jawi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider 2 -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Selamat Datang</p>
                            <h1>Sarangwayang </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider 3 -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Mari Bersama Ikut</p>
                            <h1>Melestarikan Budaya</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Tampilan Slider -->

<!-- Pembuka Tampilan Daftar Keunggulan -->
<div class="list-section pt-80 pb-80">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Pengiriman</h3>
                        <p>Aman Cepat Tepat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>Narahubung</h3>
                        <p>Siap Melayani Informasi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Refund</h3>
                        <p>Kembalikan Produk Jika Rusak</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Penutup Tampilan Daftar Keunggulan -->

<!-- Pembuka Tampilan Produk -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">PRODUK</span> PILIHAN</h3>
                    <p>Tersedia Berbagai Macam Kategori Wayang</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($product as $p) : ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= base_url('dashboard/detail_product/' . $p->id_brg . '/' . url_title($p->nama_brg)) ?>"><img src="<?= base_url() . '/uploads/' . $p->gambar ?>" alt=""></a>
                        </div>
                        <h3><?= $p->nama_brg ?></h3>
                        <p class="product-price"><span><?= $p->kategori ?></span> Rp <?= number_format($p->harga) ?> </p>
                        <a href="<?= site_url('dashboard/cart/' . $p->id_brg) ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5 text-center">
            <a href="<?= site_url('dashboard/product') ?>" class="boxed-btn">Cari Produk Lainnya</a>
        </div>
    </div>
</div>
<!-- Penutup Tampilan Produk -->

<!-- Pembuka Bagian Carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="landing-assets/img/company-logos/icon-1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="landing-assets/img/company-logos/icon-2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="landing-assets/img/company-logos/icon-3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="landing-assets/img/company-logos/icon-4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Carousel -->

<!-- Pembuka Tampilan Wiracarita -->
<div class="latest-news pt-80 pb-100">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">CERITA</span> PEWAYANGAN</h3>
                    <p>Ketahui Epos Pewayangan Nusantara</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($news as $n) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="<?= base_url('welcome/detail_news/' . $n->id_berita . '/' . url_title($n->judul)) ?>">
                            <div class="latest-news-bg news-bg-1" style="background-image: url('<?= base_url() . '/uploads/' . $n->gambar ?>')"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="<?= base_url('welcome/detail_news/' . $n->id_berita . '/' . url_title($n->judul)) ?>"><?= $n->judul ?></a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> <?= $n->nama_user ?></span>
                                <span class="date"><i class="fas fa-calendar"></i> <?php echo date('d F, Y', strtotime($n->tgl_posting)); ?></span>
                            </p>
                            <p class="excerpt"><?= $n->slug ?></p>
                            <a href="<?= base_url('welcome/detail_news/' . $n->id_berita . '/' . url_title($n->judul)) ?>" class="read-more-btn">Baca Selengkapnya <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?= site_url('dashboard/news') ?>" class="boxed-btn">Baca Cerita Lainnya</a>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Tampilan Wiracarita -->