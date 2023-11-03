<?php
include '../config.php';

if($_POST){
	$date = date("Y-m-d H:i:s");
	$sess = $_POST['sessid'];
	$urun = $_POST['urun'];


$u = $db->query("SELECT * FROM shop_product WHERE id = '{$urun}'")->fetch(PDO::FETCH_ASSOC);
$price = $u['p_price'];

			$query = $db->prepare("INSERT INTO shop_basket SET
				sessid = ?,
				urun_id = ?,
				price = ?,
				created_at = ?");
				$insert = $query->execute(array(
				    $sess,
				    $urun,
				    $price,
				    $date
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				   	echo json_encode(["t"=>"success","m"=>"Ürün sepete eklendi."]);
				}else{
					echo json_encode(["t"=>"error","m"=>"Sistem hatası"]);
				}
		


}else{
	echo "yetkisiz erişim.";
}