<?php
session_start();

include 'config.php';
$sess = session_id();


$siparis = [
	"urunler" => []
];
$query = $db->query("SELECT * FROM shop_basket WHERE sessid = '{$sess}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){


         array_push($siparis["urunler"], $row['urun_id']);
     }
}


$order = json_encode($siparis);

echo $order;