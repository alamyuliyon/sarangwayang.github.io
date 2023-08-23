<!-- Pembuka Halaman Footer Pelanggan -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Alamat</h2>
                    <ul>
                        <li>Pertokoan Pati <br>Jalan Raya Papar - Pare <br>Papar - Kediri - Jawa Timur</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Layanan</h2>
                    <ul>
                        <li><a href="https://wa.me/6285236762626">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Halaman</h2>
                    <ul>
                        <li><a href="<?= base_url('dashboard') ?>">Beranda</a></li>
                        <li><a href="<?= base_url('dashboard/about') ?>">Profil</a></li>
                        <li><a href="<?= site_url('dashboard/product') ?>">Produk</a></li>
                        <li><a href="<?= base_url('dashboard/news') ?>">Wiracarita</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Halaman Footer Pelanggan -->

<!-- Pembuka Halaman Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="pt-4 pb-4">Hak Cipta &copy 2023 Sarangwayang</p>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Halaman Copyright -->

<!-- jquery -->
<script src="<?= base_url('landing-assets') ?>/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="<?= base_url('landing-assets') ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="<?= base_url('landing-assets') ?>/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="<?= base_url('landing-assets') ?>/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="<?= base_url('landing-assets') ?>/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="<?= base_url('landing-assets') ?>/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="<?= base_url('landing-assets') ?>/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="<?= base_url('landing-assets') ?>/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="<?= base_url('landing-assets') ?>/js/sticker.js"></script>
<!-- main js -->
<script src="<?= base_url('landing-assets') ?>/js/main.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    const paymentMethod = document.querySelector('[name="payment_method"]');
    const proofOfPayment = document.querySelector('#proof');

    // sembunyikan Proof of Payment secara default
    proofOfPayment.style.display = 'none';

    // Tambahkan event listener untuk memantau perubahan pada payment_method
    paymentMethod.addEventListener('change', () => {
        if (paymentMethod.value === 'Bank Transfer') {
            // tampilkan Proof of Payment jika Bank Transfer dipilih
            proofOfPayment.style.display = 'block';
        } else {
            // sembunyikan Proof of Payment jika Cash dipilih
            proofOfPayment.style.display = 'none';
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#id_kabupaten").hide();
        $("#id_kecamatan").hide();
		$("#service").hide();
		$('#courier').hide();

		provinsi();

		$("#id_provinsi").change(function() {
			var getprovinsi = $("#id_provinsi").val();

			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?= base_url('cekOngkir/get_kabupaten'); ?>",
				data: {
					provinsi: getprovinsi
				},
				success: function(data) {
					if (getprovinsi != ''){
						$("#id_kabupaten").html(data)
						$("#id_kabupaten").show();
					} else {
						$("#id_kabupaten").hide();
					}
				}
			});

		});

		$('#id_kabupaten').change(function(){
			var id_kabupaten = $(this).val();

			if (id_kabupaten != '') {
				$('#courier').show();
			} else {
				$('#courier').hide();
			}
		});

		$('#courier').change(function(){
			var id_kabupaten = $('#id_kabupaten').val();
			var courier = $(this).val();
			var weight = $('#weight').val();

			$.ajax({
				url: "<?= base_url('cekOngkir/get_cost') ?>",
				type: "POST",
				dataType: "html",
				data: {
					id_kabupaten: id_kabupaten,
					courier: courier,
					weight: weight
				},
				success: function(response){
					if (courier != '') {
						$('#service').show();
						$('#service').html(response);
					} else {
						$('#service').hide();
						$('#biaya_transport').text(0);
						$('#total_amount').text(0);
						$('#etd').text('');
					}
				}
			})

		});

		$("#service").change(function(){
			var cost = $(this).find(':selected').data('cost');
			var etd = $(this).find(':selected').data('etd');
			var total = $('#total').val();

			var subtotal = parseInt(total)+parseInt(cost);

			if (cost != '') {
				$('#biaya_transport').text(cost);
				$('#biaya').val(cost);
				$('#etd').text('Estimasi pengiriman '+etd+' harian.');
				$('.etd').val(etd);
				$('#total_amount').text(subtotal);
				$('.subtotal').val(subtotal);
			} else {
				$('#biaya_transport').text(0);
				$('#biaya').val();
				$('#etd').text('');
				$('.etd').val();
				$('#total_amount').text(0);
				$('.subtotal').val();
			}
		});
    });

	function provinsi()
	{
		$.ajax({
			url: "<?= base_url('cekOngkir/get_provinsi') ?>",
			type: "POST",
			dataType: "html",
			success: function(response){
				$('#id_provinsi').html(response);
			}
		})
	}

    function loadkecamatan()
	{
        $("#id_kabupaten").change(function() {
            var getkabupaten = $("#id_kabupaten").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url(); ?>dashboard/getdatakecamatan",
                data: {
                    kabupaten: getkabupaten
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].id_kecamatan + '">' + data[i].kecamatan + '</option>';

                    }

                    $("#id_kecamatan").html(html)
                    $("#id_kecamatan").show();

                }
            });

        });
    }

    function number_format(number, decimals, dec_point, thousands_point) {
        decimals = decimals || 0;
        number = parseFloat(number);

        if (!dec_point || !thousands_point) {
            dec_point = '.';
            thousands_point = ',';
        }

        var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
        var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
        var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
        var formattedNumber = "";

        while (numbersString.length > 3) {
            formattedNumber += thousands_point + numbersString.slice(-3)
            numbersString = numbersString.slice(0, -3);
        }

        return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (dec_point + decimalsString) : '');
    }
</script>

<script>
    $(document).ready(function() {
        $('.country_select').change(function() {
            if ($(this).val() === 'Bank Transfer') {
                $('#gambar').show();
            } else {
                $('#gambar').hide();
            }
        });
    });
</script>

</body>

</html>
