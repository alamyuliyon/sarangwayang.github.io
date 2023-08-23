<!-- Halaman Keranjang -->

<!-- Pembuka Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Ringkasan</p>
					<h1>Belanja</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Breadcrumb -->

<!-- Pembuka Keranjang -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php if (empty($this->cart->contents())) : ?>
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="error-text">
								<i class="far fa-sad-cry"></i>
								<h1>Keranjang Kosong</h1>
								<p>Silahkan Lakukan Pembelian Produk Kembali</p>
								<a href="<?= site_url('dashboard') ?>" class="boxed-btn">Cari Wayang</a>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Gambar</th>
									<th class="product-name">Nama</th>
									<th class="product-name">Kategori</th>
									<th class="product-name">Berat</th>
									<th class="product-price">Harga</th>
									<th class="product-quantity">Jumlah</th>
									<th class="product-total">Total Harga</th>
									<th class="product-total">Total Berat</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; $total = 0; $berat = 0;
									foreach ($this->cart->contents() as $items) :
									$ttotal = $items['price'] * $items['qty'];
									$tberat = $items['options']['berat'] * $items['qty'];
								?>
									<tr class="table-body-row">
										<td class="product-remove"><a href="<?= site_url('dashboard/delete/' . $items['rowid']) ?>"><i class="far fa-window-close"></i></a></td>
										<td class="product-image"><img src="<?= base_url() . '/uploads/' . $items['options']['gambar']; ?>" alt=""></td>
										<td class="product-name"><?= $items['name']; ?></td>
										<td class="product-name"><?= $items['options']['kategori']; ?></td>
										<td class="product-name"><?= $items['options']['berat']; ?></td>
										<td class="product-price"><?= $items['price']; ?></td>
										<td class="product-quantity">
											<form action="<?php echo base_url('dashboard/update_cart_item/' . $items['rowid']); ?>" method="post">
												<input type="number" name="qty" value="<?= $items['qty']; ?>">
												<input type="hidden" name="price" value="<?= $items['price']; ?>">
												<input type="hidden" name="subtotal" value="<?= $items['subtotal']; ?>">
												<button type="submit" class="btn btn-dark">Update</button>
											</form>
										</td>
										<td class="product-total"><?= $items['subtotal']; ?></td>
										<td class="product-total"><?= $items['options']['berat'] * $items['qty']; ?></td>
									</tr>
								<?php $total += $ttotal; $berat += $tberat; endforeach; ?>

								<tr>
									<td colspan="7">Subtotal</td>
									<td><?= $total ?></td>
									<td><?= $berat ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="<?= site_url('dashboard/checkout') ?>" class="boxed-btn black">Selesaikan Transaksi</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Keranjang -->
