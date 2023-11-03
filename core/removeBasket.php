<?php

include '../config.php';

if($_POST){

	$id = $_POST['urun'];


	if(!empty($id)){
		$query = $db->prepare("DELETE FROM shop_basket WHERE id = :id ");
			$delete = $query->execute(array(
			   'id' => $id
			));
			if($delete){
				echo "silindi!";
			}else{
				echo "hata!";
			}
	}

}else{
	echo "yetkisiz erişim.";
}