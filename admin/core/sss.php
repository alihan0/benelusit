<?php

include '../config.php';

if($_POST){

	$islem = $_POST['islem'];

	if($islem == "ekle"){
		$soru = $_POST['soru'];
		$cevap = $_POST['cevap'];

			if(empty($soru) || empty($cevap)){
				echo json_encode(["stat"=>"warning","message"=>"Boş alan bırakmayın!"]);
			}else{
				$query = $db->prepare("INSERT INTO faq SET
					ask = ?,
					answer = ?");
					$insert = $query->execute(array(
					    $soru,
					    $cevap
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					    echo json_encode(["stat"=>"success","message"=>"Soru eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error","message"=>"Sistem hatası!"]);
					}
			}
	}elseif($islem == "sil"){
		$id = $_POST['sss'];

			$query = $db->prepare("DELETE FROM faq WHERE id = :id");
			$delete = $query->execute(array(
			   'id' => $id
			));
			if($delete){
				echo json_encode(["stat"=>"success","message"=>"Soru silindi.","ok"=>true]);
			}else{
						echo json_encode(["stat"=>"error","message"=>"Sistem hatası!"]);
					}
	}

}else{
	echo "yetkisiz erişim.";
}