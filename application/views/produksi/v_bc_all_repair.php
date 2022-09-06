<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barcode</title>
	<style>
		.group-bc {
			text-align: center;
			width: 28%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 30pt;
			margin-right: 5pt;
		}

		.group-bc2 {
			text-align: center;
			width: 28%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 30pt;
			margin-right: 5pt;
		}

		.group-bc3 {
			text-align: center;
			width: 28%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 25pt;
			margin-right: 5pt;
		}

		img {
			width: 100%;
		}

		p {
			margin-top: -10px;
			font-size: 16px;
			font-weight: bold;
		}

		table {
			justify-content: center;
		}

		@page {
			margin-top: 0pt;
			margin-bottom: 5pt;
			margin-left: 5pt;
			margin-right: -10pt;
		}

		small {
			font-size: 12px;
		}
	</style>
</head>

<body>
	<?php
	foreach ($bc as $key) {
	?>
		<div class="group-bc">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc2">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc3">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc2">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc3">
			<img src="assets/repair/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
	<?php } ?>

</body>

</html>