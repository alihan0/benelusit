<?php

include '../config.php';

if($_POST){
	$oid = $_POST['oid'];
	$gem = $_POST['n'];


$query = $db->query("SELECT * FROM users WHERE id = '{$oid}'")->fetch();

	if($query){

		$eski = $query['user_point'];

		$yeni = $eski + $gem;

			$query = $db->prepare("UPDATE users SET user_point = :gem WHERE id = :id");
$update = $query->execute(array("gem" => $yeni, "id" => $oid));

if($update){
	echo json_encode(["icon"=>"success","title"=>"Başarıyla Puan Yüklendi","html"=>"Yüklenen Puan: $gem <br> Yeni Miktar: $yeni","ok"=>true]);
}else{
	echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"Puan eklenemedi!"]);
}


	}else{
		echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"Kullanıcı bulunamadı!"]);
	}

}