<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">


            <!-- Statistics -->
            <div class="col-xl-12 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Informasi Penjualan</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= $cart ?></h5>
                                        <small>Pelanggan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= number_format($cust) ?></h5>
                                        <small>Admin</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?= number_format($product) ?></h5>
                                        <small>Produk</small>
                                    </div>
                                </div>
                            </div>
							<div class="col-md-3 col-6">
								<div class="d-flex align-items-center">
									<div class="badge rounded-pill bg-label-warning me-3 p-2">
										<i class="ti ti-currency-dollar ti-sm"></i>
									</div>
									<div class="card-info">
										<h5 class="mb-0">Rp <?= number_format($ongkir) ?></h5>
										<small>Biaya Pengiriman</small>
									</div>
								</div>
							</div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">Rp <?= number_format($biaya) ?></h5>
                                        <small>Pendapatan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics -->

            <!-- Invoice table -->
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="table-responsive card-datatable">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Waku Pembayaran</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $row) : ?>
                                    <tr>
                                        <td><a href="<?= site_url('admin/transaction/detail/' . $row['order_id']) ?>"><?= $row['tracking_id']; ?></a></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?php echo date('d F Y | h:i:s', strtotime($row['transaction_time'])); ?></td>
                                        <td>Rp <?php echo number_format($row['subtotal']) ?></td>
                                        <td>
                                            <?php if ($row['status'] == "0") { ?>
                                                <span class="badge rounded-pill bg-label-warning">Ditunda</span>
                                            <?php } else if ($row['status'] == "1") { ?>
                                                <span class="badge rounded-pill bg-label-success">Dibayar</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Invoice table -->
        </div>
    </div>
    <!-- / Content -->
