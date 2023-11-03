<?php

// Düzenleme: Domainhizmetleri.com

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Gerekli dosyaları include ediyoruz
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'config.php';


$m = $db->query("SELECT * FROM mail_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

$mail = new PHPMailer(true);

try {
    //SMTP Sunucu Ayarları
    $mail->SMTPDebug = 0;										// DEBUG Kapalı: 0, DEBUG Açık: 2 // Detaylı bilgi için: https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
    $mail->isSMTP();											// SMTP gönderimi kullan
    $mail->Host       = $m['host'];				// Email sunucu adresi. Genellikle mail.domainadi.com olarak kullanilir. Bu adresi hizmet saglayiciniza sorabilirsiniz
    $mail->SMTPAuth   = true;									// SMTP kullanici dogrulama kullan
    $mail->Username   = $m['username'];				// SMTP sunucuda tanimli email adresi
    $mail->Password   = $m['password'];							// SMTP email sifresi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;			// SSL icin `PHPMailer::ENCRYPTION_SMTPS` kullanin. SSL olmadan 587 portundan gönderim icin `PHPMailer::ENCRYPTION_STARTTLS` kullanin
    $mail->Port       = $m['port'];									// Eger yukaridaki deger `PHPMailer::ENCRYPTION_SMTPS` ise portu 465 olarak guncelleyin. Yoksa 587 olarak birakin
    $mail->setFrom($username, $sender); // Gonderen bilgileri yukaridaki $mail->Username ile aynı deger olmali
     $mail->isHTML(true); // Gönderimi HTML türde olsun istiyorsaniz TRUE ayarlayin. Düz yazı (Plain Text) icin FALSE kullanin
    $mail->CharSet = $m['charset'];

    
} catch (Exception $e) {
    echo "Ops! Email iletilemedi. Hata: {$mail->ErrorInfo}";
}