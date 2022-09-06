<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barcode <?= $bc->t_bc_kode; ?></title>
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
			margin-left: 25pt;
			margin-right: 5pt;
		}

		img {
			width: 100%;
		}

		p {
			margin-top: 0px;
			font-size: 20px;
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
	<div class="group-bc">
		<?php
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($bc->t_bc_kode, $generator::TYPE_CODE_128)) . '">';
		?>
		<p><?= $bc->t_bc_kode; ?></p>
	</div>
	<div class="group-bc2">
		<?php
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($bc->t_bc_kode, $generator::TYPE_CODE_128)) . '">';
		?>
		<p><?= $bc->t_bc_kode; ?></p>
	</div>

</body>

</html>