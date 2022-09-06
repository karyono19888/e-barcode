<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-qrcode"></i> Barcode</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Produksi</a></li>
						<li class="breadcrumb-item active">Barcode</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="row">
			<div class="col-sm">
				<div class="card shadow">
					<div class="card-header">
						<div class="title float-right">
							<button class="btn btn-outline-primary btn-sm Tambah" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i> Tambah</button>
						</div>
						<h5 class="m-0 font-weight-bold float-left">List Data</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class=" display table table-bordered table-striped table-hover table-sm">
								<!-- <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"> -->
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Kode Produk</th>
										<th class="text-center">Nama Produk</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barcode->result_array() as $row) {
										if ($this->session->userdata('level') == 1) {
											$tombol = '<div class="tombol text-center align-items-center">
											<a href="" type="button" class="btn btn-outline-success btn-sm py-1 Edit" data-id="' . $row['m_bc_id'] . '" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i> Detail</a>

											<button data-id="' . $row['m_bc_id'] . '" type="button" class="btn btn-sm btn-outline-secondary Barcode" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-qrcode"></i> Ganerate</button>

											<button class="btn btn-sm btn-outline-danger Hapus" data-id="' . $row['m_bc_id'] . '"><i class="fas fa-trash-alt"></i> Hapus</button>
										</div>';
										} else {
											$tombol = '<div class="tombol text-center align-items-center">
											<button data-id="' . $row['m_bc_id'] . '" type="button" class="btn btn-sm btn-outline-secondary Barcode" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-qrcode"></i> Ganerate</button>
										</div>';
										}
									?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td><?= $row['date_created']; ?></td>
											<td><?= $row['m_bc_kode']; ?></td>
											<td><?= $row['m_bc_nama']; ?></td>
											<td><?= $tombol; ?></td>
										</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<!-- Modal Generate -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Generate Barcode</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="form_generate" method="post" validation>
					<div class="form-group row">
						<label for="m_bc_jml" class="col-sm-4 col-form-label">Jumlah</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="m_bc_id" name="m_bc_id">
							<input type="hidden" class="form-control" id="m_bc_kode" name="m_bc_kode">
							<input type="number" class="form-control" id="m_bc_jml" name="m_bc_jml" placeholder="Jumlah Barcode" required>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline-primary" id="tombol_generate">Generate</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-sm">
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
						<label for="m_bc_kode" class="col-sm-4 col-form-label">Kode Produk</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="m_bc_kode1" name="m_bc_kode" placeholder="Kode" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_bc_nama" class="col-sm-4 col-form-label">Nama Produk</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="m_bc_id" name="m_bc_id">
							<input type="text" class="form-control" id="m_bc_nama" name="m_bc_nama" placeholder="Nama Produk" required>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="m_bc_jml" class="col-sm-4 col-form-label">Count</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="m_bc_jml" name="m_bc_jml" placeholder="Jumlah Barcode" required>
						</div>
					</div> -->
					<div class="modal-footer justify-content-end">
						<button type="button" class="btn btn-outline-primary" id="tombol_tambah">Save</button>
						<button type="button" class="btn btn-outline-primary" id="tombol_update">Update</button>
					</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php $this->load->view('template/v_footer'); ?>
<script>
	$(document).ready(function() {
		$('table.display').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});

	$(document).on("click", ".Tambah", function() {
		$('#judul2').hide();
		$('#tombol_update').hide();
		$('#judul1').show();
		$('#tombol_tambah').show();
	});

	$(document).on("click", ".Barcode", function() {
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Produksi/Barcode/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_bc_id').val(data.m_bc_id);
					$('#m_bc_kode').val(data.m_bc_kode);
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

	$(document).on("click", "#tombol_generate", function() {
		if (validasi3()) {
			var data = $('#form_generate').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Produksi/Barcode/generate') ?>',
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
						window.location.assign('<?php echo site_url("Produksi/Barcode") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi3() {
		var m_bc_jml = document.getElementById("m_bc_jml").value;
		if (m_bc_jml != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Kolom Tidak Boleh Kosong!',
			})
		}
	}

	$(document).on("click", ".Edit", function() {
		$('#judul1').hide();
		$('#tombol_tambah').hide();
		$('#judul2').show();
		$('#tombol_update').show();
		var html = '';
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Produksi/Barcode/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_bc_id').val(data.m_bc_id);
					$('#m_bc_nama').val(data.m_bc_nama);
					$('#m_bc_kode1').val(data.m_bc_kode);
					// $('#m_bc_jml').val(data.m_bc_jml);
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

	$(document).on("click", ".close", function() {
		var html = '';
		$('#m_bc_id').val("");
		$('#m_bc_nama').val("");
		$('#m_bc_kode1').val("");
	});

	$(document).on("click", "#tombol_update", function() {
		if (validasi2()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Produksi/Barcode/update') ?>',
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
						window.location.assign('<?php echo site_url("Produksi/Barcode") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi2() {
		var m_bc_nama = document.getElementById("m_bc_nama").value;
		var m_bc_kode = document.getElementById("m_bc_kode").value;
		// var m_bc_jml = document.getElementById("m_bc_jml").value;
		if (m_bc_nama != "" && m_bc_kode != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}

	$(document).on("click", "#tombol_tambah", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Produksi/Barcode/create') ?>',
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
						window.location.assign('<?php echo site_url("Produksi/Barcode") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi() {
		var m_bc_nama = document.getElementById("m_bc_nama").value;
		var m_bc_kode = document.getElementById("m_bc_kode1").value;
		if (m_bc_nama != "" && m_bc_kode != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}

	$(document).on("click", ".Hapus", function() {
		var m_bc_id = $(this).data('id');
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
					url: '<?= site_url('Produksi/Barcode/delete') ?>',
					data: {
						m_bc_id: m_bc_id,
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: data.msg,
								showConfirmButton: false,
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
							window.location.assign('<?php echo site_url("Produksi/Barcode") ?>');
						}, 2000);
					}
				});
			}
		})
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>