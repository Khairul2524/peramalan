<!-- Content Wrapper. Contains page content -->
<script type="text/javascript" src="<?= base_url('assets/backand/dist/js/') ?>Chart.js"></script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="font-viga">Dashboard</h1>
				</div>

			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title font-viga">Grafik Jumlah Siswa</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<canvas id="myChart"></canvas>
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

<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var dataFirst = {

		data: [<?php
				foreach ($a as $e) {
					$data = ($this->session->userdata('mad'));
					if ($data) {
						foreach ($data as $d) {
							echo $d[$e->a] . ',';
						}
					}
				}

				?>],
		borderColor: 'red',
		backgroundColor: 'transparent',
		// lineTension: 0.3,
		// Set More Options
	};

	var dataSecond = {
		data: [<?php
				foreach ($a as $e) {
					$data = ($this->session->userdata('mse'));
					if ($data) {
						foreach ($data as $d) {
							echo $d[$e->a] . ',';
						}
					}
				}

				?>],
		borderColor: 'green',
		backgroundColor: 'transparent',
		// Set More Options
	};
	var datathere = {
		data: [<?php
				foreach ($a as $e) {
					$data = ($this->session->userdata('mape'));
					if ($data) {
						foreach ($data as $d) {
							echo $d[$e->a] . ',';
						}
					}
				}

				?>],
		borderColor: 'orange',
		backgroundColor: 'transparent',
		// Set More Options
	};

	var myChart = new Chart(ctx, {
		type: 'line',

		data: {
			labels: [<?php
						foreach ($a as $a) {
							$alfa = $a->a;
							echo "'$alfa'" . ",";
						}
						?>],
			datasets: [dataFirst, dataSecond, datathere]
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

						return tooltipItem.yLabel;
					}
				}
			}
		}

	});
</script>