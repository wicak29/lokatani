<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id'])) {
	    $id_user = $_GET['id'];

	    if($result = $mysqli->query("SELECT * FROM user WHERE id_user='$id_user'; ")) {
	    	$row = mysqli_fetch_row($result);
	    	$user = array();
	    	
	    	$user['id_user'] = $row[0];
	    	$user['username'] = $row[1];
	    	$user['password'] = $row[2];
	    	$user['email'] = $row[3];
	    	$user['no_hp'] = $row[6];
	    	$user['nama'] = $row[7];
			
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