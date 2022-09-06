<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/ionicons/css/ionicons.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-qrcode"></i> Iras</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Produksi</a></li>
						<li class="breadcrumb-item active">Iras</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">

		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $total_bc; ?></h3>

							<p>Generate Barcode</p>
						</div>
						<div class="icon">
							<i class="ion ion-qr-scanner"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<?php
							$pres = 0;
							$pres = ($total_bc / 6000) * 100;
							?>
							<h3><?= number_format($pres); ?><sup style="font-size: 20px">%</sup></h3>

							<p>Presentase to Target</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>6.000<sup style="font-size: 20px"> Barcode</sup></h3>

							<p>Target</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-pricetags"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<?php
							$dif = 0;
							$dif = $total_bc - 6000;
							?>
							<h3><?= $dif; ?><sup style="font-size: 20px">Barcode</sup></h3>

							<p>Diff</p>
						</div>
						<div class="icon">
							<i class="ion ion-arrow-graph-up-right"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div>

		<div class="row">
			<div class="col-sm-3">
				<div class="card shadow">
					<form class="form-horizontal" id="form_generate" method="post" validation>
						<div class="card-header">
							<h5 class="m-0 font-weight-bold float-left">Generate Jumlah Barcode</h5>
						</div>
						<div class="card-body">
							<input type="number" class="form-control" id="m_bc_jml" name="m_bc_jml" placeholder="Jumlah Barcode" required>
						</div>
						<div class="card-footer">
							<div class="float-right">
								<button type="button" class="btn btn-outline-primary" id="tombol_generate">Generate</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="card shadow mb-3">
					<div class="card-body">
						<form action="<?= base_url('Produksi/Iras/bc_all'); ?>" method="GET" target="_blank">
							<div class="form-row">
								<div class="col-sm-4">
									<select name="start_bc" id="start_bc" class="form-control" style="width: 100%;" autocomplete="off" required>
										<option value="">- Pilih Kode Awal -</option>
									</select>
								</div>
								<div class="col-sm-4">
									<select name="end_bc" id="end_bc" class="form-control" style="width: 100%;" autocomplete="off" required>
										<option value="">- Pilih Kode Akhir -</option>
									</select>
								</div>
								<div class="col-sm-4">
									<button class="btn btn-default" type="submit"><i class="fas fa-print"></i> Print</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card shadow mb-3">
					<div class="card-header">
						<h5 class="m-0 font-weight-bold float-left">List Data Barcode</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class=" display table table-bordered table-striped table-hover table-sm">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Kode</th>
										<th class="text-center">Barcode</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($generate->result_array() as $row) {
									?>
										<tr class="justify-content-center">
											<td class="text-center"><?= $no++; ?></td>
											<td><?= $row['date_created']; ?></td>
											<td><?= $row['t_bc_kode']; ?></td>
											<td class="text-center">
												<img class="img-rounded" src="<?= ($row['t_bc_img'] == 'no-qrcode.png' ? base_url('assets/dist/img/no-qrcode.png') : base_url('assets/iras/' . $row['t_bc_img'])); ?>" style="width:100px;">
											</td>
											<td class="text-center">
												<a href="<?= base_url('Produksi/Iras/mpdf/' . $row['t_bc_id']); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</section>

</div>

<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<?php $this->load->view('template/v_footer'); ?>
<script>
	$(document).ready(function() {
		$('table.display').DataTable({
			"paging": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});

	$(document).on("click", "#tombol_generate", function() {
		if (validasi3()) {
			var data = $('#form_generate').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Produksi/Iras/generate') ?>',
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
						window.location.assign('<?php echo site_url("Produksi/Iras") ?>');
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

	//start_bc
	$(document).ready(function() {
		$("#start_bc").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url() ?>Produksi/Iras/getkode_bc',
				type: "post",
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						searchTerm: params.term
					};
				},
				processResults: function(response) {
					return {
						results: response
					};
				},
				cache: true
			}
		});
	});

	//start_bc
	$(document).ready(function() {
		$("#end_bc").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url() ?>Produksi/Iras/getkode_bc2',
				type: "post",
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						searchTerm: params.term
					};
				},
				processResults: function(response) {
					return {
						results: response
					};
				},
				cache: true
			}
		});
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>