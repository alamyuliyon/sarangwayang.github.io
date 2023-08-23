<!-- Halaman Detail Produk -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Detail</p>
                    <h1>Produk</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Breadcrumb -->

<!-- Pembuka Bagian Produk Tunggal -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="<?= base_url() . '/uploads/' . $detail->gambar ?>" width="400" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3><?= $detail->nama_brg ?></h3>
                    <p class="single-product-pricing">Rp <?= number_format($detail->harga) ?></p>
                    <p><?= $detail->keterangan ?></p>
                    <div class="single-product-form">
                        <p><strong>Kategori: </strong><?= $detail->kategori ?></p>
                        <?php if ($this->session->userdata('id_user')) { ?>
                            <p><a href="<?= site_url('dashboard/cart/' . $detail->id_brg) ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</a></p>
                        <?php } else { ?>
                            <p><a href="<?= site_url('login') ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Produk Tunggal -->

<!-- Pembuka Bagian Produk Lainnya -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Produk </span>Terkait</h3>
                    <p>Cari Produk Wayang Lainnya</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related_products as $product) { ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= base_url('welcome/detail_product/' . $product->id_brg . '/' . url_title($product->nama_brg)) ?>"><img src="<?= base_url() . '/uploads/' . $product->gambar ?>" alt=""></a>
                        </div>
                        <h3><?= $product->nama_brg ?></h3>
                        <p class="product-price"><span><?= $product->kategori ?></span> Rp <?= number_format($product->harga) ?> </p>
                        <a href="<?= site_url('login') ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Penutup Bagian Produk Lainnya -->