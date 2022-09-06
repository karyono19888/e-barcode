<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-qrcode"></i> Myamin</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Produksi</a></li>
						<li class="breadcrumb-item active">Myamin</li>
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
						<div class="title float-right">
							<!-- <button class="btn btn-outline-primary btn-sm Tambah" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i> Tambah</button> -->
						</div>
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
										<th class="text-center">Nama Produk</th>
										<th class="text-center">Url</th>
										<th class="text-center"><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($myamin->result_array() as $row) {
									?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td class="text-center"><?= $row['date_created']; ?></td>
											<td class="text-center"><?= $row['myamin_nama']; ?></td>
											<td class="text-center"><?= $row['myamin_url']; ?></td>
											<td class="text-center">
												<div class="tombol text-center align-items-center">
													<button data-id="<?= $row['myamin_id'] ?>" type="button" class="btn btn-sm btn-outline-secondary Barcode" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-qrcode"></i> Ganerate</button>
												</div>
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
							<input type="hidden" class="form-control" id="myamin_id" name="myamin_id">
							<input type="hidden" class="form-control" id="myamin_url" name="myamin_url">
							<input type="hidden" class="form-control" id="myamin_nama" name="myamin_nama">
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
<script>
	$(document).ready(function() {
		$('table.display').DataTable({
			"paging": true,
			"lengthChange": false,
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
			url: '<?= site_url('Produksi/Myamin/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#myamin_id').val(data.myamin_id);
					$('#myamin_url').val(data.myamin_url);
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
				url: '<?= site_url('Produksi/Myamin/generate') ?>',
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
						window.location.assign('<?php echo site_url("Produksi/Myamin") ?>');
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


	$(document).on("click", ".close", function() {
		var html = '';
		$('#myamin_id').val("");
		$('#myamin_url').val("");
		$('#myamin_nama').val("");
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>