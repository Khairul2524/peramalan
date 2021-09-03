<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="font-viga">Data Siswa</h1>
				</div>

			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
		<div class="flash-berhasil" data-flashberhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title font-viga">
					<button class="btn btn-sm btn-block bg-gradient-success btn-flat font-viga tambah" data-toggle="modal" data-target="#exampleModal">Tambah </button>
				</h3>

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
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data as $d) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $d->tahunpenerimaan ?></td>
									<td><?= $d->jumlah ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-warning btn-flat ubah" title="Ubah data" data-toggle="modal" data-target="#exampleModal" data-id="<?= $d->id ?>"><i class="fa fa-edit"></i></button>
										<a href="<?= site_url('siswa/hapus/') . $d->id ?>" class="btn btn-sm btn-danger btn-flat tombol-hapus" title="Hapus Dusun"><i class="fa fa-trash"></i></a>
									</td>
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

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-viga" id="ModalLabels">Tambah Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('siswa/tambah') ?>" method="POST">
				<div class="modal-body">

					<div class="form-group">
						<label for="ta">Tahun Akademik</label>
						<input type="text" name="id" id="id" hidden>
						<input type="text" class="form-control rounded-0" id="ta" name="ta" placeholder="Tahun Akademik" autocomplete="off" required value="">
					</div>
					<div class="form-group">
						<label>Jumlah Siswa</label>
						<input type="number" class="form-control rounded-0" id="js" name="js" placeholder="Jumlah Siswa" autocomplete="off" required value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-flat btn-danger font-viga" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-success btn-sm btn-flat font-viga">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(function() {
		// tambah
		$('.tambah').on('click', function() {
			$('#ModalLabels').html('Tambah Siswa')
			$('.modal-footer button[type= submit]').html('Simpan')
			$('#id').val('')
			$('#ta').val('')
			$('#js').val('')

		})
		// ubah
		$('.ubah').on('click', function() {
			$('#ModalLabels').html('Ubah Siswa')
			$('.modal-footer button[type= submit]').html('Ubah')
			$('.modal-content form').attr('action', `<?= base_url('siswa/simpanubah') ?>`)
			const id = $(this).data('id')
			// console.log(id);
			$.ajax({
				url: `<?= base_url('siswa/ubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					$('#id').val(data.id)
					$('#ta').val(data.tahunpenerimaan)
					$('#js').val(data.jumlah)
				}
			})
		})
	})
</script>