<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$result = $mysqli->query("SELECT * FROM user
			WHERE username='$username'
			AND password='$password';");
			
		if ($result->num_rows>0) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Login berhasil";

			echo json_encode($respon);
		}
		else {
			$respon["sukses"] = 0;
			$respon["pesan"] = "Username dan password salah";

			echo json_encode($respon);
		}
	}
	else {
		$respon["sukses"] = 0;
		$respon["pesan"] = "Ada data yang kosong";

		echo json_encode($respon);
	}
?>