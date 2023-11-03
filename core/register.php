<?php
session_start();

include '../config.php';

$gem = $us['user_starting_gem'];
$point = $us['user_starting_point'];

if($_POST){
	$ad = $_POST['ad'];
	$soyad = $_POST['soyad'];
	$kadi = $_POST['kadi'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$pw = md5($pass);
	$date = date("Y-m-d H:i:s");
	$token = md5($kadi);

		if(empty($ad) or empty($soyad) or empty($kadi) or empty($mail) or empty($pass)){
			echo json_encode(["t"=>"warning","m"=>"Lütfen boş alan bırakmayın"]);
		}else{
			$query = $db->query("SELECT * FROM users WHERE email = '{$mail}'")->fetch(PDO::FETCH_ASSOC);
			if($query){
				echo json_encode(["t"=>"warning","m"=>"E-posta adresi zaten kayıtlı!"]);
			}else{
				$query2 = $db->query("SELECT * FROM users WHERE username = '{$kadi}'")->fetch(PDO::FETCH_ASSOC);
				if($query2){
					echo json_encode(["t"=>"warning","m"=>"Bu kullanıcı adı kullanılıyor..."]);
				}else{
					$query = $db->prepare("INSERT INTO users SET
						username = ?,
						email = ?,
						password = ?,
						user_firstname = ?,
						user_lastname = ?,
						user_point = ?,
						user_gem = ?,
						user_status = ?,
						user_token = ?,
						user_key = ?,
						created_at = ?
						");
						$insert = $query->execute(array(
						    $kadi,
						    $mail,
						    $pw,
						    $ad,
						    $soyad,
						    $point,
						    $gem,
						    2,
						    $token,
						    $pw,
						    $date
						));
						if ( $insert ){
						    $last_id = $db->lastInsertId();
						    echo json_encode(["t"=>"success","m"=>"Hesap başarıyla oluşturuldu", "ok"=>true]);
						}else{
							$hata = $db->errorInfo();
							echo json_encode(["t"=>"error","m"=>$hata]);
						}
				}
			}

		}
}else{
	echo "yetkisiz erişim";
}