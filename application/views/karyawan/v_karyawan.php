<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-users"></i> Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Master</a></li>
						<li class="breadcrumb-item active">Karyawan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h5 class="m-0 font-weight-bold text-primary float-left">List Data</h5>
				<button type="button" class="btn btn-outline-primary btn-sm Tambah float-right" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false">
					<i class="fas fa-plus-circle"></i> Add
				</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped table-hover table-sm">
						<!-- <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0"> -->
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Departemen</th>
								<th class="text-center">Jabatan</th>
								<th class="text-center">NIP</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Jenis Kelamin</th>
								<th class="text-center">Status</th>
								<th class="text-center"><i class="fas fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data->result_array() as $row) {
								if ($this->session->userdata('level') == 1) {
									$st = '<div class="btn-group">
								<button type="button" class="btn btn-tool" data-toggle="dropdown">
									<i class="fas fa-ellipsis-v"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" role="menu">
									<a href="#" class="dropdown-item Edit" data-toggle="modal" data-target="#modal-sm" data-id="' . $row['m_karyawan_id'] . '" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
									<a href="#" class="dropdown-item Hapus" data-id="' . $row['m_karyawan_id'] . '"><i class="fas fa-trash-alt"></i> Delete</a>
								</div>
								</div>';
								} else {
									$st = '<div class="btn-group ">
								<label type="text" class=" btn-tool">
									<i class="fas fa-ellipsis-v"></i>
								</label>
								</div>';
								}
							?>
								<tr>
									<td class="text-center" width="50"><?= $no++ ?></td>
									<td><?= $row['m_dep_nama'] ?></td>
									<td><?= $row['m_jab_nama'] ?></td>
									<td><?= $row['m_karyawan_NIP'] ?></td>
									<td><?= $row['m_karyawan_nama'] ?></td>
									<td><?= $row['m_karyawan_jk'] ?></td>
									<td><?= $row['m_karyawan_status'] ?></td>
									<td width="50" class="text-center"><?= $st ?></td>
								</tr>
							<?php }; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<small class="footer">
					Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'HRMS Version <strong>' . CI_VERSION . '</strong>' : '' ?></small>
			</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- start modal -->
