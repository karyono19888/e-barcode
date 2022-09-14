<div class="row">
	<div class="col-sm-9">
		<div class="card">
			<div class="card-header">
				<h5 class="font-weight-bold text-info">Preview Data</h5>
			</div>
			<div class="card-body">
				<dl class="row">
					<dt class="col-sm-3">NIP</dt>
					<dd class="col-sm-8">: <?= $data['karyawan_nik']; ?></dd>
					<dt class="col-sm-3">Nama</dt>
					<dd class="col-sm-8">: <?= $data['karyawan_nama']; ?></dd>
					<dt class="col-sm-3">Jenis Kelamin</dt>
					<dd class="col-sm-8">: <?= $data['karyawan_jenis_kelamin']; ?></dd>
					<dt class="col-sm-3">Perusahaan</dt>
					<dd class="col-sm-8">: <?= $data['m_org_nama']; ?></dd>
					<dt class="col-sm-3">Departement</dt>
					<dd class="col-sm-8">: <?= $data['m_dep_nama']; ?></dd>
					<dt class="col-sm-3">Jabatan</dt>
					<dd class="col-sm-8">: <?= $data['m_jab_nama']; ?></dd>
					<dt class="col-sm-3">Line</dt>
					<dd class="col-sm-8">: <?= $data['m_line_nama']; ?></dd>
					<dt class="col-sm-3">Status</dt>
					<dd class="col-sm-8">
						<?php if ($data['karyawan_status'] == "Aktif") : ?>
							<span class="badge badge-pill badge-primary"><?= $data['karyawan_status']; ?></span>
						<?php else : ?>
							<span class="badge badge-pill badge-primary"><?= $data['karyawan_status']; ?></span>
						<?php endif; ?>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-block bg-gradient-warning Edit" data-id="<?= $data['karyawan_id']; ?>">Edit</button>
				<button type="button" data-id="<?= $data['karyawan_id']; ?>" class="btn btn-block bg-gradient-danger" id="TombolDelete">Delete</button>
				<button type="button" class="btn btn-block btn-outline-secondary Kembali">Kembali</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on("click", ".Kembali", function() {
		$("#ShowData").load("<?= base_url('Master/Karyawan/ShowTableData'); ?>");
	});


	$(document).on("click", "#TombolDelete", function() {
		let id = $(this).data('id');
		Swal.fire({
			title: 'Are you sure?',
			text: "Hapus Permanent Data!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Master/Karyawan/Delete') ?>',
					beforeSend: function() {
						$('#TombolSimpan').prop('disabled', true);
						$('#TombolSimpan').html('<i class="fa fa-spin fa-spinner"></i> loading...')
					},
					data: {
						id: id
					},
					success: function(response) {
						let data = JSON.parse(response);
						if (data.success) {
							SweetAlert.fire({
								icon: 'success',
								title: 'Deleted!',
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
							window.location.assign('<?= site_url("Master/Karyawan") ?>');
						}, 1500);
					}
				});
			}
		})
	});

	$(document).on("click", ".Edit", function() {
		let id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?= site_url('Master/Karyawan/ShowEditData') ?>",
			beforeSend: function() {
				$('.Edit').prop('disabled', true);
				$('.Edit').html('<i class="fa fa-spin fa-spinner"></i> loading...')
			},
			data: {
				id: id
			},
			success: function(response) {
				$("#ShowData").html(response);
			}
		});
	});
</script>