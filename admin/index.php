<?php
include '../config/class.php';
if($_SESSION['cek']!="login"){
	header("location:../index.php?page=login");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>SPK Pemilihan Kamera Mirrorless</title>
	<link rel="icon" href="../assets/img/ico.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/shadow.css">
	<link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/animate/animate.min.css">

	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/date/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/bootstrap-confirmation.min.js"></script>
	<script src="../assets/js/sweetalert2.all.min.js"></script>
	<script src="../assets/js/Chart.min.js"></script>
</script>
</head>
<style type="text/css">
	h2,h3,h4,h6{
		color: #7A7A7D;
	}
</style>
<body style="background-color: #F7F7F8">
	<div class="wrapper print">
		<!-- Sidebar  -->
		<nav id="sidebar" class="print">
			<div class="sidebar-header">
				<div class="row">
					<div class="col-md-10">
						<h5 style="float: left;padding-top: 5px; padding-left: 8px;">SPK Pemilihan Kamera Mirrorless</h5>
						<h6 style="float: left;font-size: 9px; color: white; padding-left: 8px;"><i>Simple Multi Attribute Rating Technique</i></h6>	
					</div>
				</div>
			</div>

			<ul class="list-unstyled components">
				<p></p>
				<li>
					<a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
				</li>
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-archive"></i>&nbsp;&nbsp;Master Data</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="index.php?page=datakamera"><i class="fa fa-list"></i>&nbsp;&nbsp;Data Kamera</a>
						</li>
						<li>
							<a href="index.php?page=datakriteria"><i class="fa fa-list"></i>&nbsp;&nbsp;Data Kriteria</a>
						</li>
						<li>
							<a href="index.php?page=dataperhitungan"><i class="fa fa-list"></i>&nbsp;&nbsp;Data Perhitungan</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="index.php?page=useraccess"><i class="fa fa-users"></i>&nbsp;&nbsp;User Access</a>
				</li>
				<li>
					<a href="../logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="wrapper">
		<div id="content">
			<div style="margin: 30px;background-color: white;bor;" class="box">
				<?php
				if(!isset($_GET['page'])) {
					include 'dashboard.php';
				} else {
					if($_GET['page']=="useraccess") {
						include 'user-access.php';
					} else if($_GET['page']=="dashboard") {
						include 'dashboard.php';
					} else if($_GET['page']=="deluser") {
						include 'delUser.php';
					} else if($_GET['page']=="datakamera") {
						include 'data-kamera.php';
					} else if($_GET['page']=="delkamera") {
						include 'delKamera.php';
					} else if($_GET['page']=="datakriteria") {
						include 'kriteria.php';
					} else if($_GET['page']=="delkriteria") {
						include 'delKriteria.php';
					} else if($_GET['page']=="dataperhitungan") {
						include 'perhitungan.php';
					} else if($_GET['page']=="delperhitungan") {
						include 'delPerhitungan.php';
					} 	
				} 
				?>
			</div>
		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
</body>
</html>