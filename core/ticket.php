<?php

include '../config.php';

if($_POST){

	$user = $_POST['user'];
	$dep  = $_POST['departman'];
	$konu = $_POST['konu'];
	$once = $_POST['aciliyet'];
	$mesaj = $_POST['mesaj'];
	$date = date("Y-m-d H:i:s");

		if(empty($user)){
			echo json_encode(["t"=>"error","m"=>"Kullanıcı bilgisi tanınmadı!"]);
		}elseif($dep == 0){
			echo json_encode(["t"=>"warning","m"=>"Departman Seçin!"]);
		}elseif(empty($konu) || empty($mesaj)){
			echo json_encode(["t"=>"warning","m"=>"Konu ve mesaj alanı önemlidir!"]);
		}elseif($once == 0){
			echo json_encode(["t"=>"warning","m"=>"Öncelik Belirtin!"]);
		}else{
			$query = $db->prepare("INSERT INTO tickets SET
				user = ?,
				departman = ?,
				konu = ?,
				aciliyet = ?,
				status = ?,
				created_at = ?
				");
				$insert = $query->execute(array(
				    $user,
				    $dep,
				    $konu,
				    $once,
				    1,
				    $date
				));
				if ( $insert ){
				    $tid = $db->lastInsertId();
				  	

				    $query2 = $db->prepare("INSERT INTO ticket_chat SET
						ticket_id = ?,
						sender = ?,
						message = ?");
						$insert2 = $query2->execute(array(
						    $tid,
						    0,
						    "Destek Kaydı Oluşturuldu."
						));
						if ( $insert2 ){


						    $query3 = $db->prepare("INSERT INTO ticket_chat SET
								ticket_id = ?,
								sender = ?,
								message = ?");
								$insert3 = $query3->execute(array(
								    $tid,
								    1,
								    $mesaj
								));
								if ( $insert3 ){
								    $last_id = $db->lastInsertId();
								    echo json_encode(["t"=>"success","m"=>"Destek talebi oluşturuldu.","ok"=>true]);
								}else{
									echo json_encode(["t"=>"error","m"=>"Sistem hatası!"]);
								}




						}



				}
		}

}else{
	echo "yetkisiz erişim.";
}