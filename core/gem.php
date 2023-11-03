<?php 
session_start();
include '../config.php';

if($_POST){

	$gonderen = $_POST['gonderen'];
	$user = $_SESSION['uid'];
	$tutar = $_POST['tutar'];
	$tarih = $_POST['tarih'];
	$saat  = $_POST['saat'];
	$paket = $_POST['paket'];
	$date  = date("Y-m-d H:i:s");

		if(empty($gonderen) || empty($tutar) || empty($tarih) || empty($saat)){
			echo json_encode(["t"=>"warning", "m"=>"Tüm alanlar gereklidir!"]);
		}elseif(empty($user)){
			echo json_encode(["t"=>"warning", "m"=>"Kullanıcı bilgisi tanınmadı!"]);
		}else{
			$query = $db->prepare("INSERT INTO odeme_bildirimi SET
				user = ?,
				paket = ?,
				gonderen = ?,
				tutar = ?,
				tarih = ?,
				saat = ?,
				status = ?,
				created_at = ?
				");
				$insert = $query->execute(array(
				    $user,
				    $paket,
				    $gonderen,
				    $tutar,
				    $tarih,
				    $saat,
				    1,
				    $date
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				    echo json_encode(["t"=>"success", "m"=>"Bildiriminiz Alındı!", "ok"=>true]);
				}else{
					echo json_encode(["t"=>"error", "m"=>"Sistem Hatası!"]);
				}
			}
}else{
	echo "yetkisiz erişim.";
}