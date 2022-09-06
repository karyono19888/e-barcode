<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">

	<title><?= $label; ?></title>
	<style>
		body {
			margin-top: -25px;
			margin-left: -20px;
		}


		p {
			font-size: 9px;
			margin-top: -5px;
			margin-left: 7px;
		}


		@page {
			size: 210mm 60mm;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<?php
			foreach ($bc as $key) {
			?>
				<tr>
					<td class="mr-3">
						<div class="polaroid">
							<img src="assets/produksi/<?= $key->t_bc_img; ?>" style="width:15%" alt="<?= $key->t_bc_kode; ?>"><br>
						</div>
						<p><?= $key->t_bc_kode; ?></p>
					</td>
					<td>
						<div class="polaroid">
							<img src="assets/produksi/<?= $key->t_bc_img; ?>" style="width:15%" alt="<?= $key->t_bc_kode; ?>"><br>
						</div>
						<p><?= $key->t_bc_kode; ?></p>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>

</body>

</html>