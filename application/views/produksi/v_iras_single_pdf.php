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
			width: 27%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 30pt;
			margin-right: 5pt;
		}

		.group-bc2 {
			text-align: center;
			width: 27%;
			float: left;
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 28pt;
			margin-right: 5pt;
		}

		.group-bc3 {
			text-align: center;
			width: 27%;
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
			font-size: 20px;
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
	</style>
</head>

<body>
	<div class="group-bc">
		<img src="assets/iras/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc2">
		<img src="assets/iras/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc3">
		<img src="assets/iras/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
<<<<<<< HEAD
	<div class="group-bc">
		<img src="assets/iras/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>">
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc2">
		<img src="assets/dist/img/no-qrcode.png" alt="<?= $bc->t_bc_kode; ?>">
	</div>
	<div class="group-bc3">
		<img src="assets/dist/img/no-qrcode.png" alt="<?= $bc->t_bc_kode; ?>">
	</div>
=======
>>>>>>> 513aec22440a72c7fec60890d9dd61d1f8729105
</body>

</html>