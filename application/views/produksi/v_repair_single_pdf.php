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
			width: 26%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 35pt;
			margin-right: 5pt;
		}

		.group-bc2 {
			text-align: center;
			width: 26%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 30pt;
			margin-right: 5pt;
		}

		.group-bc3 {
			text-align: center;
			width: 26%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 30pt;
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
			margin-right: -15pt;
		}
	</style>
</head>

<body>
	<div class="group-bc">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc2">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc3">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc2">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc3">
		<img src="assets/repair/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
</body>

</html>