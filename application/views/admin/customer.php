  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar </span> Admin <button data-bs-toggle="modal" data-bs-target="#enableOTP" style="float: right;" class="btn btn-primary"><i class="ti ti-plus"></i>&nbsp; Buat</button></h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Nomor Telepon</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($customer as $row) : ?>
                              <tr>
                                  <td><?= $row->nama_user ?></td>
                                  <td><?= $row->email ?></td>
                                  <td><?= $row->no_telp ?></td>
                                  <td>Admin</td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enableOTP<?= $row->id_user ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
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
          <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
              <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                          <h3 class="mb-2">Tambah Informasi Admin</h3>
                          <p>Buat Akun Baru</p>
                      </div>
                      <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/customer/save') ?>" method="post">
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Nama Lengkap</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="hidden" name="level" value="1">
                                  <input type="text" id="modalEnableOTPPhone" name="nama_user" class="form-control" placeholder="Nama Lengkap" />
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Email</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="text" id="modalEnableOTPPhone" name="email" class="form-control" placeholder="Email" />
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Nomor Telephone</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="text" id="modalEnableOTPPhone" name="no_telp" class="form-control phone-number-otp-mask" placeholder="Nomor Telephone" />
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Alamat</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <textarea id="modalEnableOTPPhone" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Password</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-lock"></i></span>
                                  <input type="password" id="modalEnableOTPPhone" name="password" class="form-control" placeholder="Password" />
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
      <?php foreach ($customer as $row) : ?>
          <div class="modal fade" id="enableOTP<?= $row->id_user ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="text-center mb-4">
                              <h3 class="mb-2">Edit Informasi</h3>
                              <p>Edit Akun Admin</p>
                          </div>
                          <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/customer/update') ?>" method="post">
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Nama Lengkap</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                      <input type="text" id="modalEnableOTPPhone" name="nama_user" class="form-control" value="<?= $row->nama_user ?>" />
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Email</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="text" id="modalEnableOTPPhone" name="email" class="form-control" value="<?= $row->email ?>" />
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Nomor Telephone</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="text" id="modalEnableOTPPhone" name="no_telp" class="form-control phone-number-otp-mask" value="<?= $row->no_telp ?>" />
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Alamat</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <textarea id="modalEnableOTPPhone" name="alamat" class="form-control" placeholder="alamat"><?= $row->alamat ?></textarea>
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
