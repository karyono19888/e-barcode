<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"> Identitas</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Karyawan</a></li>
						<li class="breadcrumb-item active">Identitas</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<!-- identias -->
					<div class="card">
						<div class="card-header">
							<h1 class="card-title"><b> Identitas</b></h1>
							<a href="" class="btn btn-primary btn-sm float-right"><i class="fas fa-folder-plus"></i> Add</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm" width="100%">
								<thead>
									<tr class="text-center">
										<th>Nama Lengkap</th>
										<th>Jenis Kelamin</th>
										<th>Tanggal Lahir</th>
										<th>Alamat</th>
										<th>Mobile Phone</th>
										<th><i class="fas fa-cogs"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											Explorer 4.0
										</td>
										<td>Win 95+</td>
										<td> 4</td>
										<td>X</td>
										<td class="text-center">
											<div class="btn-group">
												<button type="button" class="btn btn-tool" data-toggle="dropdown">
													<i class="fas fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" role="menu">
													<a href="#" class="dropdown-item Edit text-info" data-toggle="modal" data-target="#modal-sm" data-id="" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
													<a href="#" class="dropdown-item text-danger Hapus" data-id=""><i class="fas fa-trash-alt"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- data kluarga -->
					<div class="card">
						<div class="card-header">
							<h1 class="card-title"><b> Data Keluarga</b></h1>
							<a href="" class="btn btn-primary btn-sm float-right"><i class="fas fa-folder-plus"></i> Add</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm" width="100%">
								<thead>
									<tr class="text-center">
										<th>Nama Lengkap</th>
										<th>Jenis Kelamin</th>
										<th>Tanggal Lahir</th>
										<th>Alamat</th>
										<th>Hubungan</th>
										<th><i class="fas fa-cogs"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											Explorer 4.0
										</td>
										<td>Win 95+</td>
										<td> 4</td>
										<td>X</td>
										<td class="text-center">
											<div class="btn-group">
												<button type="button" class="btn btn-tool" data-toggle="dropdown">
													<i class="fas fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" role="menu">
													<a href="#" class="dropdown-item Edit text-info" data-toggle="modal" data-target="#modal-sm" data-id="" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
													<a href="#" class="dropdown-item text-danger Hapus" data-id=""><i class="fas fa-trash-alt"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- riwayat pendidikan -->
					<div class="card">
						<div class="card-header">
							<h1 class="card-title"><b> Riwayat Pendidikan</b></h1>
							<a href="" class="btn btn-primary btn-sm float-right"><i class="fas fa-folder-plus"></i> Add</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm" width="100%">
								<thead>
									<tr class="text-center">
										<th>Tingkat Pendidikan</th>
										<th>Nama Lembaga</th>
										<th>Lokasi</th>
										<th>Jurusan</th>
										<th>Tahun Lulus</th>
										<th><i class="fas fa-cogs"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											Explorer 4.0
										</td>
										<td>Win 95+</td>
										<td> 4</td>
										<td>X</td>
										<td class="text-center">
											<div class="btn-group">
												<button type="button" class="btn btn-tool" data-toggle="dropdown">
													<i class="fas fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" role="menu">
													<a href="#" class="dropdown-item Edit text-info" data-toggle="modal" data-target="#modal-sm" data-id="" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
													<a href="#" class="dropdown-item text-danger Hapus" data-id=""><i class="fas fa-trash-alt"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Pendidikan Informal -->
					<div class="card">
						<div class="card-header">
							<h1 class="card-title"><b>Pendidikan Pelatiah/Kursus</b></h1>
							<a href="" class="btn btn-primary btn-sm float-right"><i class="fas fa-folder-plus"></i> Add</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm" width="100%">
								<thead>
									<tr class="text-center">
										<th>Jenis Pelatihan</th>
										<th>Penyelenggara</th>
										<th>Lokasi</th>
										<th>Tanggal</th>
										<th>Sertifikat</th>
										<th><i class="fas fa-cogs"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											Explorer 4.0
										</td>
										<td>Win 95+</td>
										<td> 4</td>
										<td>X</td>
										<td class="text-center">
											<div class="btn-group">
												<button type="button" class="btn btn-tool" data-toggle="dropdown">
													<i class="fas fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" role="menu">
													<a href="#" class="dropdown-item Edit text-info" data-toggle="modal" data-target="#modal-sm" data-id="" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
													<a href="#" class="dropdown-item text-danger Hapus" data-id=""><i class="fas fa-trash-alt"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- RIwayat Pekerjaan -->
					<div class="card">
						<div class="card-header">
							<h1 class="card-title"><b> Riwayat Pekerjaan</b></h1>
							<a href="" class="btn btn-primary btn-sm float-right"><i class="fas fa-folder-plus"></i> Add</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm" width="100%">
								<thead>
									<tr class="text-center">
										<th>Tingkat Pendidikan</th>
										<th>Nama Lembaga</th>
										<th>Lokasi</th>
										<th>Jurusan</th>
										<th>Tahun Lulus</th>
										<th><i class="fas fa-cogs"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											Explorer 4.0
										</td>
										<td>Win 95+</td>
										<td> 4</td>
										<td>X</td>
										<td class="text-center">
											<div class="btn-group">
												<button type="button" class="btn btn-tool" data-toggle="dropdown">
													<i class="fas fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" role="menu">
													<a href="#" class="dropdown-item Edit text-info" data-toggle="modal" data-target="#modal-sm" data-id="" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit</a>
													<a href="#" class="dropdown-item text-danger Hapus" data-id=""><i class="fas fa-trash-alt"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- <script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script> -->