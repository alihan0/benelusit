<?php 

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];

	if($islem == "ok"){
		$id = $_POST['id'];

		if(empty($id)){
			echo json_encode(["stat"=>"error","message"=>"hata"]);
		}else{


				    $query2 = $db->prepare("UPDATE shop_order SET
						status = :s
						WHERE id = :id");
						$update = $query2->execute(array(
						     "id" => $id,
						     "s" => 2
						));
						if ( $update ){
						    echo json_encode(["stat"=>"success","message"=>"Sipariş onaylandı.","ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
						}



				
		}
	}elseif($islem == "red"){
		$id = $_POST['id'];

		if(empty($id)){
			echo json_encode(["stat"=>"error","message"=>"Hata!"]);
		}else{

				    $query2 = $db->prepare("UPDATE shop_order SET
						status = :s
						WHERE id = :id");
						$update = $query2->execute(array(
						     "id" => $id,
						     "s" => 0
						));
						if ( $update ){
						    echo json_encode(["stat"=>"success","message"=>"Sipariş reddedildi.","ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
						}



				
		}
	}
}