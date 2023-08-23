  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row invoice-preview">
          <!-- Invoice -->
          <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
              <div class="card invoice-preview-card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                          <div class="mb-xl-0 mb-4">
                              <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                  <!--<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                                      <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                      <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                                  </svg>-->

                                  <Span class="app-brand-text fw-bold fs-4"> Sarangwayang </Span>
                              </div>
                              <p class="mb-2">Pertokoan Pati, Jalan Raya Papar - Pare</p>
                              <p class="mb-2">Ngampel - Papar - Kediri - Jawa Timur, Kode Pos 64153, Indonesia</p>
                              <p class="mb-0">0852 3676 2626</p>
                          </div>
                          <div>
                              <h4 class="fw-semibold mb-2">FAKTUR #<?= $invoice->order_id ?></h4>
                              <div class="mb-2 pt-1">
                                  <span>Waktu Transaksi:</span>&nbsp;
                                  <span class="fw-semibold"><?= date('F d, Y', strtotime($invoice->transaction_time)) ?></span>
                              </div>
                              <?php if ($invoice->status == "1") { ?>

                              <?php } else if ($invoice->status == "0") { ?>
                                  <div class="mb-2 pt-1">
                                      <span>Jatuh Tempo:</span>&nbsp;
                                      <span class="fw-semibold"><?= date('F d, Y', strtotime($invoice->payment_limit)) ?></span>
                                  </div>
                              <?php } ?>
                              <div class="pt-1">
                                  <span>Status:</span>&nbsp;
                                  <?php if ($invoice->status == "0") { ?>
                                      <span class="badge rounded-pill bg-label-warning">Ditunda</span>
                                  <?php } else if ($invoice->status == "1") { ?>
                                      <span class="badge rounded-pill bg-label-success">Dibayar</span>
                                  <?php } ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <hr class="my-0" />
                  <div class="card-body">
                      <div class="row p-sm-3 p-0">
                          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                              <h6 class="mb-3">Faktur Ke:</h6>
                              <p class="mb-1"><?= $invoice->name ?></p>
                              <p class="mb-1"><?= $invoice->alamat ?>, <?= $invoice->kode_pos ?></p>
                              <p class="mb-1"><?= $invoice->mobile_phone ?></p>
                              <p class="mb-0"><?= $invoice->email ?></p>
                          </div>
                          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                              <h6 class="mb-4">Detail Transaksi:</h6>
                              <table>
                                  <tbody>
                                      <tr>
                                          <td class="pe-4">ID Pemesanan</td>
                                          <td><strong>ID<?= $invoice->order_id ?></strong></td>
                                      </tr>
                                      <tr>
                                          <td class="pe-4"></td>
                                          <td><?= $invoice->payment_method ?></td>
                                      </tr>
									  <tr>
										  <td class="pe-4">Informasi Pembayaran</td>
										  <td><?= $invoice->service.'<br>'.$invoice->etd ?></td>
									  </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="table-responsive border-top">
                      <table class="table m-0">
                          <thead>
                              <tr>
                                  <th>Item</th>
                                  <th></th>
                                  <th>Harga</th>
								  <th>Kategori</th>
                                  <th>Jumlah</th>
                                  <th>Total Harga</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $total = 0;
                                foreach ($pesanan as $row) :
                                    $subtotal = $row->quantity * $row->price;
                                    $total += $subtotal;
                                ?>
                                  <tr>
                                      <td class="text-nowrap"><?= $row->name ?></td>
                                      <td class="text-nowrap"></td>
                                      <td>Rp <?= number_format($row->price, 0, ',', '.') ?></td>
									  <td><?= $row->kategori ?></td>
                                      <td><?= number_format($row->quantity, 0, ',', '.') ?></td>
                                      <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                  </tr>
                              <?php endforeach; ?>
                              <tr>
                                  <td colspan="4" class="align-top px-4 py-4">
                                      <p class="mb-2 mt-3">
                                          <span class="ms-3 fw-semibold">Admin:</span>
                                          <span>Sarangwayang</span>
                                      </p>
                                      <span class="ms-3">Terima Kasih Telah Berbelanja Di Gerai Sarangwayang!</span>
                                  </td>
                                  <td class="text-end pe-3 py-4">
                                      <p class="mb-2 pt-3">Subtotal:</p>
                                      <p class="mb-2">Biaya Pengiriman:</p>
                                      <p class="mb-0 pb-3">Total:</p>
                                  </td>
                                  <td class="ps-2 py-4">
                                      <p class="fw-semibold mb-2 pt-3">Rp <?= number_format($total, 0, ',', '.') ?></p>
                                      <p class="fw-semibold mb-2">Rp <?= number_format($invoice->biaya, 0, ',', '.') ?></p>
                                      <p class="fw-semibold mb-0 pb-3">Rp <?= number_format($total + $invoice->biaya, 0, ',', '.') ?></p>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>

                  <div class="card-body mx-3">
                      <div class="row">
                          <div class="col-12">
                              <span class="fw-semibold">Catatan:</span>
                              <span>Faktur dibuat di komputer dan berlaku tanpa tanda tangan dan stempel!</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /Invoice -->

          <!-- Invoice Actions -->
          <div class="col-xl-3 col-md-4 col-12 invoice-actions">
              <div class="card">
                  <div class="card-body">
                      <a target="_blank" href="<?= site_url('admin/transaction/pdf/' . $invoice->order_id) ?>" class="btn btn-primary d-grid w-100 mb-2">
                          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-download ti-xs me-1"></i>&nbsp; Unduh PDF</span>
                      </a>
                  </div>
              </div>
          </div>
          <!-- /Invoice Actions -->
      </div>
  </div>
