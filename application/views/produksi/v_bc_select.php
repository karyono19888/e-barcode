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
			width: 30%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 5pt;
			margin-right: 5pt;
		}
.group-bc2 {
			text-align: center;
			width: 30%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 20pt;
			margin-right: 5pt;
		}
.group-bc3 {
			text-align: center;
			width: 30%;
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
			margin-top: -10pt;
			margin-bottom: 5pt;
			margin-left: 5pt;
			margin-right: -10pt;
		}
	</style>
</head>

<body>
	<?php
	foreach ($bc as $key) {
	?>
		<div class="group-bc">
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc2">
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc3">
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc">
<<<<<<< HEAD
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc2">
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc3">
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
=======
			<small>4</small>
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc">
			<small>5</small>
			<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc">
			<small>6</small>
			<img src="assets/dist/img/no-qrcode.png" alt="<?= $key->t_bc_kode; ?>">
>>>>>>> 513aec22440a72c7fec60890d9dd61d1f8729105
		</div>
	<?php } ?>

</body>

</html>