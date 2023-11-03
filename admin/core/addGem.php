<?php

include '../config.php';


if($_POST){
	$oid = $_POST['oid'];
	$gem = $_POST['n'];


$query = $db->query("SELECT * FROM users WHERE id = '{$oid}'")->fetch();

	if($query){

		$eski = $query['user_gem'];

		$yeni = $eski + $gem;

			$query = $db->prepare("UPDATE users SET user_gem = :gem WHERE id = :id");
$update = $query->execute(array("gem" => $yeni, "id" => $oid));

if($update){
	echo json_encode(["icon"=>"success","title"=>"Başarıyla Gem Yüklendi","html"=>"Yüklenen Gem: $gem <br> Yeni Miktar: $yeni","ok"=>true]);
}else{
	echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"Gem eklenemedi!"]);
}


	}else{
		echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"Kullanıcı bulunamadı!"]);
	}

}