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
			margin-top: 10pt;
			margin-right: 5pt;
			margin-left: 5pt;
			margin-bottom: 5pt;
		}

		#t {
			font-size: 25px;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<tr class="group-img">
				<td class="group-bc">
					<p id="t">Jika terjadi pada produk,</p>
					<p id="t">scan QR code untuk masuk</p>
					<p id="t">ke website kami</p><br>
					<img src="assets/barcodemyamin/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" style="margin-top: -20px;">
					<p>www.myamin.co.id</p>
				</td>
				<td class="group-bc">
					<p id="t">Jika terjadi pada produk,</p>
					<p id="t">scan QR code untuk masuk</p>
					<p id="t">ke website kami</p><br>
					<img src="assets/barcodemyamin/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" style="margin-top: -20px;">
					<p>www.myamin.co.id</p>
				</td>
				<td class="group-bc">
					<p id="t">Jika terjadi pada produk,</p>
					<p id="t">scan QR code untuk masuk</p>
					<p id="t">ke website kami</p><br>
					<img src="assets/barcodemyamin/<?= $bc->t_bc_img; ?>" alt="<?= $bc->t_bc_kode; ?>" style="margin-top: -20px;">
					<p>www.myamin.co.id</p>
				</td>
			</tr>
		</tbody>
	</table>

</body>

</html>