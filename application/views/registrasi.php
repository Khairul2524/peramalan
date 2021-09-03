<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sipdes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url('assets/backand/') ?>dist/img/LOGO1.png" width="100" alt=""> <br>
            <a href=""><b> <strong>SIPDES </strong></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p id="text">
                </p>
                <h4>
                    <p class="login-box-msg">
                        <b><strong>Login</strong></b>
                    </p>
                </h4>
                <form action="<?= base_url('auth/simpanuser') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <input type="hidden" class="form-control" value="1" name="aktif" id="aktif" placeholder="aktif">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" id="idrole" name="idrole">
                            <option>Pilih Role</option>
                            <?php
                            foreach ($role as $r) {
                            ?>
                                <option value="<?= $r->idrole ?>"><?= $r->role ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-check">
                        <button type="submit" class="btn btn-block btn-primary font-viga" id="login" name="login"> Masuk </button>
                    </div>
                </form>
            </div>

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
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/backand/') ?>/dist/js/adminlte.min.js"></script>

</body>

</html>