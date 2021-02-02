<?php include 'config/class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>SPK Pemilihan Kamera Mirrorless</title>
	<link rel="icon" href="assets/img/ico.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/cssuser.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.min.css">
	
	
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
</script>
</head>
<style type="text/css">
	h4,h6{
		color: #7A7A7D;
	}
</style>
<body style="background-color: #EEEEEF;">
	<header class="headerbox" style="z-index: 1;">
		<div class="row">
			<div class="col-md-5">
				<img src="assets/img/img-header.png" style="width: 190px; margin-left: 70px;">
			</div>
			<div class="col-md-7">
				<div id="textheader" style="margin-top: 45px; padding-left: 30px;">
					<span class="fa fa-angle-right" style="color: #FFBF00"></span>
					<a href="index.php"><i class="fa fa-home"></i><b> HOME</b></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="fa fa-angle-right" style="color: #FFBF00"></span>
					<a href="index.php?page=datakamera"><i class="fa fa-list"></i><b> DATA KAMERA</b></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="fa fa-angle-right" style="color: #FFBF00"></span>
					<a href="index.php?page=pilihkamera"><i class="fa fa-search"></i><b> CARI REKOMENDASI</b></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="fa fa-angle-right" style="color: #FFBF00"></span>
					<a href="index.php?page=bantuan"><i class="fa fa-info-circle"></i><b> BANTUAN</b></a>
					<!--span class="fa fa-angle-right" style="color: #FFBF00"></span>
						<a href="index.php?page=login"><i class="fa fa-sign-in"></i><b> LOGIN</b></a-->
						</div>
					</div>
				</div>
			</header>
			<div id="list" style="z-index: 1;"></div><br><br><br><br><br><br>
	<!--div style="text-align: center; color: #6E6E6E;">
		<h2><b>SISTEM PENDUKUNG KEPUTUSAN</b></h2>
		<h3>PEMILIHAN KAMERA MIRRORLESS</h3>
		<h4>Menggunakan Metode <i>Simple Multi Attribute Rating Technique</i> (SMART)</h4>
	</div>
	<img src="assets/img/home.jpg" style="width: 100%"-->
	<?php
	if (!isset($_GET['page'])) {
		include_once 'user/homepage.php';
	}
	else{
		if ($_GET['page']=="login") {
			include_once 'user/login.php';
		}
		elseif ($_GET['page']=="datakamera") {
			include_once 'user/datakamera.php';
		}
		elseif ($_GET['page']=="beribobot") {
			include_once 'user/beribobot.php';
		}
		elseif ($_GET['page']=="pilihkamera") {
			include_once 'user/pilihkamera.php';
		}
		elseif ($_GET['page']=="hasilrekomendasi") {
			include_once 'user/hasilrekomedasi.php';
		}
		elseif ($_GET['page']=="rekomendasikamera") {
			include_once 'user/rekomendasikamera.php';
		}
		elseif ($_GET['page']=="bantuan") {
			include_once 'user/bantuan.php';
		}
		elseif ($_GET['page']=="pencarian") {
			include_once 'user/pencarian.php';
		}
	}
	?>

	<footer class="footerbox">
		<b>Copyright &COPY;</b> Yandi Bagus Kurniawan | 2019
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
</body>
</html>