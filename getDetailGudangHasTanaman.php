<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);

	include('connection.php');
	$respon = array();

	if (isset($_GET['id_gudang'])) {
	    $id_gudang = $_GET['id_gudang'];

	    if($result = $mysqli->query("SELECT gudang_has_tanaman.gudang_id_gudang,
				gudang_has_tanaman.tanaman_id_tanaman,
				gudang_has_tanaman.jumlah,
				gudang.nama_gudang,
				gudang.lokasi_gudang,
				tanaman.nama_tanaman,
				tanaman.harga_satuan,
				tanaman.gambar
			FROM gudang_has_tanaman
				JOIN gudang 
					ON	gudang_has_tanaman.gudang_id_gudang=gudang.id_gudang
				JOIN tanaman
					ON gudang_has_tanaman.tanaman_id_tanaman=tanaman.id_tanaman
			WHERE gudang_has_tanaman.gudang_id_gudang = '".$id_gudang."';")) 
	    {
			$respon["detail_gudang_has_tanaman"]=array();
			while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$detail = array();
				$detail["id_gudang"] = $row["gudang_id_gudang"];
				$detail["id_tanaman"] = $row["tanaman_id_tanaman"];
				$detail["nama_gudang"] = $row["nama_gudang"];
				$detail["lokasi_gudang"] = $row["lokasi_gudang"];
				$detail["nama_tanaman"] = $row["nama_tanaman"];
				$detail["harga_satuan"] = $row["harga_satuan"];
				$detail["jumlah_di_gudang"] = $row["jumlah"];
				$detail["gambar"] = $row["gambar"];

				array_push($respon["detail_gudang_has_tanaman"], $detail);
				
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