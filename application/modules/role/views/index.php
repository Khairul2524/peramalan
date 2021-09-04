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
					<h1 class="font-viga">Role</h1>
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
				<ul class="nav nav-pills">
					<li class="nav-item mr-2">
						<button class="btn btn-sm btn-block bg-gradient-success btn-flat font-viga tombol-tambah" data-toggle="modal" data-target="#exampleModal">Tambah role</button>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Role</th>
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
									<td><?= $d->role ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-warning btn-flat tombol-ubah" title="Ubah Dusun" data-toggle="modal" data-target="#exampleModal" data-id="<?= $d->idrole ?>"><i class="fa fa-edit"></i></button>
										<a href="<?= site_url('role/hapus/') . $d->idrole ?>" class="btn btn-sm btn-danger btn-flat tombol-h" title="Hapus Dusun"><i class="fa fa-trash"></i></a>
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
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form action="<?= site_url('role/tambah') ?>" method="POST">
						<div class="id">
							<input type="text" hidden class="form-control" id="id" name="id">
						</div>
						<div class="modal-header">
							<h5 class="modal-title font-viga" id="ModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="role">Nama Role</label>
								<input type="text" class="form-control rounded-0" id="role" name="role" placeholder="Nama role" autocomplete="off" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger font-viga btn-flat btn-sm" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-success font-viga btn-flat btn-sm"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {
			$('#ModalLabel').html('Tambah Role')
			$('.modal-footer button[type= submit]').html('Simpan')
			$('.id').val('')
			$('#role').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('#ModalLabel').html('Ubah Role')
			$('.modal-footer button[type= submit]').html('Ubah')
			$('.modal-content form').attr('action', `<?= site_url('role/ubah') ?>`)

			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('role/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					$('#id').val(data.idrole)
					$('#role').val(data.role)
				}
			})
		})
	})
</script>