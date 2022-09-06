<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1>Profile</h1>
		</div>
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Profile</li>
		</ol>
		</div>
	</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		<!-- Profile Image -->
			<div class="card card-primary card-outline">
				<div class="card-body box-profile">
				<div class="text-center">
					<img class="profile-user-img img-fluid img-circle"
						src="<?= base_url('assets');?>/dist/img/user4-128x128.jpg"
						alt="User profile picture">
				</div>

				<h3 class="profile-username text-center">Nina Mcintire</h3>

				<p class="text-muted text-center">Software Engineer</p>

				<ul class="list-group list-group-unbordered mb-3">
					<li class="list-group-item">
					<b>Followers</b> <a class="float-right">1,322</a>
					</li>
				</ul>

				<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
		<!-- /.col -->
		<div class="col-md-9">
		<div class="card">
			<div class="card-header p-2">
			<ul class="nav nav-pills">
				<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
				<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
			</ul>
			</div><!-- /.card-header -->
			<div class="card-body">
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				<!-- Post -->
				<div class="post">
					<div class="user-block">
					<span class="username">
						<a href="#">Adam Jones</a>
					</span>
					<span class="description">Posted 5 photos - 5 days ago</span>
					</div>
					<!-- /.user-block -->
					<div class="row mb-3">
						<div class="col-sm-6">

						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<div class="row">

							</div>
							<!-- /.row -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.post -->
				</div>


				<div class="tab-pane" id="settings">
				<form class="form-horizontal">
					<div class="form-group row">
					<label for="inputName" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputName" placeholder="Email">
					</div>
					</div>
					<div class="form-group row">
					<label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail" placeholder="Username">
					</div>
					</div>
					<div class="form-group row">
					<label for="inputName2" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputName2" placeholder="Password">
					</div>
					</div>
					<div class="form-group row">
					<label for="inputName2" class="col-sm-2 col-form-label">Konformasi Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputName2" placeholder="Konfirmasi Password">
					</div>
					</div>
					<div class="form-group row">
					<div class="offset-sm-2 col-sm-10">
						<button type="submit" class="btn btn-danger">Submit</button>
					</div>
					</div>
				</form>
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
