<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <link rel="icon" href="/assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/fonts/inter/inter.css" id="main-font-link" />
    <link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="/assets/fonts/feather.css" />
    <link rel="stylesheet" href="/assets/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/fonts/material.css" />
    <link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/assets/css/style-preset.css" />
</head>


<body data-pc-preset="preset-1" data-pc-sidebar-caption="true"
    data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast=""
    data-pc-theme="light">
    <div class="page-loader">
        <div class="bar"></div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center mb-4">
                        </div>
                        <h4 class="text-center f-w-500 mb-3">Giriş Yap</h4>

                        <div class="text-center mb-4">
                            <?php if (session()->has('errors')): ?>
                                <p style="color:red"><?= session('errors') ?></p>
                            <?php endif; ?>

                        </div>

                        <form method="POST" action="/login">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" value="<?= $email ?? '' ?>" placeholder="Email Address" />
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" id="floatingInput1" placeholder="Password" />
                            </div>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <h6 class="text-secondary f-w-400 mb-0">
                                    <a href="#"> Şifremi unuttum </a>
                                </h6>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Giriş Yap</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Hesabınız yok mu?</h6>
                            <a href="register" class="link-primary">Yeni hesap oluşturun</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="/assets/js/plugins/popper.min.js"></script>
    <script src="/assets/js/plugins/simplebar.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/fonts/custom-font.js"></script>
    <script src="/assets/js/pcoded.js"></script>
    <script src="/assets/js/plugins/feather.min.js"></script>

</body>
<!-- [Body] end -->

</html>