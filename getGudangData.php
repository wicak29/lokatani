<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	//if(isset($_GET["username"])) {

		//$idBarang = $_GET['idBarang'];

		if($result = $mysqli->query("SELECT * FROM gudang ")) {
			$respon["gudang"]=array();
			while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$gudang = array();
				$gudang["id_gudang"] = $row["id_gudang"];
				$gudang["nama_gudang"] = $row["nama_gudang"];
				$gudang["jumlah_kapasitas"] = $row["jumlah_kapasitas"];
				$gudang["lokasi_gudang"] = $row["lokasi_gudang"];

				array_push($respon["gudang"], $gudang);
				
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