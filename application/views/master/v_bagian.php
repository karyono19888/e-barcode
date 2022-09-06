<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-users"></i> Bagian</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Master</a></li>
						<li class="breadcrumb-item active">Bagian</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h5 class="m-0 font-weight-bold text-primary float-left">Departemen</h5>
						<button type="button" class="btn btn-outline-primary btn-sm Tambah float-right" data-toggle="modal" data-target="#departemen" data-backdrop="static" data-keyboard="false">
							<i class="fas fa-plus-circle"></i> Add
						</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped table-hover table-sm">
								<!-- <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"> -->
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Departemen</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data->result_array() as $row) {
									?>
										<tr>
											<td class="text-center" width="50"><?= $no++ ?></td>
											<td><?= $row['m_dep_nama'] ?></td>
											<td width="50">
												<div class="btn-group">
													<button type="button" class="btn btn-tool" data-toggle="dropdown">
														<i class="fas fa-ellipsis-v"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right" role="menu">
														<a href="#" class="dropdown-item Edit" data-toggle="modal" data-target="#departemen" data-id="<?= $row['m_dep_id'] ?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
														<a href="#" class="dropdown-item Hapus" data-id="<?= $row['m_dep_id'] ?>"><i class="fas fa-trash-alt"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php }; ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<small class="footer">
							Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'HRMS Version <strong>' . CI_VERSION . '</strong>' : '' ?></small>
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
				<div class="card">
					<div class="card-header">
						<h5 class="m-0 font-weight-bold text-success float-left">Jabatan</h5>
						<button type="button" class="btn btn-outline-success btn-sm Tambah float-right" data-toggle="modal" data-target="#Modaljabatan" data-backdrop="static" data-keyboard="false">
							<i class="fas fa-plus-circle"></i> Add
						</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="jabatan" class="table table-bordered table-striped table-hover table-sm">
								<!-- <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"> -->
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Jabatan</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($Jab->result_array() as $row) {
									?>
										<tr>
											<td class="text-center" width="50"><?= $no++ ?></td>
											<td><?= $row['m_jab_nama'] ?></td>
											<td width="50">
												<div class="btn-group">
													<button type="button" class="btn btn-tool" data-toggle="dropdown">
														<i class="fas fa-ellipsis-v"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right" role="menu">
														<a href="#" class="dropdown-item ubah" data-toggle="modal" data-target="#Modaljabatan" data-id="<?= $row['m_jab_id'] ?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
														<a href="#" class="dropdown-item delete" data-id="<?= $row['m_jab_id'] ?>"><i class="fas fa-trash-alt"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php }; ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						z<small class="footer">
							Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'HRMS Version <strong>' . CI_VERSION . '</strong>' : '' ?></small>
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- start modal -->
<div class="modal fade" id="departemen">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" id="form" method="post" validation>
				<div class="modal-header">
					<h4 class="modal-title" id="judul1">Tambah Data</h4>
					<h4 class="modal-title" id="judul2">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="alert"></div>
					<div class="form-group row">
						<label for="m_dep_nama" class="col-sm-4 col-form-label">Nama Departemen</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="m_dep_id" name="m_dep_id">
							<input type="text" class="form-control" id="m_dep_nama" name="m_dep_nama" placeholder="Nama Departemen" required>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-primary" id="tombol_tambah">Save</button>
					<button type="button" class="btn btn-outline-primary" id="tombol_update">Update</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- start modal -->
