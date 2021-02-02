<style>
	p,h5{
		display: inline;
	}
	.row{
		margin-bottom: 15px;
	}
	.active {
		background-color: #F0EFEF;
	} 
</style>
<script>
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

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
				$('#detharga').text(numberWithCommas(data.harga));
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
</script>

<div class="container" style="background-color: white; margin-bottom: 30px; padding-top: 30px; padding-right: 35px; padding-left: 35px; padding-bottom: 20px;">
	<h4 style="color: #6E6E6E;">Data Spesifikasi Kamera Mirrorless</h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

		</div>
		<div class="col-md-4" style="padding-left: 70px;">
			<form class="form-inline" action="" method="POST">
				<div class="form-group" style="margin-right: 5px;">
					<input type="text" name="pencarian" class="form-control" placeholder="Pencarian" autocomplete="off">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" aria-hidden="true" style="background-color: #2F60AE; border: 0;"><i class="fa fa-search"></i> Cari</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<?php
		$batas = 12;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else{
			$posisi = ($hal-1) * $batas;
		}
		$no = 1;
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
			if($pencarian != ''){
				$sql = "SELECT * FROM kamera WHERE merk_kamera OR seri_kamera LIKE '%$pencarian%'";
				$query = $sql;
				$queryJml = $sql;
			}else {
				$query = "SELECT * FROM kamera LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM kamera";
				$no = $posisi + 1;
			}
		} else {
			$query = "SELECT * FROM kamera LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM kamera";
			$no = $posisi + 1;
		}

		$datakamera=mysqli_query ($con, $query) or die(mysqli_error($con));
		if(mysqli_num_rows($datakamera) >0){
			while ($value = mysqli_fetch_array($datakamera)) { ?>
				<div class="col-md-3">
					<div class="container active" style="padding-top: 30px; padding-bottom: 25px;">
						<center>
							<div><?php echo "<img src='assets/img/$value[foto]' height='140' />";?></div><br>
							<p style="font-size: 18px; margin-top: -30px;"><b><?php echo $value['merk_kamera'].' '.$value['seri_kamera']; ?></b></p><br>
							<p><?php echo 'Rp.'. number_format($value['harga'], 0, ',', '.'); ?></p><br><br>
							<button style="margin-top: -25px; background: #2F60AE; color: white;" type="button" title="Detail Spesifikasi" class="btn btn-sm" onclick="showmodaldetail('<?php echo $value['id_kamera']?>')"><i class="fa fa-eye"></i> Lihat Detail</button>
						</center>
					</div><br>
				</div>
			<?php }
		} else{
			echo "<br>";
			echo "<img src='assets/img/notfound.png' style='width: 810px; margin-left: 130px; margin-top:50px; margin-bottom:50px;'>";
		}
		?>
	</div><hr>
	<?php if($_POST['pencarian'] ==''){ ?>
		<div style="float: left;">
			<?php
			$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
			//echo "Showing $jml items";
			?>
		</div>

		<div style="float: right">
			<ul class="pagination">
				<?php
				$jml_hal = ceil($jml / $batas);
				for ($i=1; $i <= $jml_hal ; $i++) { 
					if($i != $hal){
						echo" <li class='page-item'><a class='page-link' href='?page=datakamera&hal=$i'>$i</a></li>";
					} else {
						echo" <li class='page-item active'><a class='page-link'>$i</a></li>";
					}
				}
				?>
			</ul>
		</div>
		<?php 
	} else{
		$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
		//echo "Showing $jml items search";
	} 
	?><br><br>
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
						<div class="col-md-6">
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
									<p>Maks ISO</p>
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
								<div class="col-md-4">
									<p>1/</p><p id="detshutter"></p> Sec
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Resolusi Video</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detvideo"></p>p
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Megapixel</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detmegapixel"></p> MP
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Jumlah Titik Fokus</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detfokus"></p> Titik
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Baterai</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									<p id="detbaterai"></p> Frame
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Harga</p>
								</div>
								<div class="col-md-1">: </div>
								<div class="col">
									Rp. <p id="detharga"></p>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<center><br><img id="image-id" style="width: 320px;height: auto; margin-top: -10px;"></center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>