<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-tags"></i> Label</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Produksi</a></li>
						<li class="breadcrumb-item active">Label</li>
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
								<!-- <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"> -->
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Kode Produk</th>
										<th class="text-center">Nama Produk</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($label->result_array() as $row) {
										if ($this->session->userdata('level') == 1) {
											$tombol = '<div class="tombol text-center align-items-center">

											<button data-id="' . $row['m_label_id'] . '" type="button" class="btn btn-sm btn-outline-secondary Barcode" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-qrcode"></i> Ganerate</button>

											<button class="btn btn-sm btn-outline-danger Hapus" data-id="' . $row['m_label_id'] . '"><i class="fas fa-trash-alt"></i> Hapus</button>
										</div>';
										} else {
											$tombol = '<div class="tombol text-center align-items-center">
											<button data-id="' . $row['m_label_id'] . '" type="button" class="btn btn-sm btn-outline-secondary Barcode" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-qrcode"></i> Ganerate</button>
										</div>';
										}
									?>
										<tr class="text-center">
											<td><?= $no++; ?></td>
											<td><?= $row['ctreated_it']; ?></td>
											<td><?= $row['m_label_kode']; ?></td>
											<td><?= $row['m_label_nama']; ?></td>
											<td><?= $tombol; ?></td>
										</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm">
				<div class="card shadow">
					<div class="card-body">
						<form action="<?= base_url('Label_bulb/bc_all'); ?>" method="GET" target="_blank">
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
			</div>
		</div>

		<div class="row">
			<div class="col-sm">
				<div class="card shadow">
					<div class="card-header">
						<h5 class="m-0 font-weight-bold float-left">List Data Label</h5>
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
												<img class="img-rounded" src="<?= ($row['t_bc_img'] == 'no-qrcode.png' ? base_url('assets/dist/img/no-qrcode.png') : base_url('assets/label/' . $row['t_bc_img'])); ?>" style="width:100px;">
											</td>
											<td class="text-center">
												<a href="<?= base_url('Label_bulb/mpdf/' . $row['t_bc_id']); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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

<!-- Modal Generate -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Generate Barcode</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="form_generate" method="post" validation>
					<div class="form-group row">
						<label for="m_bc_jml" class="col-sm-4 col-form-label">Jumlah</label>
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="m_label_id" name="m_label_id">
							<input type="hidden" class="form-control" id="m_label_kode" name="m_label_kode">
							<input type="number" class="form-control" id="m_bc_jml" name="m_bc_jml" placeholder="Jumlah Barcode" required>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline-primary" id="tombol_generate">Generate</button>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('template/v_footer'); ?>
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
	$(document).ready(function() {
		$('table.display').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});

	$(document).on("click", ".Barcode", function() {
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Label_bulb/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_label_id').val(data.m_label_id);
					$('#m_label_kode').val(data.m_label_kode);
				} else {
					SweetAlert.fire({
						icon: 'warning',
						title: 'Warning',
						text: data.msg,
						showConfirmButton: false,
						timer: 1500
					});
				}
			}
		});
	});

	$(document).on("click", "#tombol_generate", function() {
		if (validasi3()) {
			var data = $('#form_generate').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Label_bulb/generate') ?>',
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
						window.location.assign('<?php echo site_url("Label_bulb") ?>');
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
				url: '<?= base_url() ?>Label_bulb/getkode_bc',
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
				url: '<?= base_url() ?>Label_bulb/getkode_bc2',
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