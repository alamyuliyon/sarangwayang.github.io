<!-- Halaman Daftar Pencarian Produk -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section hero-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Pencarian Kategori</p>
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
                                        <input type="text" class="form-control" name="keyword" placeholder="Cari Berdasarkan Nama atau Harga">
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

        <div class="row product-lists">
            <?php foreach ($search as $row) : ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href=""><img src="<?= base_url() . '/uploads/' . $row->gambar ?>" alt=""></a>
                        </div>
                        <h3><a href="" class="text-dark"><?= $row->nama_brg ?></a></h3>
                        <p class="product-price"><span><?= $row->kategori ?></span> Rp <?= number_format($row->harga) ?> </p>
                        <a href="<?= base_url('login') ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Penutup Bagian Produk -->