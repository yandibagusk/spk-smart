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
</head>
<style>
	body{
		background-color: #2F60AE;
	}
</style>
<body>
	<br>
	<div class="login">
		<form method="POST">
			<div class="container" style="width: 400px; height: 410px; background: white; padding-right: 30px; padding-left: 30px; padding-top: 30px; margin-top: 20px; margin-bottom: 70px; border-radius: 10px;">
				<div class="login">
					<form class="form-signin" method="POST">
						<div class="text-center mb-4">
							<img src="assets/img/logo.png" style="width: 60px;"><br><br>
							<h5><b>SISTEM PENDUKUNG KEPUTUSAN</b></h5>
							<h6 style="margin-top: -5px;">Pemilihan Kamera Mirrorless</h6>
						</div>
						<hr>
						<div class="form-label-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-user"></i></div>
								</div>
								<input type="username" class="form-control" id="username" name="username" placeholder="Username" autofocus="on" autocomplete="off">
							</div>
						</div>			

						<br>

						<div class="form-label-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-lock"></i></div>
								</div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
							</div>
						</div>	
						<hr>
						<button class="btn btn-block" type="submit" value="LOGIN" name="signin" style="background-color: #2F60AE; color: white;">
							<span class="fa fa-sign-in"></span> Login
						</button>
						<?php 
							if (isset($_POST['signin'])) {
								$data->login($_POST['username'],$_POST['password']);
							}
						 ?>
					</form>
				</div>
			</div>
		</form>
	</div>
</body>
</html>