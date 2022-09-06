<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barcode Tiang</title>
	<style>
		body {
			font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}

		.group-bc {
			text-align: center;
			width: 45%;
			float: left;
			margin-top: 0pt;
			margin-bottom: 0pt;
			margin-left: 15pt;
			margin-right: 5pt;
		}

		.group-bc2 {
			text-align: center;
			width: 45%;
			float: left;
			margin-top: 0pt;
			margin-bottom: 0pt;
			margin-left: 15pt;
			margin-right: 5pt;
		}

		img {
			width: 100%;
		}

		p {
			margin-top: -20px;
			font-size: 45px;
			font-weight: bold;
		}

		@page {
			margin-top: 2pt;
			margin-right: 2pt;
			margin-left: 2pt;
			margin-bottom: 2pt;
		}
	</style>
</head>

<body>
	<?php foreach ($bc->result_array() as $key) : ?>
		<div class="group-bc">
			<img src="assets/tiang/<?= $key['t_bc_img'];; ?>" alt="<?= $key['t_bc_kode']; ?>">
			<p><?= $key['t_bc_kode']; ?></p>
		</div>
		<div class="group-bc2">
			<img src="assets/tiang/<?= $key['t_bc_img'];; ?>" alt="<?= $key['t_bc_kode']; ?>">
			<p><?= $key['t_bc_kode']; ?></p>
		</div>
	<?php endforeach; ?>

</body>

</html>