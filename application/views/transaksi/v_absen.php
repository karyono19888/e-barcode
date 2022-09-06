
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1><i class="fas fa-user-clock"></i> Absen</h1>
		</div>
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Transaksi</a></li>
			<li class="breadcrumb-item active">Absen</li>
		</ol>
		</div>
	</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="card">
	<div class="card-header">
    	<h5 class="m-0 font-weight-bold text-primary float-left">List Data</h5>
		<button type="button" class="btn btn-outline-primary btn-sm Tambah float-right" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false">
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
					<th class="text-center">NIP</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Status</th>
					<th class="text-center">Jam Masuk</th>
					<th class="text-center">Jam Pulang</th>
					<th class="text-center"><i class="fas fa-cogs"></i></th>
				</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<small class="footer">
            Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'HRMS Version <strong>' . CI_VERSION . '</strong>' : '' ?>
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
		<label for="qty" class="col-sm-4 col-form-label">Full Name</label>
		<div class="col-sm-8">
			<input type="hidden" class="form-control" id="a_user_id" name="a_user_id">
			<input type="text" class="form-control" id="a_user_name" name="a_user_name" placeholder="Nama Agent" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="lot" class="col-sm-4 col-form-label">Username </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="a_user_username" name="a_user_username" placeholder="Username" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="lot" class="col-sm-4 col-form-label">Email</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="a_user_email" name="a_user_email" placeholder="Email" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="a_user_password" class="col-sm-4 col-form-label">Password</label>
		<div class="col-sm-8">
			<input type="password" class="form-control form-password" id="a_user_password" name="a_user_password" placeholder="Password">
		</div>
		</div>
		<div class="form-group row">
		<label for="a_user_password" class="col-sm-4 col-form-label"></label>
		<div class="col-sm-8">
		<input type="checkbox" class="form-checkbox"> Show password
		</div>
		</div>
		<div class="form-group row">
		<label for="cart" class="col-sm-4 col-form-label">Level</label>
		<div class="col-sm-8">
			<select class="form-control" style="width: 100%;" id="a_user_level" name="a_user_level" data-placeholder="Level" required>
			<option value=""></option>

			</select>
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
	$(function () {
$("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["csv", "excel", "pdf", "print"]
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
</script>
<?php $this->load->view('template/v_bottom'); ?>
