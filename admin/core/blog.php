<?php 

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];

	if($islem == "cat-ekle"){
		$cat = $_POST['cat'];

		if(empty($cat)){
			echo json_encode(["stat"=>"warning","message"=>"Kategori adını girin"]);
		}else{
			$query = $db->prepare("INSERT INTO blog_categories SET
				cat_name = ?
				");
				$insert = $query->execute(array(
				     $cat
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				      echo json_encode(["stat"=>"success","message"=>"Kategori eklendi.","ok"=>true]);
				}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
						}
		}
	}elseif($islem == "cat-sil"){
		$id = $_POST['id'];

		if(empty($id)){
			echo json_encode(["stat"=>"error","message"=>"Hata!"]);
		}else{
			
			$query = $db->prepare("DELETE FROM blog_categories WHERE id = :id");
				$delete = $query->execute(array(
				   'id' => $id
				));
				if($delete){
					echo json_encode(["stat"=>"success","message"=>"Kategori silindi", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error","message"=>"Sistem hatası!"]);
				}
			
		}
	}elseif($islem == "yazi-ekle"){
		$cat = $_POST['cat'];
		$title = $_POST['title'];
		$yazi = $_POST['yazi'];
		$cover = $_POST['cover'];
		$date = date("Y-m-d");

			if($cat == 0){
				echo json_encode(["stat"=>"warning","message"=>"Kategori Seçin"]);
			}elseif(empty($title) || empty($yazi) || empty($cover)){
				echo json_encode(["stat"=>"warning","message"=>"Boş alan bırakmayın"]);
			}else{
				$query = $db->prepare("INSERT INTO blog_posts SET
					blog_cat = ?,
					blog_title = ?,
					blog_desc = ?,
					blog_cover = ?,
					created_at = ?
					");
					$insert = $query->execute(array(
					    $cat,
					    $title,
					    $yazi,
					    $cover,
					    $date
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					    echo json_encode(["stat"=>"success","message"=>"Yazı eklendi", "ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "yazi-sil"){
		$id = $_POST['id'];

		if(empty($id)){
			echo json_encode(["stat"=>"error","message"=>"Hata!"]);
		}else{
			
			$query = $db->prepare("DELETE FROM blog_posts WHERE id = :id");
				$delete = $query->execute(array(
				   'id' => $id
				));
				if($delete){
					echo json_encode(["stat"=>"success","message"=>"Kategori silindi", "ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error","message"=>"Sistem hatası!"]);
				}
			
		}
	}
}