   <!-- Content wrapper -->
   <div class="content-wrapper">
       <!-- Content -->

       <div class="container-xxl flex-grow-1 container-p-y">
           <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produk /</span> Lihat Produk</h4>

           <!-- Accordion -->
           <div class="row">
               <div class="col-md-4">
                   <img class="card-img-top" src="<?= base_url() . '/uploads/' . $detail->gambar ?>" alt="Card image cap" />
               </div>
               <div class="col-md">
                   <div class="card">
                       <div class="card-header">
                           <div class="d-flex align-items-start">
                               <div class="d-flex align-items-start">
                                   <div class="me-2 ms-1">
                                       <h5 class="mb-0">
                                           <a href="javascript:;" class="stretched-link text-body"><?= $detail->nama_brg ?></a>
                                       </h5>
                                       <div class="client-info">
                                           <span class="text-muted"><?= $detail->keterangan ?></span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="card-body border-top">
                           <br>
                           <div class="d-flex align-items-center mb-3">
                               <h6 class="mb-1">Kategori : <span class="text-body fw-normal"><?= $detail->kategori ?></span></h6>
                               <?php if ($detail->stok < 1) { ?>
                                   <span class="badge bg-label-danger ms-auto">Stok Habis</span>
                               <?php } else if ($detail->stok > 1) { ?>
                                   <span class="badge bg-label-success ms-auto">Stok Tersedia</span>
                               <?php } ?>
                           </div>
                           <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
                               <small>Rp <?= number_format($detail->harga) ?></small>
                               <small><?= $detail->stok ?> Item</small>
                           </div>
                           <div class="progress mb-2" style="height: 8px">
                               <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- / Content -->