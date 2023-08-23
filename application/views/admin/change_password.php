<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets') ?>/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Ganti Password | Sarangwayang</title>

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
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('assets') ?>/img/illustrations/favicon-dark.png" alt="auth-reset-password-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/favicon-dark.png" data-app-dark-img="illustrations/favicon-dark.png" />

                    <img src="<?= base_url('assets') ?>/img/illustrations/bg-shape-image-light.png" alt="auth-reset-password-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Reset Password -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center p-4 p-sm-5">
                <div class="w-px-400 mx-auto">
                    
                    <h3 class="mb-1 fw-bold">Pengaturan Akun</h3>
                    <?php foreach ($user as $u) : ?>
                        <p class="mb-4">Untuk <span class="fw-bold"><?= $u->email ?></span></p>

                        <form id="formAuthentication" class="mb-3" action="<?= site_url('admin/profile/reset') ?>" method="post">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Alamat Email</label>
                                <input type="hidden" name="id_user" value="<?= $u->id_user ?>">
                                <div class="input-group input-group-merge">
                                    <input type="email" id="password" class="form-control" name="email" value="<?= $u->email ?>" />
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="confirm-password">Password Baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="confirm-password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Atur Password Baru</button>
                            <div class="text-center">
                                <a href="<?= site_url('admin/dashboard') ?>">
                                   
                                    Kembali
                                </a>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Reset Password -->
        </div>
    </div>

    <!-- / Content -->

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