<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-project-diagram"></i> <?= $data['m_line_nama']; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('Generate/Myamin'); ?>"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a></li>
						<li class="breadcrumb-item active"><?= $data['m_line_nama']; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>12</h3>

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
							<h3>12<sup style="font-size: 20px">%</sup></h3>

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
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-sm-3">
					<div class="card">

						<!-- card generate -->
						<form class="form-horizontal" id="form_generate" method="post" validation>
							<div class="card-header">
								<h5 class="m-0 font-weight-bold float-left">Generate Jumlah Barcode</h5>
							</div>
							<div class="card-body">
								<input type="number" class="form-control" id="m_bc_jml" name="m_bc_jml" placeholder="Jumlah Barcode" autofocus required>
							</div>
							<div class="card-footer">
								<div class="float-right">
									<button type="button" class="btn btn-outline-primary" id="tombol_generate">Generate</button>
								</div>
							</div>
						</form>

						<!-- overlay -->
						<?php
						$b = $master->row_array();
						if ($b['m_grp_status'] == "New" || $b['m_grp_status'] == "") :
						?>
							<div class="overlay">
								<i class="fas fa-2x fa-sync-alt"></i>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-9">

					<!-- table team line -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Team <b><?= $data['m_line_nama']; ?></b></h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-0">
							<table class="table table-striped projects">
								<thead>
									<tr>
										<th style="width: 1%">
											No
										</th>
										<th style="width: 20%">
											Project Name
										</th>
										<th style="width: <?= $b['m_grp_status'] == "New" ? '40%' : '55%' ?>">
											Team Members
										</th>
										<th style="width: 8%" class="text-center">
											Status
										</th>
										<?php
										$b = $master->row_array();
										if ($b['m_grp_status'] == "New" || $b['m_grp_status'] == "") :
										?>
											<th style="width: 10%">
												Action
											</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php
									$cek = $master->row_array();
									if ($cek['m_grp_status'] == "") :
									?>
										<tr>
											<td colspan="6" class="text-center">
												<a class="btn btn-default" data-toggle="modal" data-target="#modal-default" data-backdrop="static" href="#">
													<i class="fas fa-plus"></i>
													Tambah Team Line
												</a>
											</td>
										</tr>
									<?php else : ?>
										<?php
										$o = 1;
										foreach ($master->result_array() as $i) :
										?>
											<tr>
												<td>
													<?= $o++; ?>
												</td>
												<td>
													<a>
														<?= $i['m_grp_nama']; ?>
													</a>
													<br />
													<small>
														Created <?= date('d-m-Y H:i:s', $i['created']); ?>
													</small>
												</td>
												<td>
													<ul class="list-inline">
														<?php foreach ($teams->result_array() as $a) : ?>
															<li class="list-inline-item">
																<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
																	<img alt="team-image" class="table-avatar" src="<?= $a['m_karyawan_img']; ?>">
																</span>
															</li>
														<?php endforeach; ?>
													</ul>
												</td>
												<td class="project-state">
													<?php if ($i['m_grp_status'] == "New") : ?>
														<span class="badge badge-primary"><?= $i['m_grp_status']; ?></span>
													<?php elseif ($i['m_grp_status'] == "In Progress") : ?>
														<span class="badge badge-warning"><?= $i['m_grp_status']; ?></span>
													<?php else : ?>
														<span class="badge badge-danger"><?= $i['m_grp_status']; ?></span>
													<?php endif; ?>
												</td>
												<td class="project-actions text-center">
													<!-- <a class="btn btn-info btn-sm" href="#">
														<i class="fas fa-pencil-alt">
														</i>
														Edit
													</a> -->
													<?php if ($i['m_grp_status'] == "New") : ?>
														<a class="btn btn-danger btn-sm Hapus" data-id="<?= $i['m_grp_id']; ?>" data-line="<?= $i['m_grp_line_id'] ?>" href="#">
															<i class="fas fa-trash">
															</i>
															Delete
														</a>
													<?php endif; ?>
												</td>
											</tr>
											<?php if ($i['m_grp_status'] == "New") : ?>
												<tr>
													<td colspan="6" class="text-center">
														<a class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-default" data-backdrop="static" href="#">
															<i class="fas fa-plus"></i>
															Tambah Team Line
														</a>
														<a class="btn bg-gradient-secondary StartGenerate" href="#" data-id="<?= $i['m_grp_id']; ?>" data-line="<?= $i['m_grp_line_id'] ?>">
															<i class="fas fa-play"></i>
															Start Generate Barcode
														</a>
													</td>
												</tr>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>

					<!-- table history barcode -->
					<div class="card mb-3">
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

									</tbody>
								</table>
							</div>
						</div>
						<?php
						$b = $master->row_array();
						if ($b['m_grp_status'] == "New" || $b['m_grp_status'] == "") :
						?>
							<div class="overlay">
								<i class="fas fa-2x fa-sync-alt"></i>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="FormModalBarcode" method="get">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Teams</h4>
					<button type="button" class="close" data-dismiss="modal" data-id="<?= $data['m_line_id']; ?>" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="scan_barcode" name="scan_barcode" placeholder="Scan Barcode" autofocus required>
					<input type="hidden" id="line_id" name="line_id" value="<?= $data['m_line_id']; ?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php $this->load->view('template/v_footer'); ?>
