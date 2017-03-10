<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['nama_event']) && isset($_POST['waktu_mulai']) && isset($_POST['deskripsi'])) {
		$nama = $_POST['nama'];
		$tipe = $_POST['tipe'];
		$luas = $_POST['luas'];
		$lokasi = $_POST['lokasi'];
		
	if (isset($_POST['gambar'])) $gambar = $_POST['gambar'];
	else $gambar = NULL;

		if($result = $mysqli->query("INSERT INTO event(nama_event, waktu_mulai, waktu_akhir, deskripsi) VALUES ('$nama_event', '$waktu_mulai', '', '$deskripsi')")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil membuat event";

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