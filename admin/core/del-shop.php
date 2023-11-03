<?php

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];

	if($islem == "product"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM shop_product WHERE id = :id");
			$delete = $query->execute(array(
			   'id' => $id
			));

			if ( $delete ){
				   echo json_encode(["stat"=>"success", "message"=>"Ürün Silindi!", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
				}
	}elseif($islem == "category"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM shop_categories WHERE id = :id");
			$delete = $query->execute(array(
			   'id' => $id
			));

			if ( $delete ){
				   echo json_encode(["stat"=>"success", "message"=>"Kategori Silindi!", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
				}
	}elseif($islem == "gem"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM gem_packages WHERE id = :id");
			$delete = $query->execute(array(
			   'id' => $id
			));

			if ( $delete ){
				   echo json_encode(["stat"=>"success", "message"=>"Gem Paketi Silindi!", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
				}
	}
}