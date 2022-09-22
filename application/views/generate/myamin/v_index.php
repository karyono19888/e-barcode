<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-barcode"></i> Myamin</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('Generate/Myamin'); ?>">Generate</a></li>
						<li class="breadcrumb-item active">Myamin</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="callout callout-warning">
						<h5><i class="icon fas fa-info"></i> Informasi</h5>
						<p>Silahkan pilih <b>line</b> sesuai dengan <b>line anda</b>, jika ada kendala hubungi Team IT.</p>
					</div>
				</div>
			</div>
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<?php foreach ($data->result_array() as $a) : ?>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<button class="btn btn-block Tambah" <?= $a['m_line_status'] == "Aktif" ? '' : 'disabled' ?> data-id="<?= $a['m_line_id'] ?>">
							<div class="small-box bg-<?= $a['m_line_warna']; ?>">
								<?php if ($a['m_line_status'] == "Tidak Aktif") : ?>
									<div class="ribbon-wrapper ribbon-lg">
										<div class="ribbon bg-warning">
											Tidak Aktif
										</div>
									</div>
								<?php endif; ?>
								<div class="inner text-left">
									<h3><?= $a['m_line_nama']; ?></h3>

									<p>Generate Barcode</p>
								</div>
								<div class="icon">
									<i class="ion ion-qr-scanner"></i>
								</div>
							</div>
						</button>
					</div>
				<?php endforeach; ?>
				<!-- ./col -->
			</div>
			<!-- /.row -->

			<!-- Default box -->
			<!-- <div id="ShowData"></div> -->
			<!-- /.card -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('template/v_footer'); ?>
<script>
	$(document).on("click", ".Tambah", function() {
		let id = $(this).data('id');
		window.location.assign('<?= site_url("Generate/Myamin/GenerateBarcode/") ?>' + id);
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>