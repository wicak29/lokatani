<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if($result = $mysqli->query("SELECT * FROM lahan")) {
		$respon["lahan"]=array();
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
			$lahan = array();
			$lahan["id_lahan"] = $row["id_lahan"];
			$lahan["nama_lahan"] = $row["nama_lahan"];
			$lahan["tipe_lahan"] = $row["tipe_lahan"];
			$lahan["luas_lahan"] = $row["luas_lahan"];
			$lahan["gambar_lahan"] = $row["gambar_lahan"];
			$lahan["lokasi_lahan"] = $row["lokasi_lahan"];

			array_push($respon["lahan"], $lahan);
			
		}
		$respon["sukses"] = 1;
                    echo json_encode($respon);
	}
	else {
		$respon["sukses"] = 0;
		$respon["pesan"] = "Tidak ada data";

		echo json_encode($respon);
	}
?>	