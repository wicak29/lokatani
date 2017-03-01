<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id_lahan'])) {
	    $id_lahan = $_GET['id_lahan'];
	    $jenis_transaksi = $_GET['jenis_transaksi'];

	    if($result = $mysqli->query("SELECT transaksi_lahan.*, 
				lahan.id_lahan,
				lahan.nama_lahan
			FROM transaksi_lahan, lahan
			WHERE transaksi_lahan.lahan_id_lahan = lahan.id_lahan
			AND transaksi_lahan.lahan_id_lahan = '$id_lahan'
			AND transaksi_lahan.jenis_transaksi = '$jenis_transaksi';")) {
			$respon["transaksi_lahan"]=array();
			while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$transaksi_lahan = array();
				$transaksi_lahan["id_transaksi_lahan"] = $row["id_transaksi_lahan"];
				$transaksi_lahan["nama_transaksi"] = $row["nama_transaksi"];
				$transaksi_lahan["jenis_transaksi"] = $row["jenis_transaksi"];
				$transaksi_lahan["jumlah_transaksi"] = $row["jumlah_transaksi"];
				$transaksi_lahan["waktu_transaksi"] = $row["waktu_transaksi"];
				$transaksi_lahan["lahan_id_lahan"] = $row["lahan_id_lahan"];
				$transaksi_lahan["nama_lahan"] = $row["nama_lahan"];

				array_push($respon["transaksi_lahan"], $transaksi_lahan);
				
			}
			$respon["sukses"] = 1;
		}
		else {
			$respon["sukses"] = 0;
			$respon["pesan"] = "Tidak ada data";	
		}
	}
	else {
		$respon["pesan"] = "Terjadi kesalahan";
	}
	
	echo json_encode($respon);
?>	