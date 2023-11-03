<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=benelusit_db", "benelusit_user", "hanq1w2e3a1s2d3");
     $db->query("SET CHARACTER SET utf8");
} catch ( PDOException $e ){
     print $e->getMessage();
}


$seo = $db->query("SELECT * FROM seo_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$bank = $db->query("SELECT * FROM banka_bilgileri WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$us = $db->query("SELECT * FROM user_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$user = $db->query("SELECT * FROM users WHERE id = '{$_SESSION['uid']}'")->fetch(PDO::FETCH_ASSOC);
$ranks = $db->query("SELECT * FROM user_ranks WHERE id = '{$user['user_rank']}'")->fetch(PDO::FETCH_ASSOC);


$profil_durum = 1;
if(
  (empty($user['user_birthdate']) && $us['force_birthday_entry'] == 1 ) || 
  (empty($user['user_phone']) && $us['force_phone_entry'] == 1 ) ||
  ($user['email_verify'] == 0 && $us['force_email_verify'] == 1 ) ||
  ($user['phone_verify'] == 0 && $us['force_phone_verify'] == 1 ) 
){
     $profil_durum = 0;
}else{
$profil_durum = 1;
}

//echo $profil_durum;