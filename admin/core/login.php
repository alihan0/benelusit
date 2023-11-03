<?php
session_start();

require ('../config.php');

if($_POST){
	
	$mail = $_POST["mail"];
	$sifre = $_POST["pass"];
	$pass = md5(sha1($sifre)).sha1(md5($sifre));
	$date = date("Y-m-d H:i:s");

		if(empty($mail) || empty($sifre)){
			echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın!"]);
		}else{
			$query = $db->query("SELECT * FROM admins WHERE email = '{$mail}' && password = '{$pass}'")->fetch(PDO::FETCH_ASSOC);
			if($query){
				if($query['status'] != 1){
					echo json_encode(["stat"=>"error", "message"=>"Oturum açma yetkiniz bulunmuyor!"]);
				}else{
					$_SESSION['admin'] = true;
					$_SESSION['adminmail'] = $mail;
					echo json_encode(["stat"=>"success", "message"=>"Başarıyla oturum açtınız...", "ok"=>true]);
				}
			}else{
				echo json_encode(["stat"=>"warning", "message"=>"E-Posta ya da şifre hatalı!"]);
			}
		}
}else{
	echo "yetkisiz erişim";
}