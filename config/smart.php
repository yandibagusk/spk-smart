<?php

class Smart {
	private $con;
	function __construct($con) {
		$this->con = $con;
	}


	/*
	* Mengambil data dari database berdasarkan id kamera yang dipilih
	* @param Array $id
	* return data kamera
	*/

	/*Memilih kamera yang akan dibandingkan*/
	function getDataset($id) {
		$dataWhere = "";
		$IDs = "";

		for($i = 0; $i < sizeof($id); $i++) {
			if($IDs == "") {
				$IDs = "'" . $id[$i] . "'";
			}else {
				$IDs = $IDs . ",'" . $id[$i] . "'";
			}
		}
		$dataWhere = "WHERE id_kamera IN (". $IDs. ")";
		$data = $this->con->query("SELECT * FROM kamera  $dataWhere");
		while ($fetch = $data->fetch_assoc()) {
			$result[] = $fetch;
		}
		return $result;
	}

	/*Memberikan bobot pada masing masing kriteria*/
	function setBobot($idKriteria, $bobot) {
		$result = array (
			'id_kriteria' => $idKriteria,
			'bobot' => $bobot
		);
		return $result;
	}

	/*Menghitung normalisasi bobot*/
	function normalisasi($idKriteria, $bobot) {
		$data = $this->setBobot($idKriteria, $bobot);
		$jum = 0;
		$normalisasi = array();
		for($i = 0; $i < sizeof($data['bobot']); $i++){
			$jum += $data['bobot'][$i];
		}
		for($i = 0; $i < sizeof($data['bobot']); $i++) {
			$temp_normal = 0;
			$temp_normal = $data['bobot'][$i] / $jum;
			array_push($normalisasi, $temp_normal);
		}
		$result = array(
			'id_kriteria' => $idKriteria,
			'bobot' => $bobot,
			'normalisasi' => $normalisasi
		);
		return $result;
	}

