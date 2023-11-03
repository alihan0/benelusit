<?php

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];

	if($islem == "kategoriEkle"){
		$kategoriAdi = $_POST['kategoriAdi'];
		$kategoriDesc = $_POST['kategoriDesc'];
		$date = date("Y-m-d H:i:s");

			if(empty($kategoriAdi)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kategori adı girin!"]);
			}else{
				$query = $db->prepare("INSERT INTO game_categories SET
					categori_name = ?,
					categori_desc = ?,
					created_at = ?");
					$insert = $query->execute(array(
					    $kategoriAdi,
					    $kategoriDesc,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Kategori Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "turEkle"){
		$turAdi = $_POST['turAdi'];
		$turDesc = $_POST['turDesc'];
		$date = date("Y-m-d H:i:s");

			if(empty($turAdi)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir tür adı girin!"]);
			}else{
				$query = $db->prepare("INSERT INTO game_kinds SET
					kind_name = ?,
					kind_desc = ?,
					created_at = ?");
					$insert = $query->execute(array(
					    $turAdi,
					    $turDesc,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Tür Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "platformEkle"){
		$platformAdi = $_POST['platformAdi'];
		$platformDesc = $_POST['platformDesc'];
		$date = date("Y-m-d H:i:s");

			if(empty($platformAdi)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir platform adı girin!"]);
			}else{
				$query = $db->prepare("INSERT INTO game_platforms SET
					platform_name = ?,
					platform_desc = ?,
					created_at = ?");
					$insert = $query->execute(array(
					    $platformAdi,
					    $platformDesc,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Platform Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "oyunEkle"){
		$oyunKategorisi = $_POST['oyunKategorisi'];
		$oyunPlatformu = $_POST['oyunPlatformu'];
		$oyunTuru = $_POST['oyunTuru'];
		$oyunAdi = $_POST['oyunAdi'];
		$oyunAciklama = $_POST['oyunAciklama'];
		$oyunWeb = $_POST['oyunWeb'];
		$game_cover_path = $_POST['game_cover_path'];
		$date = date("Y-m-d H:i:s");

			if($oyunKategorisi == 0){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kategori seçin!"]);
			}elseif($oyunPlatformu == 0){
				echo json_encode(["stat"=>"warning", "message"=>"Bir platform seçin!"]);
			}elseif($oyunTuru == 0){
				echo json_encode(["stat"=>"warning", "message"=>"En az bir oyun türü seçin!"]);
			}elseif(empty($oyunAdi)){
				echo json_encode(["stat"=>"warning", "message"=>"Oyun adı girin"]);
			}elseif(empty($oyunAciklama)){
				echo json_encode(["stat"=>"warning", "message"=>"Oyun açıklaması girin"]);
			}elseif(empty($oyunWeb)){
				echo json_encode(["stat"=>"warning", "message"=>"Oyunun websitesini girin"]);
			}elseif(empty($game_cover_path)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kapak görseli yükleyin"]);
			}else{
				$query = $db->prepare("INSERT INTO games SET
					game_name = ?,
					game_desc = ?,
					game_platform = ?,
					game_cover = ?,
					game_categori = ?,
					game_official_web = ?,
					game_kind = ?,
					created_at = ?
					");
					$insert = $query->execute(array(
					    $oyunAdi,
					    $oyunAciklama,
					    $oyunPlatformu,
					    $game_cover_path,
					    $oyunKategorisi,
					    $oyunWeb,
					    $oyunTuru,
					    $date,
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Oyun Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "mapEkle"){
		$mapAdi = $_POST['mapAdi'];
		$mapimg = $_POST['mapimg'];
		$oyun = $_POST['oyun'];
		$date = date("Y-m-d H:i:s");

			if(empty($mapAdi) || $oyun == 0){
				echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın"]);
			}elseif(empty($mapimg)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kapak görseli yükleyin"]);
			}else{
				$query = $db->prepare("INSERT INTO game_maps SET
					game_id = ?,
					map_name = ?,
					map_cover = ?,
					created_at = ?
					");
					$insert = $query->execute(array(
					    $oyun,
					    $mapAdi,
					    $mapimg,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Harita Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}


}else{
	echo "yetkisiz erişim.";
}