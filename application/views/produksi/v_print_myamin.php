<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-barcode"></i> Generate</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Produksi</a></li>
						<li class="breadcrumb-item active">Generate</li>
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
						<h5 class="m-0 font-weight-bold float-left">List Data</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class=" display table table-bordered table-striped table-hover table-sm">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Nama</th>
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
												<img class="img-rounded" src="<?= ($row['t_bc_img'] == 'no-qrcode.png' ? base_url('assets/dist/img/no-qrcode.png') : base_url('assets/barcodemyamin/' . $row['t_bc_img'])); ?>" style="width:100px;">
											</td>
											<td class="text-center">
												<a href="<?= base_url('Produksi/Myamin/mpdf_myamin/' . $row['t_bc_id']); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
	</section>
</div>
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
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

	//start_bc
	$(document).ready(function() {
		$("#start_bc").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url() ?>Produksi/Generate/getkode_bc',
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
				url: '<?= base_url() ?>Produksi/Generate/getkode_bc2',
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