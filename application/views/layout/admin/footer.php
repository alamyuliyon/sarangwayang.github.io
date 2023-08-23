  <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= base_url('assets') ?>/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/node-waves/node-waves.js"></script>

  <script src="<?= base_url('assets') ?>/vendor/libs/hammer/hammer.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/i18n/i18n.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/typeahead-js/typeahead.js"></script>

  <script src="<?= base_url('assets') ?>/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url('assets') ?>/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-buttons/buttons.html5.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/datatables-buttons/buttons.print.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/libs/select2/select2.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url('assets') ?>/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?= base_url('assets') ?>/js/dashboards-ecommerce.js"></script>
  <!-- Page JS -->
  <script src="<?= base_url('assets') ?>/js/tables-datatables-basic.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/cards-analytics.js"></script>

  <script>
      $(document).ready(function() {
          $('#example').DataTable();
		  provinsi();

		  $("#id_provinsi").change(function() {
			  var getprovinsi = $("#id_provinsi").val();

			  kabupaten(getprovinsi);
		  });
      });

	  function provinsi()
	  {
		  $.ajax({
			  url: "<?= base_url('admin/toko/get_provinsi') ?>",
			  type: "POST",
			  dataType: "html",
			  success: function(response){
				  $('#id_provinsi').html(response);

				  var getProvinsi = $('#id_provinsi').val();
				  kabupaten(getProvinsi)
			  }
		  })
	  }

	  function kabupaten(getprovinsi)
	  {
		  $.ajax({
			  type: "POST",
			  dataType: "html",
			  url: "<?= base_url('admin/toko/get_kabupaten'); ?>",
			  data: {
				  provinsi: getprovinsi
			  },
			  success: function(data) {
				  if (getprovinsi != ''){
					  $("#id_kabupaten").html(data)
				  }
			  }
		  });
	  }
  </script>

  <script>
      // Get the transaction data from the PHP variable passed to the view
      var transactionData = <?php echo json_encode($transaction_data); ?>;

      // Create an array of month names
      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember'];

      // Get the labels and values for the chart
      var labels = [];
      var values = [];

      // Loop through each month and get the transaction count
      for (var i = 1; i <= 12; i++) {
          var monthData = transactionData.find(function(data) {
              return data.month == i;
          });

          // If there is transaction data for the current month, add it to the chart
          if (monthData) {
              var monthName = months[i - 1];
              labels.push(monthName);
              values.push(monthData.total);
          } else {
              // If there is no transaction data for the current month, add a label with no value
              labels.push(months[i - 1]);
              values.push(0);
          }
      }

      // Create a new chart object and render it on the canvas element
      var ctx = document.getElementById('chart').getContext('2d');
      var chart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Transactions',
                  data: values,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
  </script>

  <script>
      var ctx = document.getElementById('chart').getContext('2d');
      var myDoughnut = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: ['Total', 'Dibayar', 'Ditunda'],
              datasets: [{
                  data: [<?= $trx ?>, <?= $trx1 ?>, <?= $trx2 ?>],
                  backgroundColor: ['#D9E5F7', '#33d895', '#f9db7b']
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
                  display: true,
                  position: 'bottom',
                  labels: {
                      fontSize: 12,
                      fontFamily: 'Roboto, sans-serif'
                  }
              }
          }
      });
  </script>

  <script>
      var ctx = document.getElementById('loanDonut').getContext('2d');
      var myDoughnutChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ['Total', 'Dibayar', 'Ditunda'],
              datasets: [{
                  data: [<?= $trx ?>, <?= $trx1 ?>, <?= $trx2 ?>],
                  backgroundColor: ['#D9E5F7', '#33d895', '#f9db7b']
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
                  display: true,
                  position: 'bottom',
                  labels: {
                      fontSize: 12,
                      fontFamily: 'Roboto, sans-serif'
                  }
              }
          }
      });
  </script>
  </body>

  </html>
