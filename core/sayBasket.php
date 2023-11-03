<?php
include "../config.php";
session_start();
$sess = session_id();
$sorgu = $db->prepare("SELECT COUNT(*) FROM shop_basket WHERE sessid = '{$sess}'");
$sorgu->execute();
$say = $sorgu->fetchColumn();
echo $say;