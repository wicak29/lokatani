<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['nama_gudang']) && isset($_POST['kapasitas']) && isset($_POST['lokasi'])) {
		$nama_gudang = $_POST['nama_gudang'];
		$kapasitas = $_POST['kapasitas'];
		$lokasi = $_POST['lokasi'];

		if($result = $mysqli->query("INSERT INTO gudang(nama_gudang, jumlah_kapasitas, lokasi_gudang)
			VALUES ('$nama_gudang','$kapasitas','$lokasi')")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil menambah data gudang";

			echo json_encode($respon);
		}
		else {
			$respon["sukses"] = 0;
			$respon["pesan"] = "Gagal Menambah Data";

			echo json_encode($respon);
		}
	}
	else {
		$respon["sukses"] = 0;
		$respon["pesan"] = "Ada data yang kosong";

		echo json_encode($respon);
	}
?>