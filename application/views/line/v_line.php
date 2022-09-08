<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-bezier-curve"></i> Line</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Master</a></li>
						<li class="breadcrumb-item active">Line</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-info"><i class="fas fa-project-diagram"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Line</span>
						<span class="info-box-number"><?= $TotalLine; ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Aktif</span>
						<span class="info-box-number"><?= $Aktif; ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-danger"><i class="far fa-times-circle"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Tidak Aktif</span>
						<span class="info-box-number"><?= $TidakAktif; ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<!-- Default box -->
		<div id="ShowData"></div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('template/v_footer'); ?>
<script>
	$(document).ready(function() {
		$("#ShowData").load("<?= base_url('Master/Line/ShowTableData'); ?>");
	});

	$(document).on("click", ".Tambah", function() {
		$("#ShowData").load("<?= base_url('Master/Line/ShowTambahData'); ?>");
	});

	$(document).on("click", ".Preview", function() {
		let id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?= site_url('Master/Line/ShowDataPreview') ?>",
			data: {
				id: id
			},
			success: function(response) {
				$("#ShowData").html(response);
			}
		});
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>