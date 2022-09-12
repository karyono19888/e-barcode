<div class="row">
	<div class="col-sm-9">
		<div class="card">
			<div class="card-header">
				<h5 class="font-weight-bold">Tambah Data</h5>
			</div>
			<div class="card-body">
				<form action="" method="get" id="FormTambah">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_jab_kode">Kode</label>
								<input type="text" class="form-control" id="m_jab_kode" name="m_jab_kode" placeholder="Kode">
							</div>
							<div class="form-group">
								<label for="m_jab_nama">Nama</label>
								<input type="text" class="form-control" id="m_jab_nama" name="m_jab_nama" placeholder="Nama Depertement">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_jab_status">Status</label>
								<select class="form-control select2" style="width: 100%;" name="m_jab_status" id="m_jab_status">
									<option selected="selected" value="Aktif">Aktif</option>
									<option value="Tidak Aktif">Tidak Aktif</option>
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
				<button type="button" class="btn btn-block bg-gradient-primary" id="TombolSimpan">Simpan</button>
				<button type="button" class="btn btn-block btn-outline-secondary Kembali">Kembali</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on("click", ".Kembali", function() {
		$("#ShowData").load("<?= base_url('Master/Jabatan/ShowTableData'); ?>");
	});

	$(document).on("click", "#TombolSimpan", function() {
		if (validasi()) {
			let data = $('#FormTambah').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('Master/Jabatan/Tambah'); ?>',
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
						window.location.assign('<?= site_url("Master/Jabatan") ?>');
					}, 2000);
				}
			});
		}
	});

	function validasi() {
		let m_jab_kode = document.getElementById("m_jab_kode").value;
		let m_jab_nama = document.getElementById("m_jab_nama").value;
		let m_jab_status = document.getElementById("m_jab_status").value;
		if ((m_jab_kode == "") || (m_jab_nama == "") || (m_jab_status == "")) {
			if (m_jab_status == "") {
				notif("Status");
			}
			if (m_jab_nama == "") {
				notif("Nama");
			}
			if (m_jab_kode == "") {
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