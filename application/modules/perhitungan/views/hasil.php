<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/backand/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/backand/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-viga">Hasil Forecasting</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <?php
        foreach ($a as $a) {
        ?>

        <?php
            $ha = 1 - $a->a;
            $forecast = '';
            $jumlah = '';
            $jumlahabsolut = [];
            $jumlah_error_pangkat = [];
            $jumlah_persen_error = [];
            $jumlah2 = [];
            // echo $ha;
            $no = 1;
            foreach ($siswa as $d) {
                if (!$jumlah) {
                    $q = $a->a * $d->jumlah;
                    $r = $ha * $d->jumlah;
                    // echo $q;
                    $forecast =  $q + $r;
                    $jumlah = $forecast;
                } else {
                    $q = $a->a * $d->jumlah;
                    $r = $ha * $jumlah;
                    // echo $q;

                    $erorr = $d->jumlah - $forecast;

                    $absolut = abs($erorr);

                    $error_pangkat = pow($absolut, 2);

                    $persen_error = number_format($absolut / $d->jumlah, 2) * 100;

                    $forecast = number_format($q + $r, 2);
                    $jumlah = $forecast;
                    $jumlahabsolut[] = $absolut;
                    $jumlah_error_pangkat[] = $error_pangkat;
                    $jumlah_persen_error[] = $persen_error;
                }
                $jumlah2[] = $d->jumlah;
            }
            $jumfor['alpha'][$a->a] = $forecast;
            $mad['alpha'][$a->a] = array_sum($jumlahabsolut) / count($jumlah2);
            $mse['alpha'][$a->a] = array_sum($jumlah_error_pangkat) / count($jumlah2);
            $mape['alpha'][$a->a] = array_sum($jumlah_persen_error) / count($jumlah2);
        }
        // var_dump($jumfor);
        // var_dump($mad);
        // var_dump($mse);
        // var_dump($mape);
        ?>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item mr-2 font-viga">
                        Hasil Perhitungan Forecast
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Alpha</th>
                            <th>Foercast</th>
                            <th>MAD</th>
                            <th>MSE</th>
                            <th>MAPE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // var_dump($jumfor);
                        foreach ($e as $a) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $this->session->userdata('tahun') ?></td>
                                <td><?= $a->a; ?></td>
                                <td>
                                    <?php
                                    $data = ($this->session->userdata('jumfor'));
                                    // var_dump($data);
                                if($data){
                                    foreach ($data as $d) {
                                        echo $d[$a->a];
                                    }}
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $data = ($this->session->userdata('mad'));
                                    if ($data) {
                                        foreach ($data as $d) {
                                            echo $d[$a->a];
                                        }
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $data = ($this->session->userdata('mse'));
                                    if ($data) {
                                        foreach ($data as $d) {
                                            echo $d[$a->a];
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $data = ($this->session->userdata('mape'));
                                    if ($data) {
                                        foreach ($data as $d) {
                                            echo $d[$a->a];
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php

                        ?>
                    </tbody>

                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/backand/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/backand/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });
    });
</script>