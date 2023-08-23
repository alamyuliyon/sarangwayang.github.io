  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Riwayat /</span> Transaksi</h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID Pesanan</th>
                              <th>Nama Pelanggan</th>
                              <th>Waktu Transaksi</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php if (empty($invoice)) { ?>
                          <?php } else { ?>
                              <?php foreach ($invoice as $row) : ?>
                                  <tr>
                                      <td><?= $row->order_id ?></td>
                                      <td><?= $row->name ?></td>
                                      <td><?= $row->transaction_time ?></td>
                                      <td>
                                          <?php if ($row->status == "0") { ?>
                                              <button type="button" class="btn rounded-pill btn-label-warning">Ditunda</button>
                                          <?php } else if ($row->status == "1") { ?>
                                              <button type="button" class="btn rounded-pill btn-label-success">Dibayar</button>
                                          <?php } ?>
                                      </td>
                                      <td>
                                          <?php if ($row->status == "0") { ?>
                                              <div class="dropdown">
                                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                      <i class="ti ti-dots-vertical"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                      <a class="dropdown-item" href="<?= site_url('admin/transaction/detail/' . $row->order_id) ?>"><i class="ti ti-eye me-1"></i> Faktur</a>
                                                      <a class="dropdown-item" href="<?= site_url('admin/transaction/confirm/' . $row->order_id) ?>"><i class="ti ti-check me-1"></i> Diterima</a>
                                                  </div>
                                              </div>
                                          <?php } else if ($row->status == "1") { ?>
                                              <div class="dropdown">
                                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                      <i class="ti ti-dots-vertical"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                      <a class="dropdown-item" href="<?= site_url('admin/transaction/detail/' . $row->order_id) ?>"><i class="ti ti-eye me-1"></i> Faktur</a>
                                                  </div>
                                              </div>
                                          <?php } ?>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php } ?>
                  </table>
              </div>
          </div>
          <!--/ Complex Headers -->
      </div>