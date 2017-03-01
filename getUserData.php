<?php

	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	//if(isset($_GET["username"])) {

		//$idBarang = $_GET['idBarang'];

		if($result = $mysqli->query("SELECT * FROM user ")) {
			$respon["user"]=array();
			while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$user = array();
				$user["id_user"] = $row["id_user"];
				$user["username"] = $row["username"];
				$user["password"] = $row["password"];
				$user["email"] = $row["email"];
				$user["tgl_lahir"] = $row["tgl_lahir"];
				$user["tempat_lahir"] = $row["tempat_lahir"];
				$user["no_hp"] = $row["no_hp"];
				$user["nama"] = $row["nama"];

				array_push($respon["user"], $user);
				
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