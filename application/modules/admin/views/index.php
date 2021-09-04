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