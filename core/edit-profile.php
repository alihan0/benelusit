<?php

include '../config.php';

if($_POST){
	$user = $_POST['user'];
	$ad = $_POST['ad'];
	$soyad = $_POST['soyad'];
	$dt = $_POST['dt'];
	$gsm = $_POST['gsm'];
	$c1 = $_POST['city'];
	$c2 = $_POST['country'];
	$steam = $_POST['steam'];
	$ps = $_POST['ps'];

		if(empty($user)){
			echo json_encode(["t"=>"error","m"=>"Sistem Hatası: Yeniden oturum açın!"]);
		}elseif(empty($ad) or empty($soyad)){
			echo json_encode(["t"=>"warning","m"=>"Adınızı boş bırakmayın!"]);
		}else{
			if($us['force_phone_entry'] == 1 && empty($gsm)){
				echo json_encode(["t"=>"warning","m"=>"Telefon numarası girmek zorundasınız!"]);
			}elseif($us['force_birthday_entry'] == 1 && empty($dt)){
				echo json_encode(["t"=>"warning","m"=>"Doğum tarihinizi girmek zorundasınız!"]);
			}else{
				if( strlen($gsm) < 10 || strlen($gsm) > 10){
					echo json_encode(["t"=>"warning","m"=>"Telefon numaranızı 10 haneli olarak girin"]);
				}else{
					$query = $db->prepare("UPDATE users SET
						user_firstname = :a1,
						user_lastname = :a2,
						user_phone = :a3,
						user_birthdate = :a4,
						user_city = :a5,
						user_country = :a6,
						steam = :s,
						playstation = :ps
						WHERE id = :u");
						$update = $query->execute(array(
						     "u" => $user,
						     "a1" => $ad,
						     "a2" => $soyad,
						     "a3" => $gsm,
						     "a4" => $dt,
						     "a5" => $c1,
						     "a6" => $c2,
						     "s" => $steam,
						     "ps" => $ps
						));
						if ( $update ){
						    echo json_encode(["t"=>"success","m"=>"Bilgileriniz başarıyla güncellendi!", "ok"=>true]);
						}else{
							echo json_encode(["t"=>"error","m"=>"Sistem Hatası!"]);
						}
				}
			}
		}
}else{
	echo "yetkisiz erişim.";
}