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
			font-size: 12px;
			font-weight: bold;
		}


		@page {
			margin-top: 10pt;
			margin-bottom: 5pt;
			margin-left: 5pt;
			margin-right: -10pt;
		}
	</style>
</head>

<body>
	<?php
	foreach ($bc as $key) :
	?>
		<div class="group-bc">
			<?php
			$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
			echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($key->t_bc_kode, $generator::TYPE_CODE_128)) . '">';
			?>
			<p><?= $key->t_bc_kode; ?></p>
		</div>
		<div class="group-bc2">
			<?php
			$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
			echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($key->t_bc_kode, $generator::TYPE_CODE_128)) . '">';
			?>
			<p><?= $key->t_bc_kode; ?></p>
		</div>
	<?php endforeach; ?>

</body>

</html>