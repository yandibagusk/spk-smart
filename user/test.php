<?php
include_once ('../config/Smart.php');
// print_r ($smart->getDataset($_POST['id']));
// print_r ($smart->setBobot($_POST['id_kriteria'], $_POST['bobot']));
// print_r ($smart->normalisasi($_POST['id_kriteria'], $_POST['bobot']));
print_r ($smart->insertPerhitungan($_POST['id_kriteria'], $_POST['id'], $_POST['bobot']));
// print_r ($smart->getLastId());

?>
