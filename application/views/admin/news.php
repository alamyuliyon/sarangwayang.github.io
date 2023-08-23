  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar /</span> Wiracarita <button data-bs-toggle="modal" data-bs-target="#enableOTP" style="float: right;" class="btn btn-primary"><i class="ti ti-plus"></i>&nbsp; Buat</button></h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Cuplikan</th>
                              <th>Deskripsi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($news as $row) : ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $row->judul ?></td>
                                  <td><?= $row->slug ?></td>
                                  <td><?= $row->isi_berita ?></td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enableOTP<?= $row->id_berita ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                                              <a class="dropdown-item" href="<?= site_url('admin/news/delete/' . $row->id_berita) ?>"><i class="ti ti-trash me-1"></i> Hapus</a>
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
                          <h3 class="mb-2">Tambah Wiracarita Baru</h3>
                          <p>Buat Detail Wiracarita</p>
                      </div>
                      <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/news/save') ?>" method="post" enctype="multipart/form-data">
                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Judul</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="hidden" name="tgl_posting" value="<?php echo date('Y-m-d'); ?>">
                                  <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                  <input type="text" id="modalEnableOTPPhone" name="judul" class="form-control phone-number-otp-mask" />
                              </div>
                          </div>

                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Cuplikan</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <textarea name="slug" class="form-control phone-number-otp-mask"></textarea>
                              </div>
                          </div>

                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Deskripsi</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <textarea name="isi_berita" class="form-control phone-number-otp-mask"></textarea>
                              </div>
                          </div>

                          <div class="col-12">
                              <label class="form-label" for="modalEnableOTPPhone">Gambar</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="file" id="modalEnableOTPPhone" name="gambar" class="form-control phone-number-otp-mask" />
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
      <?php foreach ($news as $row) : ?>
          <div class="modal fade" id="enableOTP<?= $row->id_berita ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="text-center mb-4">
                              <h3 class="mb-2">Edit Wiracarita</h3>
                              <p>Kelola Wiracarita</p>
                          </div>
                          <form id="enableOTPForm" class="row g-3" action="<?= site_url('admin/news/update') ?>" method="post">
                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Judul</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="hidden" name="id_berita" value="<?= $row->id_berita ?>">
                                      <input type="text" id="modalEnableOTPPhone" name="judul" class="form-control phone-number-otp-mask" value="<?= $row->judul ?>" />
                                  </div>
                              </div>

                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Cuplikan</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <textarea name="slug" class="form-control phone-number-otp-mask"><?= $row->slug ?></textarea>
                                  </div>
                              </div>

                              <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Deskripsi</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <textarea name="isi_berita" class="form-control phone-number-otp-mask"><?= $row->isi_berita ?></textarea>
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