<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id_gudang']) && isset($_GET['id_tanaman'])) {
	    $id_gudang = $_GET['id_gudang'];
	    $id_tanaman = $_GET['id_tanaman'];

	    if($result = $mysqli->query("SELECT jumlah 
				FROM gudang_has_tanaman
				WHERE gudang_id_gudang = '$id_gudang'
				AND tanaman_id_tanaman = '$id_tanaman' ;")) {
	    	$row = mysqli_fetch_row($result);
	    	$tanaman = array();
			
			$respon["jumlah"]=$row[0];
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