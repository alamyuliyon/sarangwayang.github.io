<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets') ?>/" data-template="vertical-menu-template">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Daftar | Sarangwayang</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/css/pages/page-auth.css" />
        <!-- Helpers -->
        <script src="<?= base_url('assets') ?>/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script src="<?= base_url('assets') ?>/vendor/js/template-customizer.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="<?= base_url('assets') ?>/js/config.js"></script>
    </head>

    <body>
        <!-- Halaman Daftar -->
            
        <!-- Pembuka Forumulir Daftar -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <!-- Pembuka Daftar -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Pembuka Logo -->
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a href="index.html" class="app-brand-link gap-2">
                                    <span class="app-brand-text demo text-body fw-bold ms-1">Sarangwayang</span>
                                </a>
                            </div>
                            <!-- Penutup Logo -->
                            <h4 class="mb-1 pt-2">Ayo Menjadi generasi</h4>
                            <p class="mb-4">Aku Cinta Budaya Indonesia</p>

                            <form id="formAuthentication" class="mb-3" action="<?= site_url('register') ?>" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="username" name="nama_user" placeholder="Masukan Nama Lengkap" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email" />
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nomor Telephone</label>
                                    <input type="number" class="form-control" id="username" name="no_telp" placeholder="Masukan Nomor Telephone" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="username" name="alamat" placeholder="Masukan Alamat" autofocus />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                        <label class="form-check-label" for="terms-conditions">
                                            Saya setuju
                                            <a href="javascript:void(0);">kebijakan & persyaratan privasi</a>
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary d-grid w-100">Mendaftar</button>
                            </form>

                            <p class="text-center">
                                <span>Sudah punya akun?</span>
                                <a href="<?= site_url('login') ?>">
                                    <span>Masuk</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Penutup Daftar -->
                </div>
            </div>
        </div>

        <!-- Penutup Forumulir Daftar -->

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
        <script src="<?= base_url('assets') ?>/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="<?= base_url('assets') ?>/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="<?= base_url('assets') ?>/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

        <!-- Main JS -->
        <script src="<?= base_url('assets') ?>/js/main.js"></script>

        <!-- Page JS -->
        <script src="<?= base_url('assets') ?>/js/pages-auth.js"></script>
    </body>

</html>
