<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/ionicons/css/ionicons.min.css">
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $total_bc; ?></h3>

							<p>Generate Barcode</p>
						</div>
						<div class="icon">
							<i class="ion ion-qr-scanner"></i>
						</div>
						<a href="<?= base_url('Produksi/Generate'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<?php
							$pres = 0;
							$pres = ($total_bc / 654) * 100;
							?>
							<h3><?= number_format($pres); ?><sup style="font-size: 20px">%</sup></h3>

							<p>Presentase to Target</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>654<sup style="font-size: 20px">Barcode</sup></h3>

							<p>Target</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-pricetags"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<?php
							$dif = 0;
							$dif = $total_bc - 654;
							?>
							<h3><?= $dif; ?><sup style="font-size: 20px">Barcode</sup></h3>

							<p>Diff</p>
						</div>
						<div class="icon">
							<i class="ion ion-arrow-graph-up-right"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->