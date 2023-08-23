  <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Daftar /</span> Produk <button data-bs-toggle="modal" data-bs-target="#editUser" style="float: right;" class="btn btn-primary"><i class="ti ti-plus"></i>&nbsp; Buat</button></h4>


          <div class="card">
              <div class="card-datatable table-responsive pt-0">
                  <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>Gambar</th>
                              <th>Nama</th>
                              <th>Kategori</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($product as $row) : ?>
                              <tr>
                                  <td> <img src="<?= base_url() . '/uploads/' . $row->gambar ?>" width="70" alt=""></td>
                                  <td><?= $row->nama_brg ?></td>
                                  <td><?= $row->kategori ?></td>
                                  <td>Rp <?= number_format($row->harga) ?></td>
                                  <td><?= number_format($row->stok) ?> Item</td>

                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" href="<?= site_url('admin/product/view/' . $row->id_brg) ?>"><i class="ti ti-eye me-1"></i> Lihat</a>
                                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUser<?= $row->id_brg ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                                              <a class="dropdown-item" href="<?= site_url('admin/product/delete/' . $row->id_brg) ?>"><i class="ti ti-trash me-1"></i> Hapus</a>
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
      <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-simple modal-edit-user">
              <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                          <h3 class="mb-2">Tambah Produk Baru</h3>
                          <p class="text-muted">Buat Detail Produk</p>
                      </div>
                      <form action="<?= site_url('admin/product/save') ?>" method="post" enctype="multipart/form-data" id="editUserForm" class="row g-3">
                          <div class="col-12 col-md-6">
                              <label class="form-label" for="modalEditUserFirstName">Nama Produk</label>
                              <input type="text" id="modalEditUserFirstName" name="nama_brg" class="form-control" placeholder="Nama Produk" />
                          </div>
                          <div class="col-12 col-md-6">
                              <label class="form-label" for="modalEditUserLastName">Kategori</label>
                              <select id="modalEditUserStatus" name="kategori" class="form-select" aria-label="Default select example">
                                  <option hidden>Pilih Kategori</option>
                                  <?php foreach ($cat as $c) : ?>
                                      <option value="<?= $c->category ?>"><?= $c->category ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEditUserName">Deskripsi</label>
                              <textarea name="keterangan" class="form-control" placeholder="Deskripsi Produk"></textarea>
                          </div>

                          <div class="col-12 col-md-4">
                              <label class="form-label" for="modalEditTaxID">Harga</label>
                              <div class="input-group">
                                  <span class="input-group-text">Rp</span>
                                  <input type="number" id="modalEditUserPhone" name="harga" class="form-control phone-number-mask" placeholder="0" />
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                              <label class="form-label" for="modalEditUserPhone">Stok</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                  <input type="number" id="modalEditUserPhone" name="stok" class="form-control phone-number-mask" placeholder="0" />
                              </div>
                          </div>
						  <div class="col-12 col-md-4">
							  <label class="form-label" for="modalEditUserPhone">Berat</label>
							  <div class="input-group">
								  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
								  <input type="number" id="modalEditUserPhone" name="berat" class="form-control phone-number-mask" placeholder="0" />
							  </div>
						  </div>
                          <div class="col-12">
                              <label class="form-label" for="modalEditUserName">Gambar</label>
                              <input type="file" name="gambar" class="form-control" />
                          </div>

                          <div class="col-12 text-center">
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
      <?php foreach ($product as $row) : ?>
          <div class="modal fade" id="editUser<?= $row->id_brg ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="text-center mb-4">
                              <h3 class="mb-2">Edit Produk</h3>
                              <p class="text-muted">Edit Detail Produk</p>
                          </div>
                          <form action="<?= site_url('admin/product/update') ?>" method="post" enctype="multipart/form-data" id="editUserForm" class="row g-3">
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="modalEditUserFirstName">Nama Produk</label>
                                  <input type="hidden" name="id_brg" value="<?= $row->id_brg ?>">
                                  <input type="text" id="modalEditUserFirstName" name="nama_brg" class="form-control" value="<?= $row->nama_brg ?>" />
                              </div>
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="modalEditUserLastName">Kategori</label>
                                  <select id="modalEditUserStatus" name="kategori" class="form-select" aria-label="Default select example">
                                      <option hidden value="<?= $row->kategori ?>"><?= $row->kategori ?></option>
                                      <?php foreach ($cat as $c) : ?>
                                          <option value="<?= $c->category ?>"><?= $c->category ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                              <div class="col-12">
                                  <label class="form-label" for="modalEditUserName">Deskripsi</label>
                                  <textarea name="keterangan" class="form-control"><?= $row->keterangan ?></textarea>
                              </div>

                              <div class="col-12 col-md-4">
                                  <label class="form-label" for="modalEditTaxID">Harga</label>
                                  <div class="input-group">
                                      <span class="input-group-text">Rp</span>
                                      <input type="number" id="modalEditUserPhone" name="harga" class="form-control phone-number-mask" value="<?= $row->harga ?>" />
                                  </div>
                              </div>
                              <div class="col-12 col-md-4">
                                  <label class="form-label" for="modalEditUserPhone">Stok</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
                                      <input type="number" id="modalEditUserPhone" name="stok" class="form-control phone-number-mask" value="<?= $row->stok ?>" />
                                  </div>
                              </div>
							  <div class="col-12 col-md-4">
								  <label class="form-label" for="modalEditUserPhone">Berat</label>
								  <div class="input-group">
									  <span class="input-group-text"><i class="ti ti-info-circle"></i></span>
									  <input type="number" id="modalEditUserPhone" name="berat" class="form-control phone-number-mask" value="<?= $row->berat ?>" />
								  </div>
							  </div>

                              <div class="col-12 text-center">
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
