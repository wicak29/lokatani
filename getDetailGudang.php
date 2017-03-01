<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id'])) {
	    $id_gudang = $_GET['id'];

	    if($result = $mysqli->query("SELECT * FROM gudang WHERE id_gudang='$id_gudang'; ")) {
	    	$row = mysqli_fetch_row($result);
	    	$gudang = array();
	    	
	    	$user['id_gudang'] = $row[0];
	    	$user['nama_gudang'] = $row[1];
	    	$user['jumlah_kapasitas'] = $row[2];
	    	$user['lokasi_gudang'] = $row[3];
			
			$respon["user"]=$user;
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