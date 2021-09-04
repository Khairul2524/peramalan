<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versi</b> 2.0.0
    </div>
    <strong>Copyright &copy;<?= date('Y') ?>. Sipe</strong> All rights.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/backand/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/backand/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/backand/') ?>dist/js/demo.js"></script>
<!-- Datepiker -->
<!-- <script src="<?= base_url('assets/backand/') ?>dist/js/bootstrap-datepicker.js"></script> -->
<!-- sweetalert -->
<script src="<?= base_url('assets/backand/') ?>dist/js/sweetalert2.all.min.js"></script>
<!-- My Script -->
<script src="<?= base_url('assets/backand/') ?>dist/js/script.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php
                        foreach ($siswa as $sis) {
                            $jumsis = $sis->tahunpenerimaan;
                            echo "'$jumsis'" . ",";
                        }
                        ?>],
            datasets: [{
                data: [<?php
                        foreach ($siswa as $sis) {
                            $jumlah = $sis->jumlah;
                            echo "'$jumlah'" . ",";
                        }
                        ?>],
                // backgroundColor: [
                //     'rgba(255, 99, 132, 0.2)',

                // ],
                // borderColor: [
                //     'rgba(255,99,132,1)',

                // ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }],
                yAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            },
            events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        console.log(tooltipItem)
                        return tooltipItem.yLabel;
                    }
                }
            }
        }

    });
</script>


</body>

</html>