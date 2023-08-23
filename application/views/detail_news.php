<!-- Halaman Detail Wiracarita -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Baca Detail</p>
                    <h1>Wiracarita</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Breadcrumb -->

<!-- Pembuka Bagian Detail Wiracarita -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <div class="single-artcile-bg" style="background-image: url('<?= base_url() . '/uploads/' . $detail->gambar ?>')"></div>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> <?= $detail->nama_user ?></span>
                            <span class="date"><i class="fas fa-calendar"></i> <?php echo date('d F, Y', strtotime($detail->tgl_posting)); ?></span>
                        </p>
                        <h2><?= $detail->judul ?></h2>
                        <p><?= $detail->isi_berita ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Bagian Detail Wiracarita -->