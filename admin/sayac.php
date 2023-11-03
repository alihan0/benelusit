<?php

$Fiyat=$db->prepare("SELECT SUM(tutar) AS takma_ad FROM odeme_bildirimi WHERE status = 2");
$Fiyat->execute();
$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);


$sorgu1 = $db->prepare("SELECT COUNT(*) FROM games");
$sorgu1->execute();
$say1 = $sorgu1->fetchColumn();

$sorgu2 = $db->prepare("SELECT COUNT(*) FROM users");
$sorgu2->execute();
$say2 = $sorgu2->fetchColumn();

$sorgu3 = $db->prepare("SELECT COUNT(*) FROM odeme_bildirimi");
$sorgu3->execute();
$say3 = $sorgu3->fetchColumn();

$sorgu4 = $db->prepare("SELECT COUNT(*) FROM odeme_bildirimi WHERE status = 1");
$sorgu4->execute();
$say4 = $sorgu4->fetchColumn();

$sorgu5 = $db->prepare("SELECT COUNT(*) FROM tickets");
$sorgu5->execute();
$say5 = $sorgu5->fetchColumn();

$sorgu6 = $db->prepare("SELECT COUNT(*) FROM tickets WHERE status = 1");
$sorgu6->execute();
$say6 = $sorgu6->fetchColumn();

$sorgu7 = $db->prepare("SELECT COUNT(*) FROM shop_order");
$sorgu7->execute();
$say7 = $sorgu7->fetchColumn();

$sorgu8 = $db->prepare("SELECT COUNT(*) FROM shop_order WHERE status = 1");
$sorgu8->execute();
$say8 = $sorgu8->fetchColumn();