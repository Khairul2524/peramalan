<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="font-viga">Perhitungan</h1>
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
			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-viga">Perhitungan Forecast a= <?= $a->a ?></h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Tahun Penerimaan</th>
									<th>Jumlah Siswa</th>
									<th>Forecast
										<br>
										a= <?= $a->a; ?>
									</th>
									<th>error</th>
									<th>absolut</th>
									<th>error^2</th>
									<th>% Error</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$ha = 1 - $a->a;
								$forecast = '';
								$jumlah = '';
								// echo $ha;
								$no = 1;
								foreach ($siswa as $d) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $d->tahunpenerimaan ?></td>
										<td><?= $d->jumlah ?></td>

										<?php

										if (!$jumlah) {
											$q = $a->a * $d->jumlah;
											$r = $ha * $d->jumlah;
											// echo $q;

											echo "<td></td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td></td>";
											$forecast =  $q + $r;
											$jumlah = $forecast;
										} else {
											$q = $a->a * $d->jumlah;
											$r = $ha * $jumlah;
											// echo $q;
											echo "<td>" . $forecast . "</td>";
											$erorr = $d->jumlah - $forecast;
											echo "<td>" . $erorr . "</td>";
											$absolut = abs($erorr);
											echo "<td>" . $absolut . "</td>";
											$error_pangkat = pow($absolut, 2);
											echo "<td>" . number_format($error_pangkat, 2) . "</td>";
											$persen_error = number_format($absolut / $d->jumlah, 2);
											echo "<td>" . $persen_error * 100 . '%' . "</td>";
											$forecast = number_format($q + $r, 2);
											$jumlah = $forecast;
										}

										?>



									</tr>
								<?php } ?>
							</tbody>

						</table>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">

				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		<?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->