<div class="card">
	<div class="card-header">
		<h5 class="font-weight-bold float-left">Search & Filter</h5>
		<button type="button" class="btn bg-gradient-primary Tambah float-right" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false">
			<i class="fas fa-plus-circle"></i> Tambah
		</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped table-hover table-valign-middle">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Perusahaan</th>
						<th class="text-center">Bagian</th>
						<th class="text-center">NIK</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Status</th>
						<th class="text-center"><i class="fas fa-cogs"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($data->result_array() as $a) :
					?>
						<tr>
							<td class="text-center"><?= $i++; ?></td>
							<td>
								<?= $a['m_jab_nama']; ?>
							</td>
							<td>
								<a href="javascript:void(0)">Nama Departement</a>
								<br>
								<span>
									Nama Jabatan
								</span>
							</td>
							<td><?= $a['m_karyawan_NIP']; ?></td>
							<td><?= $a['m_jab_nama']; ?></td>
							<td class="text-center">
								<?php if ($a['m_karyawan_ket'] == "Aktif") : ?>
									<span class="badge badge-pill badge-primary"><?= $a['m_karyawan_ket']; ?></span>
								<?php else : ?>
									<span class="badge badge-pill badge-primary"><?= $a['m_karyawan_ket']; ?></span>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<button type="button" data-id="<?= $a['m_jab_id']; ?>" class="btn bg-gradient-info Preview">
									Preview
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
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
<script>
	$(document).ready(function() {
		$('#example1').dataTable();
	});
</script>