<!-- Halaman Riwayat Transaksi -->

<!-- Pembuka Breadcrumb -->
<div class="breadcrumb-section breadcrumb-bg1">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Ringkasan</p>
					<h1>Transaksi</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Breadcrumb -->

<!-- Pembuka Riwayat Transaksi Transaksi -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-image">ID Pesanan</th>
								<th class="product-name">Produk</th>
								<th class="product-price">Total Harga</th>
								<th class="product-quantity">Waktu</th>
								<th class="product-total"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pay as $row) : ?>
								<tr>
									<td>UID<?php echo $row->id_invoice; ?></td>
									<td><?php echo $row->nama_barang; ?></td>
									<td>Rp <?php echo number_format($row->total_amount + $row->biaya); ?></td>
									<td><?php echo $row->transaction_time; ?></td>
									<td>
										<?php if ($row->status == "0") { ?>
											<span class="btn btn-sm btn-warning text-white"><small>Sedang Diproses</small></span>
										<?php } else if ($row->status == "1") { ?>
											<span class="btn btn-sm btn-success text-white"><small>Diterima</small></span>
										<?php } ?>
									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Penutup Riwayat Transaksi -->