<div class="modal fade" id="modal-sm">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="form-horizontal" id="form" method="post" validation enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="judul1">Tambah Data</h4>
					<h4 class="modal-title" id="judul2">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="alert"></div>
					<div class="form-group row">
						<label for="m_karyawan_prh" class="col-sm-3 col-form-label">Perusahaan</label>
						<div class="col-sm-9">
							<select class="form-control" style="width: 100%;" id="m_karyawan_prh" name="m_karyawan_prh" required>
								<option value="">- Pilih Perusahaan -</option>
								<option value="PT Adyawinsa Electrical and Power">PT Adyawinsa Electrical and Power</option>
								<option value="PT Fokus Indo Lighting">PT Fokus Indo Lighting</option>
								<option value="PT Surya Indo Baru">PT Surya Indo Baru</option>
								<option value="PT Cahaya Citra Kinetika">PT Cahaya Citra Kinetika</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_NIP" class="col-sm-3 col-form-label">NIP & NIK </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="m_karyawan_NIP" name="m_karyawan_NIP" placeholder="9 Digit" required>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control form-password" id="m_karyawan_NIK" name="m_karyawan_NIK" placeholder="NIK">
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="hidden" class="form-control" id="m_karyawan_id" name="m_karyawan_id">
							<input type="text" class="form-control" id="m_karyawan_nama" name="m_karyawan_nama" placeholder="Nama lengkap" required>
						</div>
					</div>
					<fieldset class="form-group row">
						<label class="col-form-label col-sm-3 float-sm-left pt-0">Jenis Kelamin</label>
						<div class="col-sm-4">
							<select class="form-control" style="width: 100%;" id="m_karyawan_jk" name="m_karyawan_jk" required>
								<option value="">- Pilih Jenis Kelamin -</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</fieldset>
					<div class="form-group row">
						<label for="m_karyawan_tp_lahir" class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="m_karyawan_tp_lahir" name="m_karyawan_tp_lahir" placeholder="Tempat Lahir" required>
						</div>
						<div class="col-sm-4">
							<input type="date" class="form-control" id="m_karyawan_tgl_lahir" name="m_karyawan_tgl_lahir" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_phone" class="col-sm-3 col-form-label">Nomer Handphone</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="m_karyawan_phone" name="m_karyawan_phone" placeholder="12 digit" required>
						</div>

					</div>
					<div class="form-group row">
						<label for="m_karyawan_nikah" class="col-sm-3 col-form-label">Agama</label>
						<div class="col-sm-5">
							<select class="form-control" style="width: 100%;" id="m_karyawan_agama" name="m_karyawan_agama" required>
								<option value="">- Pilih Agama -</option>
								<option value="Islam">Islam</option>
								<option value="Katolik">Katolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
							</select>
						</div>
						<div class="col-sm-4">
							<select class="form-control" style="width: 100%;" id="m_karyawan_nikah" name="m_karyawan_nikah" required>
								<option value="">- Pilih Status Nikah -</option>
								<option value="Nikah">Nikah</option>
								<option value="Belum Nikah">Belum Nikah</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_almat" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<textarea class="form-control" id="m_karyawan_almat" name="m_karyawan_almat" rows="2"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_nm_kel_dkt" class="col-sm-3 col-form-label">Keluarga Dekat</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="m_karyawan_nm_kel_dkt" name="m_karyawan_nm_kel_dkt" placeholder="Nama Keluarga" required>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="m_karyawan_nm_kel_hp" name="m_karyawan_nm_kel_hp" placeholder="Handphone" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_dep_id" class="col-sm-3 col-form-label">Departemen</label>
						<div class="col-sm-4">
							<select class="form-control" style="width: 100%;" id="m_karyawan_dep_id" name="m_karyawan_dep_id" required>
								<option value="">- Pilih Departemen -</option>
								<?php foreach ($dep->result_array() as $data) { ?>
									<option value="<?= $data['m_dep_id'] ?>"><?= $data['m_dep_nama'] ?></option>
								<?php }; ?>
							</select>
						</div>
						<div class="col-sm-5">
							<select class="form-control" style="width: 100%;" id="m_karyawan_jab_id" name="m_karyawan_jab_id" required>
								<option value="">- Pilih Jabatan -</option>
								<?php foreach ($jab->result_array() as $data) { ?>
									<option value="<?= $data['m_jab_id'] ?>"><?= $data['m_jab_nama'] ?></option>
								<?php }; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_nm_bank" class="col-sm-3 col-form-label">Bank Payroll</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="m_karyawan_nm_bank" name="m_karyawan_nm_bank" placeholder="Nama Bank" required>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="m_karyawan_no_rek" name="m_karyawan_no_rek" placeholder="Nomer Rekening" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_join_date" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
						<div class="col-sm-4">
							<input type="Date" class="form-control" id="m_karyawan_join_date" name="m_karyawan_join_date" required>
						</div>
						<div class="col-sm-5">
							<select class="form-control" style="width: 100%;" id="m_karyawan_status" name="m_karyawan_status" required>
								<option value="">- Pilih Status -</option>
								<option value="Karyawan Tetap">Karyawan Tetap</option>
								<option value="Karyawan Kontrak">Karyawan Kontrak</option>
								<option value="Magang">Magang</option>
								<option value="PKL">PKL</option>
								<option value="Harian">Harian</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_ket" class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-4">
							<select class="form-control" style="width: 100%;" id="m_karyawan_ket" name="m_karyawan_ket" data-placeholder="m_karyawan_ket" required>
								<option value="Aktif">Aktif</option>
								<option value="Resign">Resign</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="m_karyawan_foto" class="col-sm-3 col-form-label">Unggah Foto</label>
						<div class="col-sm-2">
							<img src="<?= base_url('assets/dist/img/avatar5.png'); ?>" class="img-thumbnail image-preview" alt="">
						</div>
						<div class="col-sm-7">
							<div class="custom-file">
								<input onchange="previewImg()" type="file" class="custom-file-input" id="m_karyawan_foto" name="m_karyawan_foto">
								<label class="custom-file-label" for="m_karyawan_foto">Pilih Gambar</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-primary" id="tombol_tambah">Save</button>
					<button type="button" class="btn btn-outline-primary" id="tombol_update">Update</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php $this->load->view('template/v_footer'); ?>
