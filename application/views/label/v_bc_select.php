<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		@page {
			margin-top: 5pt;
			margin-bottom: 5pt;
			margin-left: 5pt;
			margin-right: 5pt;
		}

		* {
			box-sizing: border-box;
		}

		.column {
			float: left;
			width: 40%;
			padding: 10px;
			height: 10px;
			text-align: center;
			margin-left: 15px;
		}

		.column b {
			text-align: justify;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
			width: 100%;
		}
	</style>
</head>

<body>
	<?php
	foreach ($bc as $key) {
	?>
		<div class="row">
			<div class="column">
				<b><?= $key->m_label_kode; ?></b>
				<img src="assets/label/<?= $key->t_bc_img; ?>" style="width:45%" alt="<?= $key->t_bc_kode; ?>">
			</div>
			<div class="column">
				<b><?= $key->m_label_kode; ?></b>
				<img src="assets/label/<?= $key->t_bc_img; ?>" style="width:45%" alt="<?= $key->t_bc_kode; ?>">
			</div>
		</div>
		<div class="row">
			<div class="column">
				<b><?= $key->m_label_kode; ?></b>
				<img src="assets/label/<?= $key->t_bc_img; ?>" style="width:45%" alt="<?= $key->t_bc_kode; ?>">
			</div>
			<div class="column">
				<b><?= $key->m_label_kode; ?></b>
				<img src="assets/label/<?= $key->t_bc_img; ?>" style="width:45%" alt="<?= $key->t_bc_kode; ?>">
			</div>
		</div>

	<?php } ?>
</body>

</html>