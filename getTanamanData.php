<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if($result = $mysqli->query("SELECT * FROM tanaman ")) {
		$respon["tanaman"]=array();
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
			$tanaman = array();
			$tanaman["id_tanaman"] = $row["id_tanaman"];
			$tanaman["nama_tanaman"] = $row["nama_tanaman"];
			$tanaman["jenis_tanaman"] = $row["jenis_tanaman"];
			$tanaman["harga_satuan"] = $row["harga_satuan"];
			$tanaman["gambar"] = $row["gambar"];

			array_push($respon["tanaman"], $tanaman);
		}
		$respon["sukses"] = 1;
		$respon["pesan"] = "Berhasil";
	}
	else {
		$respon["sukses"] = 0;
		$respon["pesan"] = "Tidak ada data";
	}
	echo json_encode($respon);
?>	