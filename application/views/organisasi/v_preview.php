<div class="row">
	<div class="col-sm-9">
		<div class="card">
			<div class="card-header">
				<h5 class="font-weight-bold text-info">Preview Data</h5>
			</div>
			<div class="card-body">
				<dl class="row">
					<dt class="col-sm-3">Kode</dt>
					<dd class="col-sm-8"><?= $data['m_org_kode']; ?></dd>
					<dt class="col-sm-3">Nama</dt>
					<dd class="col-sm-8"><?= $data['m_org_nama']; ?></dd>
					<dt class="col-sm-3">Alamat</dt>
					<dd class="col-sm-8"><?= $data['m_org_alamat']; ?></dd>
					<dt class="col-sm-3">Status</dt>
					<dd class="col-sm-8">
						<?php if ($data['m_org_status'] == "Aktif") : ?>
							<span class="badge badge-pill badge-primary"><?= $data['m_org_status']; ?></span>
						<?php else : ?>
							<span class="badge badge-pill badge-primary"><?= $data['m_org_status']; ?></span>
						<?php endif; ?>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-block bg-gradient-warning Edit" data-id="<?= $data['m_org_id']; ?>">Edit</button>
				<button type="button" data-id="<?= $data['m_org_id']; ?>" class="btn btn-block bg-gradient-danger" id="TombolDelete">Delete</button>
				<button type="button" class="btn btn-block btn-outline-secondary Kembali">Kembali</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on("click", ".Kembali", function() {
		$("#ShowData").load("<?= base_url('Master/Organisasi/ShowTableData'); ?>");
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
					url: '<?= site_url('Master/Organisasi/Delete') ?>',
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
							window.location.assign('<?= site_url("Master/Organisasi") ?>');
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
			url: "<?= site_url('Master/Organisasi/ShowEditData') ?>",
			data: {
				id: id
			},
			success: function(response) {
				$("#ShowData").html(response);
			}
		});
	});
</script>