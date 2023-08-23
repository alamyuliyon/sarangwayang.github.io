<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
   <base href=".<?= base_url('assets') ?>/notif<meta charset=" utf-8">
   <meta name="author" content="Softnio">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
   <!-- Fav Icon  -->
   <link rel="shortcut icon" href="<?= base_url('assets') ?>/notif/favicon.png">
   <!-- Page Title  -->
   <title>Transaksi | Sarangwayang</title>
   <!-- StyleSheets  -->
   <link rel="stylesheet" href="<?= base_url('assets') ?>/notif/css/dashlite.css?ver=3.1.1">
   <link id="skin-default" rel="stylesheet" href="<?= base_url('assets') ?>/notif/css/theme.css?ver=3.1.1">
</head>

<body class="nk-body bg-white has-sidebar ">
   </div>
   <!-- content @e -->
   </div>
   <!-- wrap @e -->
   </div>
   <!-- main @e -->
   </div>
   <!-- app-root @e -->
   <!-- Modal Alert -->
   <div class="modal fade" tabindex="-1" id="modalAlert">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-lg text-center">
               <div class="nk-modal">
                  <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                  <h4 class="nk-modal-title">Transaksi Berhasil : <small>TR<?php echo $invoice['tracking_id']; ?></small></h4>
                  <div class="nk-modal-text">
                     <div class="caption-text">Anda melakukan pembayaran sebesar&nbsp; Rp.<strong> <?php echo number_format($total, 0, ',', '.'); ?></strong></div>
                     <span class="sub-text-sm">Reference ID : <a href="#"> UID<?php echo $invoice['order_id']; ?></a></span>
                  </div>
                  <div class="nk-modal-action">
                     <a href="<?= site_url('transaction') ?>" class="btn btn-lg btn-mw btn-success">OK</a>
                  </div>
               </div>
            </div><!-- .modal-body -->
         </div>
      </div>
   </div>
   <!-- JavaScript -->
   <script src="<?= base_url('assets') ?>/notif/js/bundle.js?ver=3.1.1"></script>
   <script src="<?= base_url('assets') ?>/notif/js/scripts.js?ver=3.1.1"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   <script>
      $(document).ready(function() {
         $('#modalAlert').modal('show');
      });
   </script>
</body>

</html>