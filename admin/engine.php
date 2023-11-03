<?php

session_start();
ob_start();

require ('config.php');

if(isset($_SESSION['admin'])){
	$admin = $db->query("SELECT * FROM admins WHERE email = '{$_SESSION['adminmail']}'")->fetch(PDO::FETCH_ASSOC);
}
$us = $db->query("SELECT * FROM user_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);