<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HRMS 1.0 | Scan Barcode</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
	<!-- Sweetalert2 -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/jam.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets'); ?>/dist/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/card-scan.css">
	<style>

	</style>
</head>

<body class="hold-transition pace-primary" style="background-color: #caf0f8;">
	<!-- Automatic element centering -->
	<div class="container box">
		<div class="card card-outline card-primary">
			<div class="ribbon-wrapper ribbon-xl">
				<div class="ribbon bg-primary">
					Absen Barcode
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6 align-self-center d-none d-lg-block">
						<div id="infoabsensi"></div>
						<div class="text-center my-2">
							<h4 id="date-and-clock mt-3">
								<h5 class="text-white" id="clocknow"></h5>
								<h5 class="text-bold" id="datenow"></h5>
							</h4>
						</div>
						<div class="help-block text-center">
							<p class="clock">
								<span class="clock-block hour shadow">
									<span class="clock-val"></span>
									<span class="clock-unit">jam</span>
								</span>
								<span class="clock-block minute shadow">
									<span class="clock-val"></span>
									<span class="clock-unit">menit</span>
								</span>
								<span class="clock-block second shadow">
									<span class="clock-val"></span>
									<span class="clock-unit">detik</span>
								</span>
							</p>
						</div>

					</div>

					<div class="col-sm-6">
						<div id="func-absensi">
							<div class="lockscreen-logo">
								<a href="<?= base_url('assets'); ?>/index2.html" class="text-bold" style="color: black;"><b>HRMS</b>1.0</a>
							</div>

							<!-- START LOCK SCREEN ITEM -->
							<div class="lockscreen-item shadow">
								<!-- lockscreen image -->
								<div class="lockscreen-image shadow">
									<img src="<?= base_url('assets'); ?>/dist/img/qr-code.svg" alt="User Image">
								</div>
								<!-- /.lockscreen-image -->

								<!-- lockscreen credentials (contains the form) -->
								<form class="lockscreen-credentials" action="" method="GET" id="form">
									<div class="input-group">
										<input type="text" class="form-control" name="barcode" id="barcode">

										<div class="input-group-append">
											<button type="button" class="btn">
												<i class="fas fa-qrcode"></i>
											</button>
										</div>

									</div>
								</form>
								<!-- /.lockscreen credentials -->
							</div>
							<!-- /.lockscreen-item -->

							<div class="text-center">
								<a href="<?= base_url('login'); ?>">sign in to Administrator</a>
							</div>
							<div class="lockscreen-footer text-center">
								Copyright &copy; <?= date('Y'); ?> <b><a href="#" style="color: black;">HRMS 1.0</a></b><br>
								All rights reserved
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=zACtQo95"></script>
	<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Sweetalert2 -->
	<script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- pace-progress -->
	<script src="<?= base_url('assets'); ?>/plugins/pace-progress/pace.min.js"></script>
	<script src="<?= base_url('assets'); ?>/dist/js/time.js"></script>
	<script src="<?= base_url('assets'); ?>/dist/js/absen.js"></script>
	<script>
		$(document).on("input", function(e) {
			let data = $('#form').serialize();
			var SetMasuk = Date.now("23:00:00");
			// var SetMasuk = new Date("08:00:00").getTime();
			var Setpulang = new Date("17:00:00").getTime();
			$.ajax({
				type: "POST",
				url: "<?= site_url('Transaksi/Absen/absenajax'); ?>",
				data: data,
				beforeSend: function() {
					swal.fire({
						imageUrl: "<?= base_url('assets/dist/img/ajax-loader.gif');  ?>",
						title: "Proses Absensi",
						text: "Please wait...",
						showConfirmButton: false,
						allowOutsideClick: false,
					});
				},
				success: function(response) {
					let data = JSON.parse(response);
					console.info(data);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Absen Berhasil',
							text: data.msg,
							showConfirmButton: false,
							timer: 2000
						});
						responsiveVoice.speak("Absen Berhasil", "Indonesian Male", {
							volume: 2
						});

					} else {
						SweetAlert.fire({
							icon: 'error',
							title: 'Absen Gagal',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
						responsiveVoice.speak("Mohon Maaf, Absen gagal", "Indonesian Male", {
							volume: 2
						});
					}
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Login/absen_scan") ?>');
					}, 2000);
				},
				error: function() {
					swal.fire({
						icon: "error",
						title: "Absen gagal",
						text: "Ada Kesalahan Saat Absen!",
						showConfirmButton: false,
						timer: 1500,
					});
					responsiveVoice.speak("Ada Kesalahan, Hubungi ICT", "Indonesian Male", {
						volume: 2
					});
					setTimeout(() => {
						window.location.assign('<?php echo site_url("Login/absen_scan") ?>');
					}, 2000);
				},
			});
		});
	</script>
</body>

</html>