<div class="modal fade" id="Modaljabatan">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" id="form2" method="post" validation>
				<div class="modal-header">
					<h4 class="modal-title" id="judul3">Tambah Data</h4>
					<h4 class="modal-title" id="judul4">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="alert"></div>
					<div class="form-group row">
						<label for="m_jab_nama" class="col-sm-4 col-form-label">Nama Jabatan</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="m_jab_id" name="m_jab_id">
							<input type="text" class="form-control" id="m_jab_nama" name="m_jab_nama" placeholder="Nama Jabatan" required>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-primary" id="tombol_save">Save</button>
					<button type="button" class="btn btn-outline-primary" id="tombol_terbaru">Update</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php $this->load->view('template/v_footer'); ?>
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
	$(function() {
		$("#jabatan").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
	$(document).on("click", ".close", function() {
		$('#m_dep_id').val("");
		$('#m_dep_nama').val("");
		$('#m_jab_id').val("");
		$('#m_jab_nama').val("");
	});

	$(document).on("click", ".Tambah", function() {
		$('#judul2').hide();
		$('#tombol_update').hide();
		$('#judul1').show();
		$('#tombol_tambah').show();
	});

	// edit dep
	$(document).on("click", ".Edit", function() {
		$('#judul1').hide();
		$('#tombol_tambah').hide();
		$('#judul2').show();
		$('#tombol_update').show();
		var html = '';
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Master/Bagian/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_dep_id').val(data.m_dep_id);
					$('#m_dep_nama').val(data.m_dep_nama);
				} else {
					SweetAlert.fire({
						icon: 'warning',
						title: 'Warning',
						text: data.msg,
						showConfirmButton: false,
						timer: 1500
					});
				}
			}
		});
	});

	$(document).on("click", "#tombol_tambah", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Bagian/create') ?>',
				data: data,
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Success',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						SweetAlert.fire({
							icon: 'error',
							title: 'Error',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					}
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Master/Bagian") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi() {
		var html = '';
		var m_dep_nama = document.getElementById("m_dep_nama").value;
		if (m_dep_nama != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}
	$(document).on("click", "#tombol_update", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Bagian/update') ?>',
				data: data,
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Success',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						SweetAlert.fire({
							icon: 'error',
							title: 'Error',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					}
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Master/Bagian") ?>');
					}, 1500);
				}
			});
		}
	});
	$(document).on("click", ".Hapus", function() {
		var m_dep_id = $(this).data('id');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Master/Bagian/delete') ?>',
					data: {
						m_dep_id: m_dep_id
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							SweetAlert.fire({
								icon: 'error',
								title: 'Oops..',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						}
						setTimeout(() => {
							window.location.assign('<?php echo site_url("Master/Bagian") ?>');
						}, 1500);
					}
				});
			}
		})
	});
	/* tambah jabatan tombol */
	$(document).on("click", ".Tambah", function() {
		$('#judul3').hide();
		$('#tombol_terbaru').hide();
		$('#judul4').show();
		$('#tombol_save').show();
	});
	// edit jabatan
	$(document).on("click", ".ubah", function() {
		$('#judul3').hide();
		$('#tombol_save').hide();
		$('#judul4').show();
		$('#tombol_terbaru').show();
		var html = '';
		var myid1 = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Master/Bagian/viewJab') ?>',
			data: {
				myid1: myid1
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_jab_id').val(data.m_jab_id);
					$('#m_jab_nama').val(data.m_jab_nama);
				} else {
					SweetAlert.fire({
						icon: 'warning',
						title: 'Warning',
						text: data.msg,
						showConfirmButton: false,
						timer: 1500
					});
				}
			}
		});
	});
	$(document).on("click", "#tombol_save", function() {
		if (validasi1()) {
			var data = $('#form2').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Bagian/createjab') ?>',
				data: data,
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Success',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						SweetAlert.fire({
							icon: 'error',
							title: 'Error',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					}
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Master/Bagian") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi1() {
		var html = '';
		var m_jab_nama = document.getElementById("m_jab_nama").value;
		if (m_jab_nama != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}
	$(document).on("click", "#tombol_terbaru", function() {
		if (validasi1()) {
			var data = $('#form2').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Bagian/updatejab') ?>',
				data: data,
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Success',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						SweetAlert.fire({
							icon: 'error',
							title: 'Error',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					}
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Master/Bagian") ?>');
					}, 1500);
				}
			});
		}
	});
	$(document).on("click", ".delete", function() {
		var m_jab_id = $(this).data('id');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Master/Bagian/deletejab') ?>',
					data: {
						m_jab_id: m_jab_id
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							SweetAlert.fire({
								icon: 'error',
								title: 'Oops..',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						}
						setTimeout(() => {
							window.location.assign('<?php echo site_url("Master/Bagian") ?>');
						}, 1500);
					}
				});
			}
		})
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>