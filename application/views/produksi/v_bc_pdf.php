<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barcode <?= $bc->t_bc_kode; ?></title>

	<style type="text/css">
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		@page {
			margin-top: 15pt;
			margin-bottom: 5pt;
			margin-left: 20pt;
			margin-right: 5pt;
		}

		#front {
			width: 28%;
			height: 320px;
			text-align: center;
			margin-left: 20px;
			float: left;
			border-radius: 5px;
		}

		#middle {
			width: 28%;
			height: 320px;
			float: left;
			margin-left: 45px;
			text-align: center;
			border-radius: 5px;
		}

		#back {
			width: 28%;
			height: 320px;
			text-align: center;
			margin-left: 55px;
			float: left;
			border-radius: 5px;
		}

		p {
			margin-top: -10px;
			font-size: 16px;
			font-weight: bold;
		}
	</style>
</head>

<body>

	<section>
		<div id="front">
			<img src="assets/produksi/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" srcset="">
			<p><?= $bc->t_bc_kode; ?></p>
		</div>

		<div id="middle">
			<img src="assets/produksi/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" srcset="">
			<p><?= $bc->t_bc_kode; ?></p>
		</div>

		<div id="back">
			<img src="assets/produksi/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" srcset="">
			<p><?= $bc->t_bc_kode; ?></p>
		</div>
	</section>

	<section>
		<div id="front">
			<img src="assets/produksi/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" srcset="">
			<p><?= $bc->t_bc_kode; ?></p>
		</div>

		<div id="middle">
			<img src="assets/produksi/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" srcset="">
			<p><?= $bc->t_bc_kode; ?></p>
		</div>
	</section>

</body>

</html>