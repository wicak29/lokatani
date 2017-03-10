<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['nama_transaksi']) && isset($_POST['jenis_transaksi']) && isset($_POST['jumlah_transaksi']) && isset($_POST['id_lahan'])) {
		$nama_transaksi = $_POST['nama_transaksi'];
		$jenis = $_POST['jenis_transaksi'];
		$jumlah_transaksi = $_POST['jumlah_transaksi'];
		$waktu = date('Y-m-d H:i:s');
		$id_lahan = $_POST['id_lahan'];

		if($result = $mysqli->query("INSERT INTO transaksi_lahan(nama_transaksi, jenis_transaksi, jumlah_transaksi, waktu_transaksi, lahan_id_lahan)
			VALUES ('$nama_transaksi','$jenis','$jumlah_transaksi', '$waktu', '$id_lahan')")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil menyimpan transaksi";

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