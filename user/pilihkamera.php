<style type="text/css">
	.active {
		background-color: #F0EFEF;
	} 

	#position{
		padding-top: 10px;
		padding-bottom: 10px;
		color:#6E6E6E;
	}

	.inline{
		display: inline;
		margin-bottom: -15px;
	}
}
</style>
<script>
	function datadetail(id){
		$.ajax({
			type : "get",
			url : "user/detail.php?id_kamera='"+id+"'",
			async : false,
			dataType : "json",
			success : function(data) {
				$('#detmerk').text(data['merk_kamera']);
				$('#detseri').text(data.seri_kamera);
				$('#detiso').text(data.iso_max);
				$('#detshutter').text(data.shutterspeed_max);
				$('#detvideo').text(data.video_res);
				$('#detmegapixel').text(data.megapixel);
				$('#detfokus').text(data.jum_titikfokus);
				$('#detbaterai').text(data.battery_life);
				$('#detharga').text(data.harga);
				document.getElementById("image-id").src="assets/img/"+data.foto;

			},
			error : function(data){
				console.log(data);
				alert(data.id_kamera);
			}
		});
	}

	function showmodaldetail(id) {
		$('#modaldetail').modal('show');
		datadetail(id);
	}

	function limit_checkbox(max,identifier)
	{
		var checkbox = $("input[name='"+identifier+"[]']");
		var checked  = $("input[name='"+identifier+"[]']:checked").length;
		checkbox.filter(':not(:checked)').prop('disabled', checked >= max);

	}

</script>
<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 30px;">
	<form method="POST" action="">
		<h4 style="color: #6E6E6E;">Halaman Rekomendasi Pemilihan Kamera Mirrorless</h4>
		<hr>
		<table width="900px;" align="center" style=" margin-bottom: 15px; box-shadow: 2px 2px 2px #000000;">
			<tr align="center">
				<td id="position" class="active" width="300px;">
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
		
		<table id="myTable" class="table table-hover table-responsive" style="font-size: 15px;">
			<thead class="thead-light" style="text-align: center;">
				<tr style="text-align: center;">
					<th scope="col">Pilih</th>
					<th nowrap scope="col" width="130">Kamera</th>
					<th nowrap scope="col">Maks ISO</th>
					<th nowrap scope="col">Maks Shutter</th>
					<th nowrap scope="col">Resolusi Video</th>
					<th scope="col">Megapixel</th>
					<th nowrap scope="col">Titik Fokus</th>
					<th scope="col" width="120">Harga</th>
					<th scope="col">Detail</th>	
				</tr>
			</thead>
			<tbody>
				<?php $datakamera=$data->select_data_kamera()?>
				<?php foreach ($datakamera as $key => $value): ?>
					<tr>
						<td><input value='<?php echo $value['id_kamera']; ?>' type="checkbox"  name="id_kamera[]" onchange="limit_checkbox(50,'id_kamera');"/></td>
						<td><?php echo $value['merk_kamera']; echo ' ';;echo $value['seri_kamera']; ?></td>
						<td><?php echo $value['iso_max']; ?></td>
						<td><?php echo '1/'. $value['shutterspeed_max']; echo ' sec'; ?></td>
						<td><?php echo $value['video_res']; echo 'p'; ?></td>
						<td><?php echo $value['megapixel']; echo ' MP'; ?></td>
						<td><?php echo $value['jum_titikfokus']; echo' Point'; ?></td>
						<!--td><?php echo $value['battery_life']; echo ' frame'; ?></td-->
						<td><?php echo 'Rp. '; echo number_format($value['harga'], 0, ',', '.'); ?></td>
						<td><!--center><?="<img src='assets/img/".$value['foto']."'style='width:auto; height:90px;'>"?></center-->
							<center><button type="button" title="Detail Spesifikasi" class="btn btn-primary btn-sm" onclick="showmodaldetail('<?php echo $value['id_kamera']?>')"><i class="fa fa-eye"></i></button></center>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
		<button type="submit" title="Selanjutnya" name="simpan_kamera" style="margin: 10px; margin-left: 940px; color: white; background-color: #2F60AE;" class="btn">Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>
		<?php
		if(isset($_POST['simpan_kamera'])) {
			$_SESSION['id_kamera'] = $_POST['id_kamera'];
			if(sizeof($_SESSION['id_kamera']) > 1) {
				?>
				<script>
					location.href = 'index.php?page=beribobot'
				</script>
				<?php
			}else{
				?>
				<script>
					setTimeout(function () { 
						swal({
							title: 'Silahkan Pilih Kamera Dahulu!',
							text: 'Pilih Minimal 2 Kamera dan Maksimal 5 Kamera',
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
			}
		}
		?>
	</form>
</div>


<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Detail Spesifikasi Kamera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-det" method="POST">
					<div class="row">
						<div class="col-md-6" id="inline">
							<div class="row">
								<div class="col-md-6">
									<p>Merk Kamera</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detmerk"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Seri Kamera</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detseri"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>ISO Maksimal</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detiso"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Maks Shutter Speed</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									1/<p id="detshutter" class="inline"></p> Sec
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Resolusi Video</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detvideo" class="inline"></p>p
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Megapixel</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detmegapixel" class="inline"></p>MP
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Jumlah Titik Fokus</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detfokus"class="inline"></p> Titik
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Baterai</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detbaterai" class="inline"></p> Frame
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Harga</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									Rp. <p id="detharga" class="inline"></p>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<center><br><img id="image-id" style="width: 350px;height: auto;"></center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>