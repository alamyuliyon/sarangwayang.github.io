<!-- Halaman Profil Pelanggan -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Pengaturan</p>
                    <h1>Akun</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Breadcrumb -->

<!-- Pembuka Bagian Pengaturan Akun Pelanggan -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Informasi Pribadi
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <?php foreach ($user as $row) : ?>
                                            <form action="<?= site_url('profile/update') ?>" method="post">
                                                <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                                <p>
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama_user" value="<?= $row->nama_user ?>">
                                                </p>
                                                <p>
                                                    <label for="">Nomor Telephone</label>
                                                    <input type="text" name="no_telp" value="<?= $row->no_telp ?>">
                                                </p>
                                                <p>
                                                    <label for="">Alamat</label>
                                                    <textarea name="alamat" id="bill" cols="30" rows="10"><?= $row->alamat ?></textarea>
                                                </p>
                                                <button type="submit" class="btn btn-dark text-white">Simpan</button>
                                            </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Ganti Password
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <?php foreach ($user as $row) : ?>
                                            <form action="<?= site_url('profile/reset') ?>" method="post">
                                                <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                                <p>
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" value="<?= $row->email ?>">
                                                </p>
                                                <p>
                                                    <label for="">Password Baru</label>
                                                    <input type="text" name="password">
                                                </p>
                                                <button type="submit" class="btn btn-dark text-white">Simpan</button>
                                            </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Pengaturan Akun Pelanggan -->