	/*Menentukan nilai Sub Kriteria sesuai dengan value kriteria*/
	function setSubKriteria($idKriteria, $id) {
		$dataset = $this->getDataset($id);
		$subKriteria = array();
		// $subKriteria['KAMREA1'][0] = 20;

		for($i = 0; $i < sizeof($dataset); $i++) {
			// array_push($subKriteria, $dataset[$i]['id_kamera']);
			for($j = 0; $j < sizeof($idKriteria); $j++) {
				if($j == 0) {
					if( $dataset[$i]['iso_max'] > 25000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['iso_max'] > 15000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['iso_max'] > 5000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}

				if($j == 1) {
					if( $dataset[$i]['shutterspeed_max'] > 5000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['shutterspeed_max'] > 3000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['shutterspeed_max'] > 1000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
					
				}

				if($j == 2) {
					if( $dataset[$i]['video_res'] > 2160) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['video_res'] > 1920) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['video_res'] > 720) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}

				if($j == 3) {
					if( $dataset[$i]['megapixel'] > 30) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['megapixel'] > 20) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['megapixel'] > 10) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}

				if($j == 4) {
					if( $dataset[$i]['jum_titikfokus'] > 150) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['jum_titikfokus'] > 100) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['jum_titikfokus'] > 50) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}

				if($j == 5) {
					if( $dataset[$i]['battery_life'] > 400) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['battery_life'] > 250) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['battery_life'] > 100) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}

				if($j == 6) {
					if( $dataset[$i]['harga'] > 15000000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 4;
					}else if($dataset[$i]['harga'] > 10000000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 3;
					}
					else if($dataset[$i]['harga'] > 5000000) {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 2;
					}else {
						$subKriteria[$dataset[$i]['id_kamera']]['subkriteria'][$j] = 1;
					}
				}
			}
		}
		return $subKriteria;
	}

	/*Menghitung Utilities Score dengan Rumus = (Cout-Cmin)/(Cmax-Cmin)*/
	function getValueUtilities ($idKriteria, $id){
		$data = $this->setSubKriteria($idKriteria, $id);

		$temp_data = array();

		foreach ($idKriteria as $key => $value) {
			$temp_data[] =  $key;
		}

		for($i = 0; $i < sizeof($data); $i++) {
			$max = max($data[$id[$i]]['subkriteria']);
			$min = min($data[$id[$i]]['subkriteria']);
			for ($j = 0; $j < sizeof($idKriteria); $j++) { 
				if($j == $temp_data[$j]) {
					$cout = ($data[$id[$i]]['subkriteria'][$j] - $min) / ($max - $min);
					$data[$id[$i]]['value_utilities'][$j] = $cout;
				}
			}
		}
		return $data;
		
	}

	/*Mengalikan Utilities Score dengan Normalisasi*/
	function getScore($idKriteria, $id, $bobot){
		$data = $this->getValueUtilities($idKriteria, $id);
		$normalisasi = $this->normalisasi($idKriteria, $bobot);
		$temp_data = array();

		foreach ($idKriteria as $key => $value) {
			$temp_data[] =  $key;
		}

		for($i = 0; $i < sizeof($data); $i++) {
			for ($j = 0; $j < sizeof($idKriteria) ; $j++) { 
				if($j == $temp_data[$j]) {
					$total = $data[$id[$i]]['value_utilities'][$j] * $normalisasi['normalisasi'][$j];
					$data[$id[$i]]['normalisasi'][$j] = $normalisasi['normalisasi'][$j];
					$data[$id[$i]]['total'][$j] = $total;
				}
			}
		}

		return $data;
	}

	/*Mendapatkan score akhir perhitungan*/
	function getTotalScore ($idKriteria, $id, $bobot) {
		$data = $this->getScore($idKriteria, $id, $bobot);
		$temp_data = array();

		for($i = 0; $i < sizeof($data); $i++) {
			$temp_data[] =  $i;
		}

		for($i = 0; $i < sizeof($data); $i++) {
			if($i == $temp_data[$i]) {
				$score = array_sum($data[$id[$i]]['total']);
				$data[$id[$i]]['final_score'][0] = $score;

			}
		}

		return $data;
	}

	function createPerhitungan() {
		$data = $this->con->query("INSERT INTO perhitungan VALUES()");
		if($data) {
			return true;
		}else{
			return false;
		}
	}

	function getLastIdPerhitungan() {
		$data = $this->con->query("SELECT id_perhitungan FROM perhitungan ORDER BY id_perhitungan DESC LIMIT 1");
		$result = $data->fetch_assoc();
		return $result['id_perhitungan'];
	}

	function getLastIdDetailPerhitungan() {
		$data = $this->con->query("SELECT id_detail FROM detail_perhitungan ORDER BY id_detail DESC LIMIT 1");
		$result = $data->fetch_assoc();
		return $result['id_detail'];
	}

	function insertPerhitungan($idKriteria, $id, $bobot) {
		$createPerhitungan = $this->createPerhitungan();
		if($createPerhitungan) {
			$id_perhitungan = $this->getLastIdPerhitungan();
			$perhitungan = $this->getTotalScore($idKriteria, $id, $bobot);
			$isInsert = false;
			$isInsertNormal = false;

			for ($i = 0; $i < sizeof($perhitungan); $i++) { 
				$temp_kamera = $id[$i];
				$temp_score = $perhitungan[$id[$i]]['final_score'][0];
				$data = $this->con->query("INSERT INTO 
					detail_perhitungan (id_perhitungan, id_kamera, skor_akhir) 
					VALUES ('$id_perhitungan', '$temp_kamera', '$temp_score')
					");

				$isInsert = $data ? true : false;

				if($isInsert) {
					$id_detail = $this->getLastIdDetailPerhitungan();
					for($j = 0; $j < sizeof($idKriteria); $j++) {
						$temp_normalisasi = $perhitungan[$id[$i]]['normalisasi'][$j];
						$temp_utility = $perhitungan[$id[$i]]['value_utilities'][$j];

						$dataNormal = $this->con->query("INSERT INTO 
							normalisasi (id_detail, normalisasi, utility_score) 
							VALUES ('$id_detail', '$temp_normalisasi', '$temp_utility')
							");	

						$isInsertNormal = $dataNormal ? true : false;

						if(!$isInsertNormal){
							return false;
							die();
						}		
					}

				}else{
					return false;
					die();
				}

			}
			$SMART = array (
				'id_kamera'=> $id,
				'id_kriteria' => $idKriteria,
				'bobot' => $bobot,
				'perhitungan' =>$perhitungan
			);

			$result = array(
				true,
				'data' => $SMART
			);
			return $result;
		}else {
			return false;
			die();
		}
	}
}

$con = new mysqli("localhost","root","","tugasakhir");   
$smart = new Smart($con);

?>