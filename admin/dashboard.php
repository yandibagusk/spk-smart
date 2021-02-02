<style type="text/css">
	.card {
		transition: all 0.3s;
		color: white;
		border-radius: 0px;

		border:none;
	}
	.card:hover {
		transition: all 0.7s;
		transform: scale(1.09);
	}

	.icon{
		opacity: 0.7;
		color: white;
	}
	.icon:hover{
		opacity: 1;
		color: white;
	}
	.text{
		opacity: 0.8;
		color: white;
	}
	.text:hover{
		opacity: 1;
		color: white;
	}
	.count{
		opacity: 0.8;
		font-weight: bold;
		font-size: 16px;
	}
	.count:hover{
		opacity: 1;
		font-weight: bold;
	}

</style>


<div style="padding: 25px;" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h4>Dashboard</h4>
		</div>
	</div>
	<hr>
	<h4><center>Grafik Perhitungan Bulanan</center></h4>
	<canvas id="myChart" height="100"></canvas>
	<hr>
	<!--h2><center>SISTEM PENDUKUNG KEPUTUSAN</center></h2>
	<h3><center>Pemilihan Kamera Mirrorless</center></h3>
	<h3><center>Menggunakan Metode <i>Simple Multi Attribute Rating Technique (SMART)</i></center></h3>
	<br><br><br-->
	<br>
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-info">
				<div class="card-body">
					<center><a class="icon" href="index.php?page=datakamera"><i class="fa fa-camera fa-5x"></i></a></center>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-8"><div class="text" style="padding: 0px; font-size: 14px;">Total Kamera</div></div>
						<div class="col-md-4"><div class="col-md-2"><div class="count" style="margin-left: -25px;">
							<?php
							$kamera = $data->jum_kamera();
							foreach ($kamera as $key => $value):
								?>
								<?php echo $value['jumlah']; ?>
								<?php
							endforeach;
							?>

						</div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-warning">
			<div class="card-body">
				<center><a class="icon" href="index.php?page=dataperhitungan"><i class="fa fa-area-chart fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-8"><div class="text" style="padding: 0px; font-size: 14px;">Total Perhitungan</div></div>
					<div class="col-md-4"><div class="count">
						<?php
						$perhitungan = $data->jum_perhitungan();
						foreach ($perhitungan as $key => $value):
							?>
							<?php echo $value['jumlah']; ?>
							<?php
						endforeach;
						?>
					</div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-danger">
			<div class="card-body">
				<center><a class="icon" href="index.php?page=datakriteria"><i class="fa fa-list fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-8"><div class="text" style="padding: 0px; font-size: 14px;">Total Kriteria</div></div>
					<div class="col-md-4"><div class="count">
						<?php
						$kriteria = $data->jum_kriteria();
						foreach ($kriteria as $key => $value):
							?>
							<?php echo $value['jumlah']; ?>
							<?php
						endforeach;
						?>
					</div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-success">
			<div class="card-body">
				<center><a class="icon" href="index.php?page=useraccess"><i class="fa fa-users fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-8"><div class="text" style="padding: 0px; font-size: 14px;">Total User</div></div>
					<div class="col-md-4"><div class="count">
						<?php
						$user = $data->jum_user();
						foreach ($user as $key => $value):
							?>
							<?php echo $value['jumlah']; ?>
							<?php
						endforeach;
						?>
					</div></div>
				</div>
			</div>
		</div>
	</div>
</div><br>
</div>

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			datasets: [{
				label: 'Jumlah Perhitungan',
				data: [
				<?php $jan = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=1 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($jan);?>,

				<?php $feb = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=2 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($feb);?>,

				<?php $mar = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=3 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($mar);?>,

				<?php $apr = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=4 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($apr);?>,

				<?php $mei = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=5 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($mei);?>,

				<?php $jun = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=6 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($jun);?>,

				<?php $jul = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=7 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($jul);?>,

				<?php $ags = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=8 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($ags);?>,

				<?php $sep = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=9 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($sep);?>,

				<?php $okt = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=10 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($okt);?>,

				<?php $nov = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=11 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($nov);?>,

				<?php $des = mysqli_query($con, "SELECT * FROM perhitungan WHERE MONTH(tanggal)=12 AND YEAR(tanggal) = YEAR(CURDATE());");
				echo mysqli_num_rows($des);?>
				],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)'
				],
				borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)',
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
