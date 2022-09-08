<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Admin</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Admin</a></li>
						<li class="breadcrumb-item active">Menu</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card shadow mb-3">
			<div class="card-header">
				<h5 class="m-0 font-weight-bold text-primary float-left">List Data</h5>
				<button type="button" class="btn btn-outline-primary Tambah float-right" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false">
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
								<th class="text-center">Parent Menu</th>
								<th class="text-center">Nama Menu</th>
								<th class="text-center">Link</th>
								<th class="text-center">Icon</th>
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
									<td><?= $row['menu'] ?></td>
									<td><?= $row['submenu'] ?></td>
									<td><?= $row['link'] ?></td>
									<td><?= $row['icon'] ?></td>
									<td width="50">
										<div class="btn-group">
											<button type="button" class="btn btn-tool" data-toggle="dropdown">
												<i class="fas fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" role="menu">
												<a href="#" class="dropdown-item Edit" data-toggle="modal" data-target="#modal-sm" data-id="<?= $row['a_mn_id'] ?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
												<a href="#" class="dropdown-item Hapus" data-id="<?= $row['a_mn_id'] ?>"><i class="fas fa-trash-alt"></i> Delete</a>
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
					Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'HRMS Version <strong>' . CI_VERSION . '</strong>' : '' ?>
				</small>
			</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- start modal -->
<div class="modal fade" id="modal-sm">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" id="form" method="post">
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
						<label for="qty" class="col-sm-4 col-form-label">Parent Menu :</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="a_mn_id" name="a_mn_id">
							<select class="form-control select2" style="width: 100%;" id="a_mn_parentId" name="a_mn_parentId" data-placeholder="Parent Menu">
								<option value=""></option>
								<?php foreach ($menu->result_array() as $data) { ?>
									<option value="<?= $data['a_mn_id'] ?>"><?= $data['a_mn_name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="lot" class="col-sm-4 col-form-label">Nama Menu :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="a_mn_name" name="a_mn_name" placeholder="Nama Menu" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="box" class="col-sm-4 col-form-label">Link :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="a_mn_link" name="a_mn_link" placeholder="Link">
						</div>
					</div>
					<div class="form-group row">
						<label for="cart" class="col-sm-4 col-form-label">Icon :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="a_mn_icon" name="a_mn_icon" placeholder="Icon" required>
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
<?php $this->load->view('template/v_footer'); ?>
<script>
	$(document).on("click", ".Tambah", function() {
		$('#judul2').hide();
		$('#tombol_update').hide();
		$('#judul1').show();
		$('#tombol_tambah').show();
	});
	$(document).on("click", ".Edit", function() {
		$('#judul1').hide();
		$('#tombol_tambah').hide();
		$('#judul2').show();
		$('#tombol_update').show();
		var html = '';
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Admin/Menu/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#a_mn_id').val(data.a_mn_id);
					$('#a_mn_name').val(data.a_mn_name);
					$('#a_mn_link').val(data.a_mn_link);
					$('#a_mn_icon').val(data.a_mn_icon);
					html += '<option value=' + data.parentMenuId + '>' + data.parentMenu + '</option>';
					html += '<?php foreach ($menu->result_array() as $data) { ?><option value="<?= $data['a_mn_id'] ?>"><?= $data['a_mn_name'] ?></option><?php } ?>';
					$('#a_mn_parentId').html(html);
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
		$('#a_mn_id').val("");
		$('#a_mn_name').val("");
		$('#a_mn_link').val("");
		$('#a_mn_icon').val("");
		html += '<option value=""></option>';
		html += '<?php foreach ($menu->result_array() as $data) { ?><option value="<?= $data['a_mn_id'] ?>"><?= $data['a_mn_name'] ?></option><?php } ?>';
		$('#a_mn_parentId').html(html);
		$('#alert').html('');
	});
	$(document).on("click", "#tombol_tambah", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Admin/Menu/create') ?>',
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
						window.location.assign('<?php echo site_url("Admin/Menu") ?>');
					}, 1500);
				}
			});
		}
	});
	$(document).on("click", "#tombol_update", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Admin/Menu/update') ?>',
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
						window.location.assign('<?php echo site_url("Admin/Menu") ?>');
					}, 1500);
				}
			});
		}
	});
	$(document).on("click", ".Hapus", function() {
		var a_mn_id = $(this).data('id');
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
					url: '<?= site_url('Admin/Menu/delete') ?>',
					data: {
						a_mn_id: a_mn_id
					},
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
							window.location.assign('<?= site_url("Admin/Menu") ?>');
						}, 1500);
					}
				});
			}
		})
	});

	function validasi() {
		var html = '';
		var a_mn_name = document.getElementById("a_mn_name").value;
		var a_mn_icon = document.getElementById("a_mn_icon").value;
		if (a_mn_name != "" && a_mn_icon != "") {
			return true;
		} else {
			SweetAlert.fire({
				icon: 'warning',
				title: 'Warning',
				text: 'Kolom Nama Menu & Icon tidak boleh kosong!',
				showConfirmButton: false,
				timer: 1500
			});
		}
	}

	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>