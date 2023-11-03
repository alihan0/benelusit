<?php

include '../config.php';
if($_POST){

	$islem = $_POST['islem'];
	$date = date("Y-m-d H:i:s");

	if($islem == "kategori-ekle"){

		$cat_name = $_POST['cat_name'];
		$cat_parent = $_POST['cat_parent'];
		$cat_desc = $_POST['cat_desc'];

		if(empty($cat_name)){
			echo json_encode(["stat"=>"warning", "message"=>"Bir kategori adı girmek zorundasınız!"]);
		}else{
			$query = $db->prepare("INSERT INTO shop_categories SET
			main_cat = ?,
			cat_name = ?,
			cat_desc = ?");
			$insert = $query->execute(array(
			     $cat_parent,
			     $cat_name,
			     $cat_desc
			));
			if ( $insert ){
			    $last_id = $db->lastInsertId();
			   echo json_encode(["stat"=>"success", "message"=>"Kategori Eklendi!", "ok"=>true]);
			}else{
				echo json_encode(["stat"=>"error", "message"=>"Sistem hatası!"]);
			}
		}
	}elseif($islem == "urun-ekle"){
		$p_name = $_POST['p_name'];
		$p_cat = $_POST['p_cat'];
		$p_price = $_POST['p_price'];
		$p_pic = $_POST['p_pic'];
		$p_desc = $_POST['p_desc'];

			if(empty($p_name) || empty($p_cat) || empty($p_price) || empty($p_pic) || empty($p_desc)){
				echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın!"]);
			}else{
				$query = $db->prepare("INSERT INTO shop_product SET
					p_cat = ?,
					p_name = ?,
					p_desc = ?,
					p_price = ?,
					p_pic = ?
					");
					$insert = $query->execute(array(
					  	$p_cat,
					  	$p_name,
					  	$p_desc,
					  	$p_price,
					  	$p_pic
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					     echo json_encode(["stat"=>"success", "message"=>"Ürün Eklendi!", "ok"=>true]);
					}else{
				echo json_encode(["stat"=>"error", "message"=>"Sistem hatası!"]);
			}
			}
	}elseif($islem == "urun-guncelle"){
		$id = $_POST['id'];
		$p_name = $_POST['p_name'];
		$p_cat = $_POST['p_cat'];
		$p_price = $_POST['p_price'];
		$p_pic = $_POST['p_pic'];
		$p_desc = $_POST['p_desc'];

		if(empty($id) || empty($p_name) || empty($p_cat) || empty($p_price) || empty($p_pic) || empty($p_desc)){
				echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın!"]);
			}else{

				$query = $db->prepare("UPDATE shop_product SET
					p_cat = :cat,
					p_name = :name,
					p_desc = :pdesc,
					p_price = :price,
					p_pic = :pic
					WHERE id = :id");
					$update = $query->execute(array(
					    "id" => $id,
					    "cat" => $p_cat,
					    "name" => $p_name,
					    "pdesc" => $p_desc,
					    "price" => $p_price,
					    "pic" => $p_pic
					));
					if ( $update ){
					     echo json_encode(["stat"=>"success", "message"=>"Ürün başarıyla güncellendi","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}

			}
	}elseif($islem == "shop-settings"){
		$s1 = $_POST['s1'];
		$s2 = $_POST['s2'];
		$s3 = $_POST['s3'];
		$s4 = $_POST['s4'];

			$query = $db->prepare("UPDATE shop_settings SET
				min_shop_price = :min_shop_price,
				min_shop_number = :min_shop_number,
				login_required = :login_required,
				tournament_required	 = :tournament_required	
				WHERE id = :id");
				$update = $query->execute(array(
				    "min_shop_price" => $s3,
				    "min_shop_number" => $s4,
				    "login_required" => $s1,
				    "tournament_required" => $s2,
				    "id" => 1
				));
				if ( $update ){
				    echo json_encode(["stat"=>"success", "message"=>"Ayarlar başarıyla güncellendi","ok"=>true]);
				}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
	}
}else{
	echo "yetkisiz erişim";
}