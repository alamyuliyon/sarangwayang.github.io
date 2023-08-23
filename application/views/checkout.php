<!-- Halaman Transaksi -->

<!-- Pembuka Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Selesaikan</p>
					<h1>Transaksi</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Breadcrumb -->

<!-- Pembuka Selesaikan Transaksi -->
<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Alamat Tagihan
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<form action="<?= site_url('dashboard/submit') ?>" method="post" enctype="multipart/form-data">
											<input type="hidden" name="order_id" value="<?= mt_rand(0000000, 1111111) ?>" maxlength="8" autocomplete="off" required>
											<input type="hidden" name="tracking_id" value="<?= mt_rand(0000000000000, 1111111111111) ?>" maxlength="12" autocomplete="off" required>
											<input type="hidden" name="id_user" id="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
											<input type="hidden" name="status" id="status" value="0">
											<input type="hidden" name="biaya" id="biaya" class="form-control">
											<input type="hidden" name="etd" class="etd">
											<input type="hidden" name="subtotal" class="subtotal">

											<p><input type="text" name="name" value="<?php echo $this->session->userdata('nama_user') ?>"></p>
											<p><input type="email" name="email" value="<?php echo $this->session->userdata('email') ?>"></p>
											<p><input type="tel" name="mobile_phone" value="<?php echo $this->session->userdata('no_telp') ?>"></p>
											<p><input type="text" name="alamat" value="<?php echo $this->session->userdata('alamat') ?>"></p>
											<p>
												<select class="form-control" name="id_provinsi" id="id_provinsi">
													<option value="">Pilih Provinsi</option>
												</select>
											</p>
											<p>
												<select class="form-control" name="id_kabupaten" id="id_kabupaten">
												</select>
											</p>
											<p><input type="text" name="kode_pos" placeholder="Kode Pos"></p>
											<!-- Select box untuk kurir -->

											<p>
												<select class="form-control" name="courier" id="courier">
													<option value="">Pilih Jasa Pengiriman</option>
													<option value="jne">JNE</option>
													<option value="tiki">TIKI</option>
													<option value="pos">POS</option>
												</select>
											</p>

											<!-- Select box untuk layanan -->
											<p>
												<select class="form-control" name="service" id="service">
													<!-- Opsi layanan akan diisi menggunakan JavaScript berdasarkan pilihan kurir -->
												</select>
											</p>
											<p><textarea name="keterangan" id="bill" cols="30" rows="10" placeholder="Keterangan (opsional)"></textarea></p>
											<button type="submit" class="btn btn-dark">Simpan</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-4">
				<div class="order-details-wrap">
					<table class="order-details">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							<tr>
								<td>Produk</td>
								<td>Jumlah</td>
							</tr>
							<?php $berat = 0; $total = 0; foreach ($this->cart->contents() as $items) : ?>
							<?php
								$produk = $this->db->where('id_brg', $items['id'])->get('product')->row();
								$tberat = $produk->berat * $items['qty'];
								$ttotal = $items['price'] * $items['qty'];
							?>
								<tr>
									<td><?= $items['name']; ?></td>
									<td>x <?= number_format($items['qty']) ?> Item</td>
								</tr>
							<?php $berat += $tberat; $total += $ttotal; endforeach; ?>

							<input type="hidden" id="weight" value="<?= $berat ?>">
							<input type="hidden" id="total" value="<?= $total ?>">
						</tbody>
						<tbody class="checkout-details">
							<tr>
								<td><b>Subtotal</b></td>
								<td><b>Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></b></td>
							</tr>
							<tr>
								<td><b>Berat</b></td>
								<td><b><?= $berat; ?></b></td>
							</tr>
							<tr>
								<td><b>Ongkir</b></td>
								<td>
									<b>
										<span id="biaya_transport">0</span>
										<br>
										<span id="etd"></span>
									</b>
								</td>
							</tr>
							<tr>
								<td><b>Total</b></td>
								<td><b><span id="total_amount">0</span></b></td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Selesaikan Transaksi -->
