<?php
$con = mysqli_connect("localhost","root","","tugasakhir") or die(mysqli_error()); 
$sql= mysqli_query($con,"SELECT * FROM kamera WHERE id_kamera=".$_GET['id_kamera']."") or die(mysqli_error($con));

//$res = array();
while($data = mysqli_fetch_array($sql)){
	$res = $data;
}
//print_r($res);
echo json_encode($res);
?>