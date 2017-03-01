<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['no_hp'])) {
		$username = $_POST['username'];
		$nama = $_POST['fullname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$no_hp = $_POST['no_hp'];

		if($result = $mysqli->query("INSERT INTO user(username, password, email, no_hp, nama)
			VALUES ('$username','$password','$email', '$no_hp','$nama')")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil menambah data Pengguna";

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