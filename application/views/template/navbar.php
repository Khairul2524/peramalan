<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light bg-gradient-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mr-5">
            <a class="nav-link font-viga" data-toggle="dropdown" href="#">
                <?= $this->session->userdata('nama') . '  ' ?><i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="<?= base_url('auth/keluar') ?>" class="dropdown-item font-viga">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->