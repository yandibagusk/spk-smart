<?php
/*if(!isset($_SESSION['id_kamera']) || empty($_SESSION['id_kamera'])) {
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
		//location.href = 'index.php?page=pilihkamera';
	</script>

	<?php
	die();
}*/

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
	<h4 style="color: #6E6E6E;">Halaman Rekomendasi Pemilihan Kamera Mirrorless</h4>
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
			<td id="position" class="active" width="300px;">
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
			<td id="position" width="300px;">
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
	</table>
	<form method="POST" action="">
		<p>Jawablah beberapa pertanyaan dibawah ini :</p>
		<table class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col" width="70">No</th>
					<!--th scope="col" width="200">Kriteria</th-->
					<th scope="col">Pertanyaan</th>
					<th scope="col" width="200">Jawaban</th>
				</tr>
			</thead>
			<tbody style="font-size: 15px;">
				<?php $kriteria=$data->select_pertanyaan()?>
				<?php foreach ($kriteria as $key => $value): ?>
					<tr>
						<td style="text-align: center;"><?php echo $key+1; ?></td>
						<td style="text-align: center;" hidden>
							<?php echo $value['kriteria']; ?>
							<input type="hidden" name="id_kriteria[]" value="<?php echo $value['id_kriteria'] ?>">
						</td>
						<td><?php echo $value['pertanyaan']; ?></td>
						<td>
							<select class="form-control" name="bobot[]" style="font-size: 14px;">
								<?php
								if($value['kriteria'] == "Harga") {
									?>
									<option value="" selected> - Pilih Jawaban - </option>
									<option value="10">Ya 10</option>
									<option value="20">Tidak 20</option>
									<!--option value="10">Sangat Penting</option-->
									<?php
								}else if($value['id_pertanyaan'] >= 'P008'){
									?>
									<option value="" selected> - Pilih Jawaban - </option>
									<option value="10">Ya (10)</option>
									<option value="0">Tidak (0)</option>
									<?php
								}else {
									?>
									<option value="" selected> - Pilih Jawaban - </option>
									<option value="20">Ya</option>
									<option value="10">Tidak</option>
									<!--option value="30">Sangat Penting</option-->
									<?php
								}
								?>
							</select>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
		<button type="submit"name="simpan_bobot" class="btn btn-primary" style="margin-left: 950px; background-color: #2F60AE; border: 0;"><i class="fa fa-refresh"></i> Proses</button>
	</form>


	<?php
	if(isset($_POST['simpan_bobot'])){
		$_SESSION['id_kriteria'] = $_POST['id_kriteria'];
		$_SESSION['bobot'] = $_POST['bobot'];
		$isFull = false;
		for($i = 0; $i < sizeof($_SESSION['bobot']); $i++) {
			if(empty($_SESSION['bobot'][$i])) {
				?>
				<script>
					setTimeout(function () { 
						swal({
							title: 'Semua Jawaban Harus Diisi!',
							type: 'error',
							showConfirmButton: false,
							timer: 1500,
						});  
					},10);
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=beribobot');
					} ,1300); 
					//alert("Semua kriteria harus diisi !");
				</script>
				<?php
				die();
			}
		}
		?>
		<script>
			location.href = 'index.php?page=hasilrekomendasi';
		</script>
		<?php
	}
	?>
</div>
