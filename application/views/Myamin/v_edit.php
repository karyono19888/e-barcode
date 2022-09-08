<div class="row">
	<div class="col-sm-9">
		<div class="card card-warning">
			<div class="card-header">
				<h5 class="font-weight-bold">Edit Data</h5>
			</div>
			<div class="card-body">
				<form action="" method="get" id="FormTambah">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_myamin_tipe">Tipe</label>
								<input type="text" class="form-control" id="m_myamin_tipe" name="m_myamin_tipe" value="<?= $data['m_myamin_tipe']; ?>" autofocus>
								<input type="hidden" class="form-control" id="m_myamin_id" name="m_myamin_id" value="<?= $data['m_myamin_id']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_kode">Kode</label>
								<input type="text" class="form-control" id="m_myamin_kode" name="m_myamin_kode" value="<?= $data['m_myamin_kode']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_jenis">Jenis</label>
								<input type="text" class="form-control" id="m_myamin_jenis" name="m_myamin_jenis" value="<?= $data['m_myamin_jenis']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_tegangan">Tegangan Listrik</label>
								<input type="text" class="form-control" id="m_myamin_tegangan" name="m_myamin_tegangan" value="<?= $data['m_myamin_tegangan']; ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_myamin_daya">Daya</label>
								<input type="text" class="form-control" id="m_myamin_daya" name="m_myamin_daya" value="<?= $data['m_myamin_daya']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_frekuensi">Frekuensi</label>
								<input type="text" class="form-control" id="m_myamin_frekuensi" name="m_myamin_frekuensi" value="<?= $data['m_myamin_frekuensi']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_dimensi">Dimensi</label>
								<input type="text" class="form-control" id="m_myamin_dimensi" name="m_myamin_dimensi" value="<?= $data['m_myamin_dimensi']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_berat">Berat</label>
								<input type="text" class="form-control" id="m_myamin_berat" name="m_myamin_berat" value="<?= $data['m_myamin_berat']; ?>">
							</div>
							<div class="form-group">
								<label for="m_myamin_status">Status</label>
								<select class="form-control select2" style="width: 100%;" name="m_myamin_status" id="m_myamin_status">
									<option selected="selected" value="<?= $data['m_myamin_status']; ?>"><?= $data['m_myamin_status']; ?></option>
									<?php if ($data['m_myamin_status'] == "Aktif") : ?>
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
		$("#ShowData").load("<?= base_url('Master/Myamin/ShowTableData'); ?>");
	});

	$(document).on("click", "#TombolSimpan", function() {
		if (validasi()) {
			let data = $('#FormTambah').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('Master/Myamin/SimpanEdit'); ?>',
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
						window.location.assign('<?= site_url("Master/Myamin") ?>');
					}, 2000);
				}
			});
		}
	});

	function validasi() {
		let m_myamin_tipe = document.getElementById("m_myamin_tipe").value;
		let m_myamin_kode = document.getElementById("m_myamin_kode").value;
		let m_myamin_jenis = document.getElementById("m_myamin_jenis").value;
		let m_myamin_tegangan = document.getElementById("m_myamin_tegangan").value;
		let m_myamin_daya = document.getElementById("m_myamin_daya").value;
		let m_myamin_frekuensi = document.getElementById("m_myamin_frekuensi").value;
		let m_myamin_dimensi = document.getElementById("m_myamin_dimensi").value;
		let m_myamin_berat = document.getElementById("m_myamin_berat").value;
		if ((m_myamin_tipe == "") || (m_myamin_kode == "") || (m_myamin_jenis == "") || (m_myamin_tegangan == "") || (m_myamin_daya == "") || (m_myamin_frekuensi == "") || (m_myamin_dimensi == "") || (m_myamin_berat == "")) {
			if (m_myamin_berat == "") {
				notif("Berat");
			}
			if (m_myamin_dimensi == "") {
				notif("Dimensi");
			}
			if (m_myamin_frekuensi == "") {
				notif("Frekuensi");
			}
			if (m_myamin_daya == "") {
				notif("Daya");
			}
			if (m_myamin_tegangan == "") {
				notif("Tegangan Listrik");
			}
			if (m_myamin_jenis == "") {
				notif("Jenis");
			}
			if (m_myamin_kode == "") {
				notif("Kode");
			}
			if (m_myamin_tipe == "") {
				notif("Tipe");
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