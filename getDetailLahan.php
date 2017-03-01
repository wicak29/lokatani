<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id_lahan'])) {
	    $id_lahan = $_GET['id_lahan'];

	    if($result = $mysqli->query("SELECT * FROM lahan WHERE id_lahan='$id_lahan'; ")) {
	    	$row = mysqli_fetch_row($result);
	    	$lahan = array();
	    	
	    	$lahan['id_lahan'] = $row[0];
	    	$lahan['nama_lahan'] = $row[1];
	    	$lahan['tipe_lahan'] = $row[2];
	    	$lahan['luas_lahan'] = $row[3];
	    	$lahan['gambar_lahan'] = $row[4];
	    	$lahan['lokasi_lahan'] = $row[5];
			
			$respon["lahan"]=$lahan;
			$respon["sukses"] = 1;
		}
		else {
			$respon["sukses"] = 0;
			$respon["pesan"] = "Tidak ada data";
		}
	}
	else {
	    $respon["pesan"] = "Terjadi kesalahan";
	}
	echo json_encode($respon);
?>	