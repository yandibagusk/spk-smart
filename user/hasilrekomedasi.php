<?php
if(!isset($_SESSION['id_kamera']) || empty($_SESSION['id_kamera'])) {
	?>
	<script>
		setTimeout(function () { 
			swal({
				title: 'Silahkan Pilih Kamera Dahulu!',
				text: 'Pilih Minimal 2 Kamera',
				type: 'error',
				showConfirmButton: false,
				timer: 1700,
			});  
		},10);
		window.setTimeout(function(){ 
			window.location.replace('index.php?page=pilihkamera');
		} ,1700); 
	</script>
	<?php
	die();
}else if(!isset($_SESSION['bobot']) || empty($_SESSION['bobot'])) {
	?>
	<script>
		setTimeout(function () { 
			swal({
				title: 'Silahkan Beri Bobot Kamera Yang Sudah Dipilih!',
				type: 'error',
				showConfirmButton: false,
				timer: 1700,
			});  
		},10);
		window.setTimeout(function(){ 
			window.location.replace('index.php?page=beribobot');
		} ,1700); 
		location.href = 'index.php?page=beribobot';
	</script>
	<?php
	die();
}


include 'config/Smart.php';
include 'config/Utils.php';
$id_kamera = $_SESSION['id_kamera'];
$id_kriteria = $_SESSION['id_kriteria'];
$bobot = $_SESSION['bobot'];

$hasil = $smart->insertPerhitungan($id_kriteria, $id_kamera, $bobot);

$id_kamera = $hasil['data']['id_kamera'];
$result = array();
for($i = 0; $i < sizeof($hasil['data']['perhitungan']); $i++) {
	$result[$i] = [
		'id_kamera' => $id_kamera[$i],
		'final_score' => $hasil['data']['perhitungan'][$id_kamera[$i]]['final_score'][0]
	];
}

$temp_res = array_column($result, 'final_score');
array_multisort($temp_res, SORT_DESC, $result);

$temp_hasil = array();
for($j = 0; $j < sizeof($result); $j++) {
	for($k = 0; $k < sizeof($hasil['data']['perhitungan'][$result[$j]['id_kamera']]['value_utilities']); $k++ ) {
		$temp_hasil[$j][$k] = [
			'alternatif' => $utils->getKamera($result[$j]['id_kamera']),
			'kriteria' => $utils->getKriteria($hasil['data']['id_kriteria'][$k]) ,
			'values_util' => $hasil['data']['perhitungan'][$result[$j]['id_kamera']]['value_utilities'][$k],
			'normalisasi' => $hasil['data']['perhitungan'][$result[$j]['id_kamera']]['normalisasi'][$k],
			'total' => $hasil['data']['perhitungan'][$result[$j]['id_kamera']]['total'][$k],
			'skor' => $hasil['data']['perhitungan'][$result[$j]['id_kamera']]['final_score'][0]
		];
	}
}

?>

<style type="text/css">
	.active {
		background-color: #F0EFEF;
	} 

	#position{
		padding-top: 10px;
		padding-bottom: 10px;
		color:#6E6E6E;
	}
}
</style>

