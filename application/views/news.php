<!-- Halaman Wiracarita -->

<!-- Pembuka Bagian Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Pewayangan</p>
					<h1>Wiracarita</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Bagian Breadcrumb -->

<!-- Pembuka Bagian Wiracarita -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row">
			<?php foreach ($news as $row) : ?>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="<?= base_url('welcome/detail_news/' . $row->id_berita . '/' . url_title($row->judul)) ?>">
							<div class="latest-news-bg news-bg-1" style="background-image: url('<?= base_url() . '/uploads/' . $row->gambar ?>')"></div>

						</a>
						<div class="news-text-box">
							<h3><a href="<?= base_url('welcome/detail_news/' . $row->id_berita . '/' . url_title($row->judul)) ?>"><?= $row->judul ?></a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> <?= $row->nama_user ?></span>
								<span class="date"><i class="fas fa-calendar"></i> <?php echo date('d F, Y', strtotime($row->tgl_posting)); ?></span>
							</p>
							<p class="excerpt"><?= $row->slug ?></p>
							<a href="<?= base_url('welcome/detail_news/' . $row->id_berita . '/' . url_title($row->judul)) ?>" class="read-more-btn">Baca Selengkapnya <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- Penutup Bagian Wiracarita -->