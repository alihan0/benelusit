<?php

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];
	$date = date("Y-m-d H:i:s");

	if($islem == "grupEkle"){
		$grupadi = $_POST['grupadi'];
		$yetki = $_POST['grupyetki'];
		if(empty($grupadi)){
			echo json_encode(["stat"=>"warning", "message"=>"Bir grup adı girin!"]);
		}elseif(empty($yetki)){
			echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
		}else{
			$query = $db->prepare("INSERT INTO admin_groups SET
				group_name = ?,
				group_auths = ?,
				created_at = ?");
				$insert = $query->execute(array(
				    $grupadi,
				    $yetki,
				    $date
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				   echo json_encode(["stat"=>"success", "message"=>"Yönetici grubu eklendi!", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
				}
		}
	}elseif($islem == "adminEkle"){
		 $ad = $_POST['ad'];
		 $soyad = $_POST['soyad'];
		 $grup = $_POST['grup'];
		 $mail = $_POST['email'];
		 $sifre = $_POST['sifre'];
		 $pass = md5(sha1($sifre)).sha1(md5($sifre));

		 	if($grup == 0){
		 		echo json_encode(["stat"=>"warning", "message"=>"Yönetici grubu seçin"]);
		 	}elseif(empty($ad) || empty($soyad) || empty($mail) || empty($sifre)){
		 		echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın!"]);
		 	}else{
		 		$query = $db->query("SELECT * FROM admins WHERE email = '{$mail}'")->fetch(PDO::FETCH_ASSOC);
		 		if($query){
		 			echo json_encode(["stat"=>"warning", "message"=>"E-posta kullanılıyor!"]);
		 		}else{
		 			$query = $db->prepare("INSERT INTO admins SET
						first_name = ?,
						last_name = ?,
						email = ?,
						password  = ?,
						admin_group = ?,
						status = ?,
						last_login = ?,
						created_at = ?
						");
						$insert = $query->execute(array(
						    $ad,
						    $soyad,
						    $mail,
						    $pass,
						    $grup,
						    1,
						    $date,
						    $date
						));
						if ( $insert ){
						    $last_id = $db->lastInsertId();
						   echo json_encode(["stat"=>"success", "message"=>"Yönetici başarıyla eklendi!", "ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
						}
		 		}
		 	}
	}
}else{
	echo "yetkisiz erişim.";
}