<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
	<h4 style="color: #6E6E6E;">Hasil Rekomendasi Kamera Mirrorless</h4>
	<hr>
	<table width="900px;" align="center" style=" margin-bottom: 15px; box-shadow: 2px 2px 2px #000000;">
		<tr align="center">
			<td id="position" width="300px;">
				<div class="row">
					<div class="col-md-1">
						<img src="assets/img/step1.png" style="width: 30px; margin-left: 20px; margin-top: 7px;" align="center"><br>
					</div>
					<div class="col">
						<img src="assets/img/1.png" style="width: 15px; margin-top: -2px;">
						<a href="index.php?page=pilihkamera" style="color: #6E6E6E;"><b>Pilih Kamera Mirrorless</b></a>
						<p style="font-size: 11px; margin-top: -2px; margin-bottom: 2px;">Pilih Kamera Yang Akan Dibandingkan</p>
					</div>
				</div>
			</td>
			<td id="position" width="300px;">
				<div class="row">
					<div class="col-md-1">
						<img src="assets/img/step2.png" style="width: 30px; margin-left: 30px; margin-top: 7px;" align="center"><br>
					</div>
					<div class="col">
						<img src="assets/img/2.png" style="width: 15px; margin-top: -2px;">
						<a href="index.php?page=beribobot" style="color: #6E6E6E;"><b>Pemberian Bobot</b></a>
						<p style="font-size: 11px; margin-top: -2px; margin-bottom: 2px;">Beri Bobot Masing Masing Kriteria</p>
					</div>
				</div>
			</td>
			<td id="position" class="active" width="300px;">
				<div class="row">
					<div class="col-md-1">
						<img src="assets/img/step3.png" style="width: 30px; margin-left: 20px;" align="center"><br>
					</div>
					<div class="col">
						<img src="assets/img/3.png" style="width: 15px; margin-top: -2px;">
						<a href="index.php?page=hasilrekomendasi" style="color: #6E6E6E;"><b>Hasil Rekomendasi</b></a>
						<p style="font-size: 11px; margin-top: -2px; margin-bottom: 2px;">Kamera Mirrorless Yang Direkomendasikan</p>
					</div>
				</div>
			</td>
		</tr>
	</table><br>

	<div class="row">
		<?php
		for($j = 0; $j < sizeof($result); $j++) {
			?>
			<div class="col-md-3">
				<!--?php echo $result[$j]['id_kamera'] ?-->
				<?php $value = $data->show_kamera($result[$j]['id_kamera']) ?>
				<div class="container active" style="padding-top: 9px; padding-bottom: 9px;">
					<h5><center><b>Ranking <?php echo $j+1; ?></b></center></h5>
					<p style="margin-top: -15px;"><center><b><?php echo $value['merk_kamera'].' '.$value['seri_kamera']; ?></b></center></p>
					<hr style="margin-top: -10px;">
					<center><?php echo "<img src='assets/img/$value[foto]' height='140' />";?></center>
					<hr style="margin-bottom: -10px;">
					<p><center><b>SPESIFIKASI KAMERA</b></center></p>
					<hr style=" margin-top: -10px;">
					<div class="row" style="font-size: 14px;">
						<div class="col-md-6">
							<p>Merk</p>
							<p>Seri</p>
							<p>Maks ISO</p>
							<p>Maks Shutter</p>
							<p>Resolusi Video</p>
							<p>Megapixel</p>
							<p>Titik Fokus</p>
							<p>Baterai</p>
							<p>Harga</p>
						</div>
						<div class="col-md-1" style="margin-left: -15px; margin-right: -15px;">
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
							<p>:</p>
						</div>
						<div class="col-md-5">
							<p><?php echo $value['merk_kamera'] ?></p>
							<p><?php echo $value['seri_kamera'] ?></p>
							<p><?php echo $value['iso_max'] ?></p>
							<p><?php echo '1/'.$value['shutterspeed_max'].' sec' ?></p>
							<p><?php echo $value['video_res'].'p' ?></p>
							<p><?php echo $value['megapixel'].' MP' ?></p>
							<p><?php echo $value['jum_titikfokus'].' Titik' ?></p>
							<p><?php echo $value['battery_life'].' Frame' ?></p>
							<p><?php echo 'Rp.'. number_format($value['harga'], 0, ',', '.'); ?></p>
						</div>
					</div>
					<hr style="margin-top: -1px;">
					<div class="row">
						<div class="col-md-5">
							<h5>Skor</h5>
						</div>
						<div class="col-md-1">
							:
						</div>
						<div class="col-md-4">
							<h3><?php echo round($result[$j]['final_score'],3); ?></h3>
						</div>
					</div>
				</div><br>
			</div>
		<?php } ?>
	</div><br>


	<h4 style="color: #6E6E6E;">Rincian Perhitungan</h4><hr>
	<?php
	for($k = 0; $k < sizeof($id_kamera); $k++) {
		?>
		<h5><b>Ranking <?php echo $k+1;?></b></h5>
		<table class="table table-hover table-bordered table-striped table-responsive-sm">
			<thead class="thead-light" style="text-align: center;">
				<tr>
					<th scope="col">Alternatif</th>
					<th scope="col">Kriteria</th>
					<th scope="col">Value Utilities</th>
					<th scope="col">Normalisasi</th>
					<th scope="col">Total</th>
					<th scope="col">Skor</th>
				</tr>
			</thead>
			<tbody>
				<?php
				for($l = 0; $l < sizeof($temp_hasil[$k]); $l++) {
					?>
					<tr>
						<td><?php echo $temp_hasil[$k][$l]['alternatif']  ?></td>
						<td><?php echo $temp_hasil[$k][$l]['kriteria']  ?></td>
						<td><?php echo round($temp_hasil[$k][$l]['values_util'],3);  ?></td>
						<td><?php echo round($temp_hasil[$k][$l]['normalisasi'],3);  ?></td>
						<td><?php echo round($temp_hasil[$k][$l]['total'],3);  ?></td>
						<td><?php echo round($temp_hasil[$k][$l]['skor'],3);  ?></td>
					</tr>
					<?php
				}
				?>

			</tbody>
		</table>
	<?php } ?>
</div>

<?php
unset ($_SESSION["id_kamera"]);
unset ($_SESSION["id_kriteria"]);
unset ($_SESSION["bobot"]);
?>
