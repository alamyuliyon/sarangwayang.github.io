     <div class="container-xxl flex-grow-1 container-p-y">
         <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil</span> Admin</h4>
         <div class="row">
             <!-- User Sidebar -->
             <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                 <!-- User Card -->
                 <div class="card mb-4">
                     <div class="card-body">
                         <div class="user-avatar-section">
                             <div class="d-flex align-items-center flex-column">
                                 <img class="img-fluid rounded mb-3 pt-1 mt-4" src="<?= base_url('assets') ?>/user.png" height="100" width="100" alt="User avatar" />
                                 <div class="user-info text-center">
                                     <h4 class="mb-2"><?php echo $this->session->userdata('nama_user') ?></h4>
                                     <span class="badge bg-label-secondary mt-1">Admin</span>
                                 </div>
                             </div>
                         </div>
                         <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">


                         </div>
                         <p class="mt-4 small text-uppercase text-muted">Detail Profil Admin</p>
                         <div class="info-container">
                             <?php foreach ($user as $row) : ?>
                                 <ul class="list-unstyled">
                                     <li class="mb-2">
                                         <span class="fw-semibold me-1">Nama Lengkap :</span>
                                         <span><?= $row->nama_user ?></span>
                                     </li>
                                     <li class="mb-2 pt-1">
                                         <span class="fw-semibold me-1">Email :</span>
                                         <span><?= $row->email ?></span>
                                     </li>
                                     <li class="mb-2 pt-1">
                                         <span class="fw-semibold me-1">Nomor Telepon :</span>
                                         <?php
                                            $no_telp = $row->no_telp;
                                            if (substr($no_telp, 0, 1) == '0') {
                                                $no_telp = '+62' . substr($no_telp, 1);
                                            } else {
                                                $no_telp = '+62' . $no_telp;
                                            }
                                            ?>
                                         <span><?= $no_telp ?></span>
                                     </li>
                                     <li class="mb-2 pt-1">
                                         <span class="fw-semibold me-1">Alamat :</span>
                                         <span><?= $row->alamat ?></span>
                                     </li>
                                     <li class="mb-2 pt-1">
                                         <span class="fw-semibold me-1">Status :</span>
                                         <span class="badge bg-label-success">Aktif</span>
                                     </li>
                                 </ul>
                             <?php endforeach; ?>
                         </div>
                     </div>
                 </div>
                 <!-- /User Card -->
                 <!-- Plan Card -->
             </div>
             <!--/ User Sidebar -->

             <!-- User Content -->
             <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                 <div class="card mb-4">
                     <h5 class="card-header">Detail Profil</h5>

                     <hr class="my-0" />
                     <div class="card-body">
                         <?php foreach ($user as $u) : ?>
                             <form id="formAccountSettings" action="<?= site_url('admin/profile/update') ?>" method="post">
                                 <div class="row">
                                     <div class="mb-3 col-md-12">
                                         <label for="firstName" class="form-label">Nama Lengkap</label>
                                         <input type="hidden" name="id_user" value="<?= $u->id_user ?>">
                                         <input class="form-control" type="text" id="firstName" name="nama_user" value="<?= $u->nama_user ?>" autofocus />
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label class="form-label" for="phoneNumber">Nomor Telepone</label>
                                         <div class="input-group input-group-merge">
                                             <span class="input-group-text">ID </span>
                                             <input type="text" id="phoneNumber" name="no_telp" class="form-control" value="<?= $u->no_telp ?>" />
                                         </div>
                                     </div>
                                     <div class="mb-3 col-md-12">
                                         <label for="address" class="form-label">Alamat</label>
                                         <textarea class="form-control" id="address" name="alamat" placeholder="Address"><?= $u->alamat ?></textarea>
                                     </div>
                                 </div>
                                 <div class="mt-2">
                                     <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                     <button type="reset" class="btn btn-label-secondary">Batal</button>
                                 </div>
                             </form>
                         <?php endforeach; ?>
                     </div>
                     <!-- /Account -->
                 </div>
             </div>
             <!--/ User Content -->
         </div>
     </div>
