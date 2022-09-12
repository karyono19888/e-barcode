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
								<label for="m_org_kode">Kode</label>
								<input type="text" class="form-control" id="m_org_kode" name="m_org_kode" placeholder="Kode">
							</div>
							<div class="form-group">
								<label for="m_org_nama">Nama</label>
								<input type="text" class="form-control" id="m_org_nama" name="m_org_nama" placeholder="Nama Organisasi">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="m_org_alamat">Alamat</label>
								<textarea class="form-control" name="m_org_alamat" id="m_org_alamat" cols="30" rows="3" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label for="m_org_status">Status</label>
								<select class="form-control select2" style="width: 100%;" name="m_org_status" id="m_org_status">
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
		$("#ShowData").load("<?= base_url('Master/Organisasi/ShowTableData'); ?>");
	});

	$(document).on("click", "#TombolSimpan", function() {
		if (validasi()) {
			let data = $('#FormTambah').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('Master/Organisasi/Tambah'); ?>',
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
						window.location.assign('<?= site_url("Master/Organisasi") ?>');
					}, 2000);
				}
			});
		}
	});

	function validasi() {
		let m_org_kode = document.getElementById("m_org_kode").value;
		let m_org_nama = document.getElementById("m_org_nama").value;
		let m_org_alamat = document.getElementById("m_org_alamat").value;
		let m_org_status = document.getElementById("m_org_status").value;
		if ((m_org_kode == "") || (m_org_nama == "") || (m_org_alamat == "") || (m_org_status == "")) {
			if (m_org_status == "") {
				notif("Status");
			}
			if (m_org_alamat == "") {
				notif("Alamat");
			}
			if (m_org_nama == "") {
				notif("Nama");
			}
			if (m_org_kode == "") {
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