  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil</span> Sarangwayang</h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Deskripsi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($about as $row) : ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $row->judul ?></td>
                                  <td><?= $row->slug ?></td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enableOTP<?= $row->id ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
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

      <!-- Modal edit -->
      <?php foreach ($about as $row) : ?>
          <div class="modal fade" id="enableOTP<?= $row->id ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="text-center mb-4">
                              <h3 class="mb-2">Edit Informasi</h3>
                              <p>Profil Sarangwayang</p>
                          </div>
                          <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/about/update') ?>" method="post">
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Judul</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="hidden" name="id" value="<?= $row->id ?>">
                                      <input type="text" id="modalEnableOTPPhone" name="judul" class="form-control phone-number-otp-mask" value="<?= $row->judul ?>" />
                                  </div>
                              </div>

                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Deskripsi</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <textarea name="slug" class="form-control phone-number-otp-mask"><?= $row->slug ?></textarea>
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