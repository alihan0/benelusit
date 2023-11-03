<?php
session_start();

include '../config.php';

if($_POST){
	$kadi = $_POST['kadi'];
	$pass = $_POST['pass'];
	$pw = md5($pass);
	$date = date("Y-m-d H:i:s");

		if( empty($kadi) or empty($pass)){
			echo json_encode(["t"=>"warning","m"=>"Lütfen boş alan bırakmayın"]);
		}else{




				$query2 = $db->query("SELECT * FROM users WHERE username = '{$kadi}' && password = '{$pw}'")->fetch(PDO::FETCH_ASSOC);
				if($query2){

					if($us['user_login_permission'] != 1){
						echo json_encode(["t"=>"error","m"=>"Kullanıcılar şuan oturum açamaz!"]);
					}elseif($query2['user_status'] == 0){
						echo json_encode(["t"=>"error","m"=>"Oturum açma yetkiniz bulunmuyor!"]);
					}elseif($query2['user_status'] == 1){

						$_SESSION['login'] = true;
						$_SESSION['user'] = $kadi;
						$_SESSION['uid'] = $query2['id'];
						echo json_encode(["t"=>"warning","m"=>"Hesabınız askıya alındığı için yetkileriniz kısıtlanmıştır.","ok"=>true]);
						
					}else{
						$_SESSION['login'] = true;
						$_SESSION['user'] = $kadi;
						$_SESSION['uid'] = $query2['id'];
						echo json_encode(["t"=>"success","m"=>"Başarıyla giriş yaptınız.","ok"=>true]);
					}



					
					
				}else{
					echo json_encode(["t"=>"warning","m"=>"Bu kullanıcı adı ya da şifre hatalı"]);
				}
			

		}
}else{
	echo "yetkisiz erişim";
}