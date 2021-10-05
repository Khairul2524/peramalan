<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="font-viga">Forecasting</h1>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
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
				<form action="" method="POST">
					<div class="form-group">
						<label>Tahun Akademik</label>
						<select class="form-control rounded-0" id="idta" name="idta" required>

							<?php
							foreach ($tahunakademik as $ta) {

							?>
								<option value="<?= $ta->id ?>"><?= $ta->tahunakademik ?></option>
							<?php }
							?>
						</select>
					</div>
					<input type="submit" name="aksi" class="btn btn-success font-viga btn-flat btn-sm" value="Ramal" />
				</form>
			</div>
			<!-- /.card-body -->
			<div class="modal-footer">
			</div>
		</div>
		<!-- Default box -->
		<?php
		if (isset($_POST['aksi'])) {
			$tahun   = $_POST['idta'];
			foreach ($a as $e) {

		?>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title font-viga">Forecast <?= $e->a; ?></h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<?php
						$ha = 1 - $e->a;
						$forecast = '';
						$forecast1 = '';
						$jumlah = '';
						$jumlahabsolut = [];
						$jumlah_error_pangkat = [];
						$jumlah_persen_error = [];
						$jumlah2 = [];
						$no = 1;
						?>
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun Penerimaan</th>
										<th>Jumlah Siswa</th>
										<th>Forecast
											<br>
											a= <?= $e->a; ?>
										</th>
										<th>error</th>
										<th>absolut</th>
										<th>error^2</th>
										<th>% Error</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($tahunakademik as $ta) {
										echo "<tr>";
										if ($ta->id < $tahun) {

											echo "<td>" . $no++ . "</td>";
											echo "<td>" . $ta->tahunakademik . "</td>";
											$query = $this->db->get_where('jumlahsiswa', ['idta' => $ta->id])->row();

											if ($query) {
												// if ($jumlah) {

												echo "<td>" . $query->jumlah . "</td>";
												// echo $q;

												if (!$jumlah) {
													$k = $e->a * $query->jumlah;
													$h = $ha * $query->jumlah;
													$forecast =  $k + $h;
													$jumlah = $forecast;
													echo "<td></td>";
													echo "<td></td>";
													echo "<td></td>";
													echo "<td></td>";
													echo "<td></td>";
													$jumlah2[] = $ta->id;
												} else {
													$k = $e->a * $query->jumlah;
													$h = $ha * $jumlah;
													echo "<td>" . $forecast . "</td>";
													$forecast = number_format($k + $h, 2);
													// echo $forecast;
													// echo '<br>';
													// echo $query->jumlah;
													// echo '<br>';
													$erorr = $query->jumlah - $jumlah;
													echo "<td>" . $erorr . "</td>";
													$absolut = abs($erorr);
													echo "<td>" . $absolut . "</td>";
													$error_pangkat = pow($absolut, 2);
													echo "<td>" . number_format($error_pangkat, 2) . "</td>";
													$persen_error = number_format($absolut / $query->jumlah, 2) * 100;
													echo "<td>" . $persen_error  . '%' . "</td>";
													$forecast = number_format($k + $h, 2);
													$jumlah = $forecast;
													$jumlahabsolut[] = $absolut;
													$jumlah_error_pangkat[] = $error_pangkat;
													$jumlah_persen_error[] = $persen_error;
													$jumlah2[] = $ta->id;
												}
											} else {
												$k = $e->a * round($forecast);
												$h = $ha * $forecast;
												echo "<td>" . round($forecast) . "</td>";
												$forecast = number_format($k + $h, 2);
												// $forecast = $forecast;
												echo "<td>" . $forecast . "</td>";
												$erorr = round($forecast) - $forecast;
												echo "<td>" . number_format($erorr, 2) . "</td>";
												$absolut = abs($erorr);
												echo "<td>" . number_format($absolut, 2) . "</td>";
												$error_pangkat = pow($absolut, 2);
												echo "<td>" . number_format($error_pangkat, 2) . "</td>";
												$persen_error = number_format($absolut / round($forecast), 2) * 100;
												echo "<td>" . $persen_error  . '%' . "</td>";
												// $forecast = number_format($k + $h, 2);
												$jumlah = $forecast;
												$jumlahabsolut[] = $absolut;
												$jumlah_error_pangkat[] = $error_pangkat;
												$jumlah_persen_error[] = $persen_error;
												$jumlah2[] = $ta->id;
											}
										} elseif ($ta->id == $tahun) {
											echo "<td>" . $no++ . "</td>";
											echo "<td colspan='2' >" . $ta->tahunakademik . "</td>";
											$k = $e->a * round($forecast);
											$h = $ha * $forecast;
											// echo "<td>" . round($forecast) . "</td>";
											$forecast = number_format($k + $h, 2);
											echo "<td colspan='5'>" . $forecast . "</td>";
											$data = array(
												'tahun' => $ta->tahunakademik
											);
											$this->session->set_userdata($data);
											// $jumlah2[] = $ta->id;
										}

										echo "</tr>";
									}

									// var_dump($jumlahabsolut);
									$jumfor['alpha'][$e->a] = $forecast;
									// echo array_sum($jumlahabsolut);
									$mad['alpha'][$e->a] = number_format(array_sum($jumlahabsolut) / count($jumlah2), 2);
									$mse['alpha'][$e->a] = number_format(array_sum($jumlah_error_pangkat) / count($jumlah2), 2);
									$mape['alpha'][$e->a] = number_format(array_sum($jumlah_persen_error) / count($jumlah2), 2);


									$data = array(
										'jumfor'  => $jumfor,
										'mad'  => $mad,
										'mse'  => $mse,
										'mape'  => $mape
									);
									$this->session->set_userdata($data);
									?>

								</tbody>
							</table>

						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">

					</div>
					<!-- /.card-footer-->
				</div>
		<?php }
		} ?>


	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->