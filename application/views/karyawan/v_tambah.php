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
								<label for="karyawan_nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="karyawan_nama" name="karyawan_nama" placeholder="Nama Karyawan">
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_nik">Nomor Induk Karyawan</label>
								<input type="text" class="form-control" id="karyawan_nik" name="karyawan_nik" placeholder="6 digit nomor" data-mask>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_jenis_kelamin">Jenis kelamin</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_jenis_kelamin" id="karyawan_jenis_kelamin">
									<option selected="selected" value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_perusahaan">Perusahaan</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_perusahaan" id="karyawan_perusahaan">
									<option value="">- Pilih -</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_departement">Departement</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_departement" id="karyawan_departement">
									<option value="">- Pilih -</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_jabatan">Jabatan</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_jabatan" id="karyawan_jabatan">
									<option value="">- Pilih -</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_line">Line</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_line" id="karyawan_line">
									<option value="">- Pilih -</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="karyawan_status">Status</label>
								<select class="form-control select2" style="width: 100%;" name="karyawan_status" id="karyawan_status">
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
<script src="<?= base_url('assets'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
	$(document).on("click", ".Kembali", function() {
		$("#ShowData").load("<?= base_url('Master/Karyawan/ShowTableData'); ?>");
	});
	$('#karyawan_status').select2({
		theme: 'bootstrap4'
	})
	$('#karyawan_jenis_kelamin').select2({
		theme: 'bootstrap4'
	})
	$('#karyawan_nik').inputmask('9999-9999', {
		'placeholder': '0000-0000'
	})

	$(document).on("click", "#TombolSimpan", function() {
		if (validasi()) {
			let data = $('#FormTambah').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('Master/Karyawan/Tambah'); ?>',
				data: data,
				beforeSend: function() {
					$('#TombolSimpan').prop('disabled', true);
					$('#TombolSimpan').html('<i class="fa fa-spin fa-spinner"></i> loading...')
				},
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
						$("#ShowData").load("<?= base_url('Master/Karyawan/ShowTableData'); ?>");
					}, 2000);
				}
			});
		}
	});

	function validasi() {
		let karyawan_nama = document.getElementById("karyawan_nama").value;
		let karyawan_nik = document.getElementById("karyawan_nik").value;
		let karyawan_jenis_kelamin = document.getElementById("karyawan_jenis_kelamin").value;
		let karyawan_perusahaan = document.getElementById("karyawan_perusahaan").value;
		let karyawan_departement = document.getElementById("karyawan_departement").value;
		let karyawan_jabatan = document.getElementById("karyawan_jabatan").value;
		let karyawan_status = document.getElementById("karyawan_status").value;
		if ((karyawan_nama == "") || (karyawan_nik == "") || (karyawan_jenis_kelamin == "") || (karyawan_perusahaan == "") || (karyawan_departement == "") || (karyawan_jabatan == "") || (karyawan_status == "")) {
			if (karyawan_status == "") {
				notif("Status");
			}
			if (karyawan_jabatan == "") {
				notif("Jabatan");
			}
			if (karyawan_departement == "") {
				notif("Departement");
			}
			if (karyawan_perusahaan == "") {
				notif("Perusahaan");
			}
			if (karyawan_jenis_kelamin == "") {
				notif("Jenis Kelamin");
			}
			if (karyawan_nik == "") {
				notif("Nomor Induk Karyawan");
			}
			if (karyawan_nama == "") {
				notif("Nama Lengkap");
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

	// select2 perusahaan
	$(document).ready(function() {
		$("#karyawan_perusahaan").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url('Master/Karyawan/getNamaPerusahaan'); ?>',
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

	// select2 departement
	$(document).ready(function() {
		$("#karyawan_departement").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url('Master/Karyawan/getNamaDepartement'); ?>',
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

	// select2 jabatan
	$(document).ready(function() {
		$("#karyawan_jabatan").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url('Master/Karyawan/getNamaJabatan'); ?>',
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

	// select2 line
	$(document).ready(function() {
		$("#karyawan_line").select2({
			theme: 'bootstrap4',
			ajax: {
				url: '<?= base_url('Master/Karyawan/getNamaLine'); ?>',
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