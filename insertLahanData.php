<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['nama']) && isset($_POST['tipe']) && isset($_POST['luas']) && isset($_POST['lokasi'])) {
		$nama = $_POST['nama'];
		$tipe = $_POST['tipe'];
		$luas = $_POST['luas'];
		$lokasi = $_POST['lokasi'];
		
	if (isset($_POST['gambar'])) $gambar = $_POST['gambar'];
	else $gambar = NULL;

		if($result = $mysqli->query("INSERT INTO lahan(nama_lahan, tipe_lahan, luas_lahan, gambar_lahan, lokasi_lahan)
			VALUES ('$nama','$tipe','$luas', '$gambar','$lokasi')")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil menambah data lahan";

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