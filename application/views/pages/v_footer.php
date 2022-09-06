	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
			Dashboard Karyawan
		</div>
		<!-- Default to the left -->
		<strong>Copyright &copy; <?= date('Y'); ?> <a href="#">HRMS1.0</a>.</strong> All rights reserved.
	</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
	<!-- Sweetalert2 -->
<script src="<?= base_url('assets');?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<?php if ($this->session->flashdata('success')) : ?>
		<script>
			SweetAlert.fire({
				icon: 'success',
				title: 'Success',
				text: '<?php echo $this->session->flashdata('success'); ?>',
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
	<?php if ($this->session->flashdata('warning')) : ?>
		<script>
			SweetAlert.fire({
				icon: 'warning',
				title: 'Warning !',
				text: '<?php echo $this->session->flashdata('warning'); ?>',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	<?php endif;
	unset($_SESSION['warning']); ?>
	<script>
		function Logout() {
			SweetAlert.fire({
				title: 'Logout',
				text: "Apakah kamu yakin , mau keluar dari aplikasi ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.assign('<?php echo base_url('login') ?>');
				}
			})
		}
	</script>
	</body>

	</html>