<script>
	$('#modal-default').on('shown.bs.modal', function() {
		$('#scan_barcode').focus();
	})

	$("#FormModalBarcode").on('submit', function(e) {
		e.preventDefault();
		let data = $('#FormModalBarcode').serialize();
		$.ajax({
			url: '<?php echo site_url("Generate/Myamin/TambahTeamsLine"); ?>',
			type: 'POST',
			data: data,
			success: function(response) {
				const data = JSON.parse(response);
				if (data.success) {
					SweetAlert.fire({
						icon: 'success',
						title: 'Success',
						text: data.msg,
						imageWidth: 300,
						imageHeight: 300,
						showConfirmButton: false,
						timer: 2000
					});
					setTimeout(() => {
						$('#FormModalBarcode')[0].reset();
						$('#scan_barcode').focus();
					}, 2500);
				} else {
					SweetAlert.fire({
						icon: 'error',
						title: 'Error',
						text: data.msg,
						showConfirmButton: false,
						timer: 2000
					});
					setTimeout(() => {
						$('#FormModalBarcode')[0].reset();
						$('#scan_barcode').focus();
					}, 2500);
				}
			}
		})

	})
	$(document).ready(function() {
		$('table.display').DataTable({
			"autoWidth": false,
		});
	});
	$(document).on("click", ".close", function() {
		let id = $(this).data('id');
		window.location.assign('<?= site_url("Generate/Myamin/GenerateBarcode/") ?>' + id);
	});

	$(document).on("click", ".StartGenerate", function() {
		let id = $(this).data('id');
		let line = $(this).data('line');
		Swal.fire({
			title: 'Are you sure?',
			text: "You start generate tools!",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, let start!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Generate/Myamin/StartGenerateBarcode') ?>',
					data: {
						id: id
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Start Generate Success!',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							SweetAlert.fire({
								icon: 'error',
								title: 'Oops..',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						}
						setTimeout(() => {
							window.location.assign('<?= site_url("Generate/Myamin/GenerateBarcode/") ?>' + line);
						}, 2000);
					}
				});
			}
		})
	});
	$(document).on("click", ".Hapus", function() {
		let id = $(this).data('id');
		let line = $(this).data('line');
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
					url: '<?= site_url('Generate/Myamin/GenerateBarcodeDelete') ?>',
					data: {
						id: id
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							SweetAlert.fire({
								icon: 'error',
								title: 'Oops..',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						}
						setTimeout(() => {
							window.location.assign('<?= site_url("Generate/Myamin/GenerateBarcode/") ?>' + line);
						}, 2000);
					}
				});
			}
		})
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>