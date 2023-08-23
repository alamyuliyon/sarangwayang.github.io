   <div class="container-xxl flex-grow-1 container-p-y">
       <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan</span> Penjualan</h4>

       <div class="row">
           <div class="col-xl-12 col-12 mb-4">
               <div class="card">
                   <div class="card-header header-elements">
                       <h5 class="card-title mb-0">Informasi Transaksi Penjualan</h5>
                   </div>
                   <div class="card-body">
                       <canvas id="chart" data-height="400"></canvas>
                   </div>
               </div>
           </div>

           <div class="col-xl-12 col-sm-6 mb-4">
               <div class="card">
                   <form method="post" action="<?php echo base_url('admin/report/filter'); ?>" class="card-body">
                       <div class="row g-3">
                           <div class="col-md-4">
                               <select id="bulan" name="bulan" class="form-select js-select2">
                                   <?php for ($m = 1; $m <= 12; $m++) : ?>
                                       <option value="<?php echo $m; ?>"><?php echo date('F', mktime(0, 0, 0, $m, 1)); ?></option>
                                   <?php endfor; ?>
                               </select>
                           </div>
                           <div class="col-md-4">
                               <div class="input-group input-group-merge">
                                   <select id="tahun" name="tahun" class="form-select js-select2">
                                       <?php for ($y = date('Y'); $y >= date('Y') - 10; $y--) : ?>
                                           <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                       <?php endfor; ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <button type="submit" class="btn btn-primary">Cari</button>
                           </div>
                       </div>
                   </form>
               </div>

               <br>
               <div class="card">
                   <div class="card-datatable table-responsive pt-0">
                       <table id="example" class="table table-striped" style="width:100%">
                           <thead>
                               <tr>
                                   <th>ID Transaksi</th>
                                   <th>Tagihan</th>
                                   <th>Waktu Pembayaran</th>
                                   <th>Total</th>
                                   <th>Status</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $no = 1;
                                foreach ($laporan as $row) : ?>
                                   <tr>
                                       <td><?= $row['tracking_id']; ?></td>
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
       </div>
   </div>
