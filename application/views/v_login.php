<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Barcode | Login </title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
	<!-- Sweetalert2 -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets'); ?>/dist/img/e-logo.svg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
</head>

<body class="hold-transition pace-primary">
	<div class="login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			<div class="card card-outline card-primary">
				<div class="card-header text-center">
					<img src="<?= base_url('assets/dist/img/e-brcode.svg'); ?>" alt="" width="100%">
				</div>
				<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>

					<form class="user" method="post" action="<?= base_url('Login/Proses'); ?>">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" id="password" name="password" class="form-control form-password" placeholder="Password" required>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="icheck-primary">
									<input type="checkbox" id="lihatpas" class="form-checkbox">
									<label for="lihatpas">
										Show Password
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-6">
								<button type="submit" id="myButton" class="btn btn-primary btn-block"><i class="fas fa-user-lock"></i> Login</button>
							</div>
							<!-- /.col -->
						</div>
					</form>

					<div class="social-auth-links text-center mt-2 mb-3">

					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer mt-3">
					<div class="text-center">
						<small>Copyright &copy;<?= date('Y'); ?> <a href="#"><b>E-Barcode</b></a> Version 1.0</small>
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
	<!-- Sweetalert2 -->
	<script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- pace-progress -->
	<script src="<?= base_url('assets'); ?>/plugins/pace-progress/pace.min.js"></script>
	<?php if ($this->session->flashdata('success')) : ?>
		<script>
			SweetAlert.fire({
				icon: 'success',
				title: '<?php echo $this->session->flashdata('success'); ?>',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	<?php endif;
	unset($_SESSION['success']); ?>
	<?php if ($this->session->flashdata('error')) : ?>
		<script>
			SweetAlert.fire({
				icon: 'error',
				title: 'Oops..',
				text: '<?php echo $this->session->flashdata('error'); ?>',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	<?php endif;
	unset($_SESSION['error']); ?>
	<script>
		$(document).ready(function() {
			$('.form-checkbox').click(function() {
				if ($(this).is(':checked')) {
					$('.form-password').attr('type', 'text');
				} else {
					$('.form-password').attr('type', 'password');
				}
			});
		});
	</script>
</body>

</html>