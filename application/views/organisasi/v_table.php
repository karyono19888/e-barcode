<div class="card">
	<div class="card-header">
		<h5 class="font-weight-bold float-left">Search & Filter</h5>
		<button type="button" class="btn bg-gradient-primary Tambah float-right" data-toggle="modal" data-target="#modal-sm" data-backdrop="static" data-keyboard="false">
			<i class="fas fa-plus-circle"></i> Tambah
		</button>
	</div>
	<div class="card-body">
		<div class="table-responsive" style="vertical-align: middle;">
			<table id="example1" class="table table-bordered table-striped table-hover table-valign-middle">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Alamat</th>
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
							<td><?= $a['m_org_kode']; ?></td>
							<td><?= $a['m_org_nama']; ?></td>
							<td><?= $a['m_org_alamat']; ?></td>
							<td class="text-center">
								<?php if ($a['m_org_status'] == "Aktif") : ?>
									<span class="badge badge-pill badge-primary"><?= $a['m_org_status']; ?></span>
								<?php else : ?>
									<span class="badge badge-pill badge-primary"><?= $a['m_org_status']; ?></span>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<button type="button" data-id="<?= $a['m_org_id']; ?>" class="btn bg-gradient-info Preview">
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