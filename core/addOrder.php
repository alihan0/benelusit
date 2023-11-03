<?php 
session_start();

include '../config.php';
$date = date("Y-m-d H:i:s");
if($_POST){
	if(!isset($_SESSION['login'])){
		echo json_encode(["login"=>true]);
	}else{
		$sess = $_POST['sess'];

$Fiyat=$db->prepare("SELECT SUM(price) AS takma_ad FROM shop_basket WHERE sessid = '{$sess}'");
$Fiyat->execute();
$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);


		$u = $db->query("SELECT * FROM users WHERE id = '{$_SESSION['uid']}'")->fetch(PDO::FETCH_ASSOC);
		$bakiye = $u['user_gem'];



		if($FiyatYaz["takma_ad"] > $bakiye){
			echo json_encode(["t"=>"warning","m"=>"Yeterli bakiye yok!"]);
		}elseif($u['shop_permission'] == 0){
			echo json_encode(["t"=>"warning","m"=>"Alışveriş yapabilmek için en az 1 turnuvaya katılmasınız!"]);
		}else{
			$kalan = $bakiye - $FiyatYaz["takma_ad"];

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




			//BAKİYEYİ GÜNCELLE
			$query = $db->prepare("UPDATE users SET
				user_gem = :yeni
				WHERE id = :id");
				$update = $query->execute(array(
				     "yeni" => $kalan,
				     "id" => $_SESSION['uid']
				));
				if ( $update ){
				     


					$query2 = $db->prepare("INSERT INTO shop_order SET
					user_id = ?,
					order_list = ?,
					status = ?,
					created_at = ?");
					$insert = $query2->execute(array(
					    $_SESSION['uid'],
					    $order,
					    1,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();


					    $query3 = $db->prepare("DELETE FROM shop_basket WHERE sessid = :id");
						$delete = $query3->execute(array(
						   'id' => $sess
						));

						if($delete){
							echo json_encode(["t"=>"success","m"=>"Sipariş başarıyla oluşturuldu.", "devam"=>true]);
						}else{
							echo json_encode(["t"=>"error","m"=>"Sistem Hatası!"]);
						}
					   
					}
				}
		}
	}
}else{

}