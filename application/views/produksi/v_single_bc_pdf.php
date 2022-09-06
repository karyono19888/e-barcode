<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets'); ?>/dist/img/favicon.ico" type="image/x-icon">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">

	<title>Barcode <?= $bc->t_bc_kode; ?></title>
	<style>
		body {
			margin-top: -25px;
			margin-left: -20px;
		}

		div.polaroid {
			width: 15%;
			margin-bottom: 20px;
		}

		div.container {
			margin-top: -40px;
			text-align: center;
			padding: 5px 10px;
		}

		p {
			font-size: 9px;
			margin-top: -25px;
			margin-left: 7px;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<tr>
				<td class="mr-3">
					<div class="polaroid">
						<img src="assets/produksi/<?= $bc->t_bc_img; ?>" style="width:100%"><br>
					</div>
					<p><?= $bc->t_bc_kode; ?></p>
				</td>
				<td>
					<div class="polaroid">
						<img src="assets/produksi/<?= $bc->t_bc_img; ?>" style="width:100%"><br>
					</div>
					<p><?= $bc->t_bc_kode; ?></p>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>