<?php
session_start();
error_reporting(0);
include 'koneksi.php';

class user {
	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

	function login($usr,$pass)
	{
		$u=$this->koneksi->real_escape_string($usr);
		$p=$this->koneksi->real_escape_string($pass);

		$select=$this->koneksi->query("SELECT * FROM user WHERE username='$u' AND password='$p' limit 1");
		$cek=$select->num_rows;
		$_SESSION['cek'] = "login";
		if ($cek>0) {
			echo "<script>setTimeout(function () {
				swal({
					title: 'Login Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});
					},10);
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href= 'admin/index.php';
						},1230);
						</script>";
					}
					else
					{
						echo "<script>setTimeout(function () {
							swal({
								title: 'Login Gagal!',
								type: 'error',
								showConfirmButton: false,
								timer: 1200,
								});
								},10);
								</script>";
								echo "<script>
								setTimeout(function () {
									window.location.href= 'index.php?page=login';
									},1230);
									</script>";
								}
							}

							/*PENOMORAN OTOMATIS*/

							function show_kamera($id){
								$query = $this->koneksi->query("SELECT * FROM kamera WHERE id_kamera = '$id'");
								$x=$query->fetch_assoc();
								return $x;
							}

							function show_suggestion($id){
								$query = $this->koneksi->query("SELECT * FROM kamera WHERE id_kamera = '$id' LIMIT 1;");
								$x=$query->fetch_assoc();
								return $x;
							}

							function create_iduser(){
								$cariid = $this->koneksi->query("SELECT MAX(id_user) FROM user") or die (mysql_error());
								$dataid = mysqli_fetch_array($cariid);
								if($dataid) {
									$nilaiid = substr($dataid[0], 2);
									$id = (int) $nilaiid;
									$id = $id + 1;
									$id_otomatis = "U".str_pad($id, 3, "0", STR_PAD_LEFT);
									return $id_otomatis;
								} else {
									$id_otomatis = "";
								}
							}

							function create_idkamera(){
								$cariid = $this->koneksi->query("SELECT MAX(id_kamera) FROM kamera") or die (mysql_error());
								$dataid = mysqli_fetch_array($cariid);
								if($dataid) {
									$nilaiid = substr($dataid[0], 2);
									$id = (int) $nilaiid;
									$id = $id + 1;
									$id_otomatis = "CM".str_pad($id, 3, "0", STR_PAD_LEFT);
									return $id_otomatis;
								} else {
									$id_otomatis = "";
								}
							}

							function create_idkriteria(){
								$cariid = $this->koneksi->query("SELECT MAX(id_kriteria) FROM kriteria") or die (mysql_error());
								$dataid = mysqli_fetch_array($cariid);
								if($dataid) {
									$nilaiid = substr($dataid[0], 2);
									$id = (int) $nilaiid;
									$id = $id + 1;
									$id_otomatis = "KR".str_pad($id, 3, "0", STR_PAD_LEFT);
									return $id_otomatis;
								} else {
									$id_otomatis = "";
								}
							}

							function create_idperhitungan(){
								$cariid = $this->koneksi->query("SELECT MAX(id_perhitungan) FROM perhitungan") or die (mysql_error());
								$dataid = mysqli_fetch_array($cariid);
								if($dataid) {
									$nilaiid = substr($dataid[0], 2);
									$id = (int) $nilaiid;
									$id = $id + 1;
									$id_otomatis = "PH".str_pad($id, 3, "0", STR_PAD_LEFT);
									return $id_otomatis;
								} else {
									$id_otomatis = "";
								}
							}

							/*USER ACCESS*/
							function jum_user(){
								$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM user");
								while ($fetch = $select->fetch_assoc()) {
									$data[] = $fetch;
								}
								return $data;
							}

							function add_user($id_user, $username, $password){
								$cek = $this->koneksi->query("SELECT * FROM user WHERE username='$username'");
								if($cek->num_rows>0){
									echo "<script>setTimeout(function () { 
										swal({
											title: 'Data Sudah Ada',
											type: 'error',
											showConfirmButton: false,
											timer: 800,
											});  
											},10);
											window.setTimeout(function(){ 
												window.location.replace('index.php?page=useraccess');
											} ,800); </script>";
										} else {
											$this->koneksi->query("INSERT INTO user (id_user, username, password) VALUES('$id_user','$username','$password')");
											echo "<script>setTimeout(function () {
												swal({
													title: 'Data Tersimpan',
													type: 'success',
													showConfirmButton: false,
													timer: 800,
													});  
													},10);
													window.setTimeout(function(){ 
														window.location.replace('index.php?page=useraccess');
													} ,800); </script>";
												}
											}

											function select_user() {
												$select = $this->koneksi->query("SELECT id_user,username,password FROM user");
												while ($fetch = $select->fetch_assoc()) {
													$data[] = $fetch;
												}
												return $data;
											}

											function update_user($id_user, $username, $password){
												$this->koneksi->query("UPDATE user SET username='$username', password='$password' WHERE id_user='$id_user'") or die(mysqli_error($this->koneksi));
												echo "<script>setTimeout(function () { 
													swal({
														title: 'Data Berhasil Diupdate',
														type: 'success',
														showConfirmButton: false,
														timer: 800,
														});  
														},10); 
														window.setTimeout(function(){
															window.location.replace('index.php?page=useraccess');
														} ,800); </script>";
													}

													function del_user($id_user){
														$this->koneksi->query("DELETE FROM user WHERE id_user='$id_user'");
														echo "<script>setTimeout(function () {
															swal({
																title: 'Data Berhasil Dihapus',
																type: 'success',
																showConfirmButton: false,
																timer: 800,
																});  
																},10); 
																window.setTimeout(function(){ 
																	window.location.replace('index.php?page=useraccess');
																} ,800); </script>";
															}


															/*KAMERA*/
															function jum_kamera(){
																$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM kamera");
																while ($fetch = $select->fetch_assoc()) {
																	$data[] = $fetch;
																}
																return $data;
															}

															function add_kamera($id_kamera, $merk_kamera, $seri_kamera, $iso_max, $shutterspeed_max, $video_res, $megapixel, $jum_titikfokus, $battery_life, $harga, $foto){
																$cek = $this->koneksi->query("SELECT * FROM kamera WHERE seri_kamera='$seri_kamera'");
																if($cek->num_rows>0){
																	echo "<script>setTimeout(function () {
																		swal({
																			title: 'Data Sudah Ada',
																			type: 'error',
																			showConfirmButton: false,
																			timer: 800,
																			});
																			},10); 
																			window.setTimeout(function(){ 
																				window.location.replace('index.php?page=datakamera');
																			} ,800); </script>";
																		} else {
																			$nama_foto=$foto['name'];
																			$lokasi_foto=$foto['tmp_name'];
																			if (!empty($lokasi_foto)) {
																				move_uploaded_file($lokasi_foto, "../assets/img/$nama_foto");
																			}
																			$this->koneksi->query("INSERT INTO kamera(id_kamera, merk_kamera, seri_kamera, iso_max, shutterspeed_max, video_res, megapixel, jum_titikfokus, battery_life, harga, foto) VALUES ('$id_kamera','$merk_kamera','$seri_kamera','$iso_max','$shutterspeed_max','$video_res','$megapixel','$jum_titikfokus','$battery_life','$harga','$nama_foto')") or die(mysqli_error($this->koneksi));
																			echo "<script>setTimeout(function () { 
																				swal({
																					title: 'Data Tersimpan',
																					type: 'success',
																					showConfirmButton: false,
																					timer: 800,
																					});  
																					},10); 
																					window.setTimeout(function(){ 
																						window.location.replace('index.php?page=datakamera');
																					} ,800); </script>";
																				}
																			}	

																			function select_kamera() {
																				$select = $this->koneksi->query("SELECT * FROM kamera");
																				while ($fetch = $select->fetch_assoc()) {
																					$data[] = $fetch;
																				}
																				return $data;
																			}
																			/*UNTUK USER*/
																			function select_data_kamera() {
																				$select = $this->koneksi->query("SELECT * FROM kamera");
																				while ($fetch = $select->fetch_assoc()) {
																					$data[] = $fetch;
																				}
																				return $data;
																			}

																			function one_select_kamera($id_kamera){
																				$select=$this->koneksi->query("SELECT * FROM kamera WHERE id_kamera='$id_kamera';");
																				$fetch = $select->fetch_assoc();
																				return $fetch;
																			}

																			function update_kamera($id_kamera, $merk_kamera, $seri_kamera, $iso_max, $shutterspeed_max, $video_res, $megapixel, $jum_titikfokus, $battery_life, $harga, $foto){
																				$nama_foto=$foto['name'];
																				$lokasi_foto=$foto['tmp_name'];
																				if(!empty($lokasi_foto)){
																					$data_lama = $this->one_select_kamera(id_kamera);
																					$foto_lama = $data_lama['foto'];
																					if(file_exists("../assets/img/$foto_lama"))
																					{
																						unlink("../assets/img/$foto_lama");
																					}
																					move_uploaded_file($lokasi_foto,"../assets/img/$nama_foto");
																					$this->koneksi->query("UPDATE kamera SET id_kamera='$id_kamera', merk_kamera='$merk_kamera', seri_kamera='$seri_kamera', iso_max='$iso_max', shutterspeed_max='$shutterspeed_max', video_res='$video_res', megapixel='$megapixel', jum_titikfokus='$jum_titikfokus', battery_life='$battery_life', harga='$harga', foto='$nama_foto' WHERE id_kamera='$id_kamera'") or die(mysqli_error($this->koneksi));
																					echo "<script>setTimeout(function () { 
																						swal({
																							title: 'Data Berhasil Diupdate',
																							type: 'success',
																							showConfirmButton: false,
																							timer: 800,
																							});  
																							},10);
																							window.setTimeout(function(){ 
																								window.location.replace('index.php?page=datakamera');
																							} ,800); </script>";
																						}
																						else
																						{
																							$this->koneksi->query("UPDATE kamera SET id_kamera='$id_kamera', merk_kamera='$merk_kamera', seri_kamera='$seri_kamera', iso_max='$iso_max', shutterspeed_max='$shutterspeed_max', video_res='$video_res', megapixel='$megapixel', jum_titikfokus='$jum_titikfokus', battery_life='$battery_life', harga='$harga' WHERE id_kamera='$id_kamera'") or die(mysqli_error($this->koneksi));
																							echo "<script>setTimeout(function () {
																								swal({
																									title: 'Data Berhasil Diupdate',
																									type: 'success',
																									showConfirmButton: false,
																									timer: 800,
																									});  
																									},10); 
																									window.setTimeout(function(){ 
																										window.location.replace('index.php?page=datakamera');
																									} ,800); </script>";
																								}
																							}

																							function del_kamera($id_kamera){
																								$cek = $this->koneksi->query("SELECT * FROM kamera INNER JOIN perhitungan ON kamera.id_kamera = perhitungan.id_kamera WHERE kamera.id_kamera ='$id_kamera'");
																								if($cek->num_rows>0) {
																									echo "<script>setTimeout(function () {
																										swal({
																											title: 'Data Sedang Digunakan!',
																											type: 'warning',
																											showConfirmButton: false,
																											timer: 800,
																										});</script>";
																									} else {
																										$data_lama = $this->one_select_kamera($id_kamera);
																										$foto_lama = $data_lama['foto'];
																										if(file_exists("../assets/img/$foto_lama")) {
																											if($foto_lama != "default.png") {
																												unlink("../assets/img/$foto_lama");
																											}
																											$this->koneksi->query("DELETE FROM kamera WHERE id_kamera='$id_kamera'") or die(mysqli_error($this->koneksi));
																											echo "<script>setTimeout(function () {
																												swal({
																													title: 'Data Berhasil Dihapus',
																													type: 'success',
																													showConfirmButton: false,
																													timer: 800,
																													});
																													},10);
																													window.setTimeout(function(){
																														window.location.replace('index.php?page=datakamera');
																													} ,800); </script>";
																												} else {
																													$this->koneksi->query("DELETE FROM kamera WHERE id_kamera='$id_kamera'") or die(mysqli_error($this->koneksi));
																													echo "<script>setTimeout(function () {
																														swal({
																															title: 'Data Berhasil Dihapus',
																															type: 'success',
																															showConfirmButton: false,
																															timer: 800,
																															});
																															},10);
																															window.setTimeout(function(){
																																window.location.replace('index.php?page=datakamera');
																															} ,800); </script>";
																														}
																													}
																												}
																												



																												/*KRITERIA*/
																												function jum_kriteria(){
																													$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM kriteria");
																													while ($fetch = $select->fetch_assoc()) {
																														$data[] = $fetch;
																													}
																													return $data;
																												}

																												function add_kriteria($id_kriteria, $kriteria, $deskripsi){
																													$cek = $this->koneksi->query("SELECT * FROM kriteria WHERE kriteria='$kriteria'");
																													if($cek->num_rows>0){
																														echo "<script>setTimeout(function () {
																															swal({
																																title: 'Data Sudah Ada',
																																type: 'error',
																																showConfirmButton: false,
																																timer: 800,
																																});
																																},10);
																																window.setTimeout(function(){
																																	window.location.replace('index.php?page=datakriteria');
																																} ,800); </script>";
																															} else {
																																$this->koneksi->query("INSERT INTO kriteria (id_kriteria, kriteria, deskripsi) VALUES('$id_kriteria','$kriteria','$deskripsi')");
																																echo "<script>setTimeout(function () {
																																	swal({
																																		title: 'Data Tersimpan',
																																		type: 'success',
																																		showConfirmButton: false,
																																		timer: 800,
																																		});  
																																		},10);
																																		window.setTimeout(function(){
																																			window.location.replace('index.php?page=datakriteria');
																																		} ,800); </script>";
																																	}
																																}

																																function select_kriteria() {
																																	$select = $this->koneksi->query("SELECT * FROM kriteria");
																																	while ($fetch = $select->fetch_assoc()) {
																																		$data[] = $fetch;
																																	}
																																	return $data;
																																}

																																function update_kriteria($id_kriteria, $kriteria, $deskripsi){
																																	$this->koneksi->query("UPDATE kriteria SET kriteria='$kriteria', deskripsi='$deskripsi' WHERE id_kriteria='$id_kriteria'") or die(mysqli_error($this->koneksi));
																																	echo "<script>setTimeout(function () {
																																		swal({
																																			title: 'Data Berhasil Diupdate',
																																			type: 'success',
																																			showConfirmButton: false,
																																			timer: 800,
																																			});  
																																			},10); 
																																			window.setTimeout(function(){ 
																																				window.location.replace('index.php?page=datakriteria');
																																			} ,800); </script>";
																																		}

																																		function del_kriteria($id_kriteria){
																																			$this->koneksi->query("DELETE FROM kriteria WHERE id_kriteria='$id_kriteria'");
																																			echo "<script>setTimeout(function () { 
																																				swal({
																																					title: 'Data Berhasil Dihapus',
																																					type: 'success',
																																					showConfirmButton: false,
																																					timer: 800,
																																					});  
																																					},10); 
																																					window.setTimeout(function(){ 
																																						window.location.replace('index.php?page=datakriteria');
																																					} ,800); </script>";
																																				}



																																				/*PERHITUNGAN*/
																																				function jum_perhitungan(){
																																					$select = $this->koneksi->query("SELECT COUNT(*) AS jumlah FROM detail_perhitungan");
																																					while ($fetch = $select->fetch_assoc()) {
																																						$data[] = $fetch;
																																					}
																																					return $data;
																																				}

																																				function select_perhitungan() {
																																					$select = $this->koneksi->query("SELECT perhitungan.tanggal, kamera.merk_kamera, kamera.seri_kamera, detail_perhitungan.id_detail,detail_perhitungan.id_perhitungan,detail_perhitungan.skor_akhir FROM detail_perhitungan
																																						INNER JOIN kamera ON detail_perhitungan.id_kamera=kamera.id_kamera INNER JOIN perhitungan ON detail_perhitungan.id_perhitungan = perhitungan.id_perhitungan");
																																					while ($fetch = $select->fetch_assoc()) {
																																						$data[] = $fetch;
																																					}
																																					return $data;
																																				}
																																				
																																				function del_normalisasi($id_detail){
																																					$this->koneksi->query("DELETE FROM normalisasi WHERE id_detail='$id_detail'");
																																					
																																				}
																																				
																																				function del_perhitungan($id_perhitungan){
																																					
																																					$this->koneksi->query("DELETE FROM perhitungan WHERE id_perhitungan='id_perhitungan'");
																																					
																																				}
																																				

																																				function del_detail_perhitungan($id_detail){
																																					$this->koneksi->query("DELETE FROM detail_perhitungan WHERE id_detail='$id_detail'");
																																					echo "<script>setTimeout(function () { 
																																						swal({
																																							title: 'Data Berhasil Dihapus',
																																							type: 'success',
																																							showConfirmButton: false,
																																							timer: 800,
																																							});  
																																							},10); 
																																							window.setTimeout(function(){ 
																																								window.location.replace('index.php?page=dataperhitungan');
																																							} ,800); </script>";
																																						}
																																						



																																						/*USER*/
																																						function select_kriteria_rekomendasi() {
																																							$select = $this->koneksi->query("SELECT * FROM kriteria");
																																							while ($fetch = $select->fetch_assoc()) {
																																								$data[] = $fetch;
																																							}
																																							return $data;
																																						}
																																						
																																						function select_pertanyaan() {
																																							$select = $this->koneksi->query("SELECT kriteria.id_kriteria, kriteria.kriteria, pertanyaan.id_pertanyaan, pertanyaan.pertanyaan FROM pertanyaan INNER JOIN kriteria ON pertanyaan.id_kriteria = kriteria.id_kriteria ORDER BY id_pertanyaan;");
																																							while ($fetch = $select->fetch_assoc()) {
																																								$data[] = $fetch;
																																							}
																																							return $data;
																																						}
																																						
																																						








																																					}
																																					$data = new user($con);
																																					?>