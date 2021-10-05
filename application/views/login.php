<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sipe</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets/backand/dist/img/logostmik.png') ?>" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/backand/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/backand/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/backand/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- font style -->
    <!-- fon viga -->
    <link rel="stylesheet" href="<?= base_url('assets/backand/') ?>dist/css/viga.css">
    <!-- mycss -->
    <link rel="stylesheet" href="<?= base_url('assets/backand/') ?>dist/css/mycss.css">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url('assets/backand/') ?>dist/img/logostmik.png" width="100" alt=""> <br>
            <p class="font-viga"><b> <strong>EXPONENTIAL SMOOTHING </strong></b></p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
            <div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
            <div class="card-body login-card-body">
                <p id="text">
                </p>
                <h4>
                    <p class="login-box-msg font-viga">
                        <b><strong>Login</strong></b>
                    </p>
                </h4>
                <form action="<?= base_url('auth/login') ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" id="username" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" autocomplete="off" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary font-viga"> Masuk </button>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/backand/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/backand/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url('assets/backand/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/backand/') ?>/dist/js/adminlte.min.js"></script>
    <!-- my script -->
    <script src="<?= base_url('assets/backand/') ?>/dist/js/script.js"></script>

</body>


</html>