<!-- Halaman Daftar Produk Pelanggan -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section hero-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Daftar</p>
                    <h1>Produk</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Breadcrumb -->

<!-- Pembuka Bagian Produk -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 text-center">
                        <div class="single-product-item">
                            <form action="<?php echo site_url('welcome/search_product'); ?>" method="get">
                                <br><br>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 text-center ml-4">
                                        <select name="kategori" class="form-control">
                                            <option hidden value="">Pilih Kategori</option>
                                            <?php foreach ($kat as $c) : ?>
                                                <option value="<?= $c->category ?>"><?= $c->category ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-md-6 text-center">
                                        <input type="text" class="form-control" name="keyword" placeholder="Cari Berdasarkan Nama Atau Harga">
                                    </div>
                                    <div class="col-lg-1 col-md-6 text-center">
                                        <button type="submit" value="submit" class="btn btn-dark">
                                            <b>Cari</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
</div>
<!-- Penutup Bagian Produk -->