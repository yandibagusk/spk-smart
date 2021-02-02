<?php
include 'koneksi.php';
class Utils {
	private $con;
	function __construct($con) {
		$this->con = $con;
	}

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
    
    function getKamera($id_kamera) {
        $data = $this->con->query("SELECT * FROM kamera  where id_kamera = '$id_kamera'");
        $fetch = $data->fetch_assoc();
        $res = $fetch;
        
        return $res['merk_kamera'] . ' ' . $res['seri_kamera'];
    }

    function getKriteria($id_kriteria) {
        $data = $this->con->query("SELECT * FROM kriteria  where id_kriteria = '$id_kriteria'");
        $fetch = $data->fetch_assoc();
        $res = $fetch;
        
        return $res['kriteria'];
    }
}
$utils = new Utils($con);

?>