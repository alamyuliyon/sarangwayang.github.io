<!-- Halaman Profil -->

<!-- Pembuka Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Profil</p>
                    <h1>Sarangwayang</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Breadcrumb -->

<!-- Pembuka Visi dan Misi -->
<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">VISI <span class="orange-text">DAN MISI</span></h2>
                    <div class="row">
                        <?php foreach ($about as $row) : ?>
                            <div class="col-lg-12 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="content">
                                        <h3><?= $row->judul ?></h3>
                                        <p><?= $row->slug ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Visi dan Misi -->

<!-- Pembuka Profil Pengrajin -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>PROFIL</h3>
                    <p>Telah Menggeluti Bidang Tatah Sungging Selama 30 Tahun</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-1"></div>
                    <h4>Nurwihadi <span>Pengrajin Wayang</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Profil Pengrajin -->