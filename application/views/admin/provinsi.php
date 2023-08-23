  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar</span> Provinsi <button data-bs-toggle="modal" data-bs-target="#enableOTP" style="float: right;" class="btn btn-primary"><i class="ti ti-plus"></i>&nbsp; Buat</button></h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Provinsi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($prov as $row) : ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $row->provinsi ?></td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enableOTP<?= $row->id_provinsi ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                                              <a class="dropdown-item" href="<?= site_url('admin/province/delete/' . $row->id_provinsi) ?>"><i class="ti ti-trash me-1"></i> Hapus</a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                  </table>
              </div>
          </div>
          <!--/ Complex Headers -->
      </div>

      <!-- Add Modal -->
      <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
              <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                          <h3 class="mb-2">Tambah Informasi Provinsi</h3>
                          <p>Detail Provinsi</p>
                      </div>
                      <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/province/save') ?>" method="post">
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Nama Provinsi</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="text" id="modalEnableOTPPhone" name="provinsi" class="form-control phone-number-otp-mask" placeholder="Nama Provinsi" />
                              </div>
                          </div>
                          <div class="col-12">
                              <br>
                              <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan</button>
                              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                  Batal
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- Modal -->

      <!-- Modal edit -->
      <?php foreach ($prov as $row) : ?>
          <div class="modal fade" id="enableOTP<?= $row->id_provinsi ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="text-center mb-4">
                              <h3 class="mb-2">Edit Informasi Provinsi</h3>
                              <p>Detail Provinsi</p>
                          </div>
                          <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/province/update') ?>" method="post">
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Nama Provinsi</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="hidden" name="id_provinsi" value="<?= $row->id_provinsi ?>">
                                      <input type="text" id="modalEnableOTPPhone" name="provinsi" class="form-control phone-number-otp-mask" value="<?= $row->provinsi ?>" />
                                  </div>
                              </div>
                              <div class="col-12">
                                  <br>
                                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan</button>
                                  <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                      Batal
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>
      <!--/ Modal -->