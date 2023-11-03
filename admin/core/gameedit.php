<?php

include '../config.php';

if($_POST){

		$id = $_POST['id'];
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

				$query = $db->prepare("UPDATE games SET
					game_name = ?,
					game_desc = ?,
					game_platform = ?,
					game_cover = ?,
					game_categori = ?,
					game_official_web = ?,
					game_kind = ?
					WHERE id = ?");
					$update = $query->execute(array(
					     $oyunAdi,
					    $oyunAciklama,
					    $oyunPlatformu,
					    $game_cover_path,
					    $oyunKategorisi,
					    $oyunWeb,
					    $oyunTuru,
					    $id
					));
					if ( $update ){
					   	echo json_encode(["stat"=>"success", "message"=>"Oyun Güncellendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}

			}
	

}else{
	echo "yetkisiz erişim.";
}