<script>
	function previewImg() {
		const m_karyawan_foto = document.querySelector('#m_karyawan_foto');
		const gambarLabel = document.querySelector('.custom-file-label');
		const imgLihat = document.querySelector('.image-preview');

		gambarLabel.textContent = m_karyawan_foto.files[0].name;
		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(m_karyawan_foto.files[0]);

		fileSampul.onload = function(e) {
			imgLihat.src = e.target.result;
		}
	}

	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

	});
	$(document).on("click", ".Tambah", function() {
		$('#judul2').hide();
		$('#tombol_update').hide();
		$('#judul1').show();
		$('#tombol_tambah').show();
	});
	$(document).on("click", ".Edit", function() {
		$('#judul1').hide();
		$('#tombol_tambah').hide();
		$('#judul2').show();
		$('#tombol_update').show();
		var prh = '';
		var myid = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: '<?= site_url('Master/Karyawan/view') ?>',
			data: {
				myid: myid
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.success) {
					$('#m_karyawan_id').val(data.m_karyawan_id);
					$('#m_karyawan_prh').val(data.m_karyawan_prh);
					$('#m_karyawan_NIP').val(data.m_karyawan_NIP);
					$('#m_karyawan_NIK').val(data.m_karyawan_NIK);
					$('#m_karyawan_nama').val(data.m_karyawan_nama);
					$('#m_karyawan_jk').val(data.m_karyawan_jk);
					$('#m_karyawan_tp_lahir').val(data.m_karyawan_tp_lahir);
					$('#m_karyawan_tgl_lahir').val(data.m_karyawan_tgl_lahir);
					$('#m_karyawan_phone').val(data.m_karyawan_phone);
					$('#m_karyawan_agama').val(data.m_karyawan_agama);
					$('#m_karyawan_nikah').val(data.m_karyawan_nikah);
					$('#m_karyawan_almat').val(data.m_karyawan_almat);
					$('#m_karyawan_nm_kel_dkt').val(data.m_karyawan_nm_kel_dkt);
					$('#m_karyawan_nm_kel_hp').val(data.m_karyawan_nm_kel_hp);
					$('#m_karyawan_dep_id').val(data.m_karyawan_dep_id);
					$('#m_karyawan_jab_id').val(data.m_karyawan_jab_id);
					$('#m_karyawan_nm_bank').val(data.m_karyawan_nm_bank);
					$('#m_karyawan_no_rek').val(data.m_karyawan_no_rek);
					$('#m_karyawan_join_date').val(data.m_karyawan_join_date);
					$('#m_karyawan_status').val(data.m_karyawan_status);
					$('#m_karyawan_foto').val(data.m_karyawan_foto);
					$('#m_karyawan_ket').val(data.m_karyawan_ket);
				} else {
					SweetAlert.fire({
						icon: 'warning',
						title: 'Warning',
						text: data.msg,
					});
				}
			}
		});
	});
	$(document).on("click", ".close", function() {
		var html = '';
		$('#m_karyawan_id').val("");
		$('#m_karyawan_prh').val("");
		$('#m_karyawan_NIP').val("");
		$('#m_karyawan_NIK').val("");
		$('#m_karyawan_nama').val("");
		$('#m_karyawan_jk').val("");
		$('#m_karyawan_tp_lahir').val("");
		$('#m_karyawan_tgl_lahir').val("");
		$('#m_karyawan_phone').val("");
		$('#m_karyawan_agama').val("");
		$('#m_karyawan_nikah').val("");
		$('#m_karyawan_almat').val("");
		$('#m_karyawan_nm_kel_dkt').val("");
		$('#m_karyawan_nm_kel_hp').val("");
		$('#m_karyawan_dep_id').val("");
		$('#m_karyawan_jab_id').val("");
		$('#m_karyawan_nm_bank').val("");
		$('#m_karyawan_no_rek').val("");
		$('#m_karyawan_join_date').val("");
		$('#m_karyawan_status').val("");
		$('#m_karyawan_ket').val("");
		$('#alert').html('');
	});

	$(document).on("click", "#tombol_tambah", function() {
		if (validasi()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Karyawan/create') ?>',
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
						window.location.assign('<?php echo site_url("Master/Karyawan") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi() {
		var html = '';
		document.getElementById('m_karyawan_NIP').setAttribute('required', 'required')
		var m_karyawan_prh = document.getElementById("m_karyawan_prh").value;
		var m_karyawan_NIK = document.getElementById("m_karyawan_NIK").value;
		var m_karyawan_nama = document.getElementById("m_karyawan_nama").value;
		var m_karyawan_jk = document.getElementById("m_karyawan_jk").value;
		var m_karyawan_tp_lahir = document.getElementById("m_karyawan_tp_lahir").value;
		var m_karyawan_tgl_lahir = document.getElementById("m_karyawan_tgl_lahir").value;
		var m_karyawan_phone = document.getElementById("m_karyawan_phone").value;
		var m_karyawan_agama = document.getElementById("m_karyawan_agama").value;
		var m_karyawan_nikah = document.getElementById("m_karyawan_nikah").value;
		var m_karyawan_almat = document.getElementById("m_karyawan_almat").value;
		var m_karyawan_nm_kel_dkt = document.getElementById("m_karyawan_nm_kel_dkt").value;
		var m_karyawan_nm_kel_hp = document.getElementById("m_karyawan_nm_kel_hp").value;
		var m_karyawan_dep_id = document.getElementById("m_karyawan_dep_id").value;
		var m_karyawan_jab_id = document.getElementById("m_karyawan_jab_id").value;
		var m_karyawan_nm_bank = document.getElementById("m_karyawan_nm_bank").value;
		var m_karyawan_no_rek = document.getElementById("m_karyawan_no_rek").value;
		var m_karyawan_join_date = document.getElementById("m_karyawan_join_date").value;
		var m_karyawan_status = document.getElementById("m_karyawan_status").value;
		var m_karyawan_ket = document.getElementById("m_karyawan_ket").value;
		if (m_karyawan_nama != "" && m_karyawan_prh != "" && m_karyawan_NIK != "" && m_karyawan_jk != "" && m_karyawan_status != "" && m_karyawan_tp_lahir != "" && m_karyawan_tgl_lahir != "" && m_karyawan_phone != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}

	$(document).on("click", "#tombol_update", function() {
		if (validasi2()) {
			var data = $('#form').serialize();
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Karyawan/update') ?>',
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
						window.location.assign('<?php echo site_url("Master/Karyawan") ?>');
					}, 1500);
				}
			});
		}
	});

	function validasi2() {
		var html = '';
		document.getElementById('m_karyawan_NIP').setAttribute('required', 'required')
		var m_karyawa_nama = document.getElementById("m_karyawa_nama").value;
		var m_karyawan_status = document.getElementById("m_karyawan_status").value;
		if (m_karyawa_nama != "" && m_karyawan_status != "") {
			return true;
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Ada kolom yang belum terisi!',
			})
		}
	}
	$(document).on("click", ".Hapus", function() {
		var m_karyawan_id = $(this).data('id');
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
					url: '<?= site_url('Master/Karyawan/delete') ?>',
					data: {
						m_karyawan_id: m_karyawan_id
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
							window.location.assign('<?php echo site_url("Master/Karyawan") ?>');
						}, 2000);
					}
				});
			}
		})
	});
</script>
<?php $this->load->view('template/v_bottom'); ?>