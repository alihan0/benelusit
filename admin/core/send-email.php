<?php

include '../config.php';
use phpmailer\PHPMailer\PHPMailer;
			use phpmailer\PHPMailer\Exception;
			use phpmailer\PHPMailer\SMTP;

			// Gerekli dosyaları include ediyoruz
			require '../phpmailer/PHPMailer.php';
			require '../phpmailer/Exception.php';
			require '../phpmailer/SMTP.php';


if($_POST){
	$id = $_POST['oid'];
	$mesaj = $_POST['n'];

		if(empty($mesaj)){
			echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"Boş mesaj gönderemezsiniz!"]);
		}else{
			
$m = $db->query("SELECT * FROM mail_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$u = $db->query("SELECT * FROM users WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = $m['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $m['username'];
    $mail->Password   = $m['password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $m['port'];
    $mail->setFrom($m['username'], $m['sender']);
    $mail->isHTML(true);
    $mail->CharSet = $m['charset'];
    $mail->addAddress($u['email'], $u['user_firstname'] .' '.$u['user_lastname'] );
    $mail->Subject = 'Sistem E-postası';
    $mail->Body    = $mesaj;
    $mail->send();
    
    echo json_encode(["icon"=>"success","title"=>"Başarılı!","html"=>"E-postanız başarıyla gönderildi!"]);

    
} catch (Exception $e) {
    echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>$mail->ErrorInfo]);
}











		}
}