<div class="row">
	<div class="col-sm-9">
		<div class="card">
			<div class="card-header">
				<h5 class="font-weight-bold">Edit Data</h5>
			</div>
			<div class="card-body">
				<form action="" method="get" id="FormTambah">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_dep_kode">Kode</label>
								<input type="text" class="form-control" id="m_dep_kode" name="m_dep_kode" value="<?= $data['m_dep_kode']; ?>">
								<input type="hidden" class="form-control" id="m_dep_id" name="m_dep_id" value="<?= $data['m_dep_id']; ?>">
							</div>
							<div class="form-group">
								<label for="m_dep_nama">Nama</label>
								<input type="text" class="form-control" id="m_dep_nama" name="m_dep_nama" value="<?= $data['m_dep_nama']; ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_dep_status">Status</label>
								<select class="form-control select2" style="width: 100%;" name="m_dep_status" id="m_dep_status">
									<option selected="selected" value="<?= $data['m_dep_status']; ?>"><?= $data['m_dep_status']; ?></option>
									<?php if ($data['m_dep_status'] == "Aktif") : ?>
										<option value="Tidak Aktif">Tidak Aktif</option>
									<?php else : ?>
										<option value="Aktif">Aktif</option>
									<?php endif; ?>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-block bg-gradient-warning" id="TombolSimpan">Simpan</button>
				<button type="button" class="btn btn-block btn-outline-secondary Kembali">Kembali</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on("click", ".Kembali", function() {
		$("#ShowData").load("<?= base_url('Master/Departement/ShowTableData'); ?>");
	});

	$(document).on("click", "#TombolSimpan", function() {
		if (validasi()) {
			let data = $('#FormTambah').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('Master/Departement/SimpanEdit'); ?>',
				data: data,
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: data.msg,
							showConfirmButton: true,
							timer: 2000
						});
					}
					setTimeout(() => {
						window.location.assign('<?= site_url("Master/Departement") ?>');
					}, 2000);
				}
			});
		}
	});

	function validasi() {
		let m_dep_kode = document.getElementById("m_dep_kode").value;
		let m_dep_nama = document.getElementById("m_dep_nama").value;
		let m_dep_status = document.getElementById("m_dep_status").value;
		if ((m_dep_kode == "") || (m_dep_nama == "") || (m_dep_status == "")) {
			if (m_dep_status == "") {
				notif("Status");
			}
			if (m_dep_nama == "") {
				notif("Nama");
			}
			if (m_dep_kode == "") {
				notif("Kode");
			}
		} else {
			return true;
		}
	}

	function notif(word) {
		Swal.fire({
			title: 'Perhatian',
			text: word + ' wajib di isi !',
			icon: 'info',
		}).then((result) => {})
	}
</script>