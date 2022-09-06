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
			width: 100%;
			margin: 5pt 5pt 0pt 0pt;
		}

		img {
			width: 100%;
		}

		p {
			font-size: 30px;
		}

		table {
			justify-content: center;
		}

		@page {
			margin-top: -20pt;
			margin-right: 5pt;
			margin-left: 11pt;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<?php
			foreach ($bc as $key) {
			?>
				<tr>
					<td class="group-bc">
						<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
						<p><?= $key->t_bc_kode; ?></p>
					</td>
					<td class="group-bc">
						<img src="assets/produksi/<?= $key->t_bc_img; ?>" alt="<?= $key->t_bc_kode; ?>">
						<p><?= $key->t_bc_kode; ?></p>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>

</body>

</html>