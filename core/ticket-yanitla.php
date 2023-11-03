<?php

include '../config.php';

if($_POST){

	$yanit = $_POST['yanit'];
	$ticket = $_POST['ticket'];

		if(empty($ticket)){
			echo json_encode(["t"=>"error","m"=>"hata!"]);
		}elseif(empty($yanit)){
			echo json_encode(["t"=>"warning","m"=>"Yanıtınızı girin..."]);
		}else{
			$query = $db->prepare("INSERT INTO ticket_chat SET
				ticket_id = ?,
				sender = ?,
				message = ?");
				$insert = $query->execute(array(
				     $ticket,
				     1,
				     $yanit
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();



				    $query = $db->prepare("UPDATE tickets SET
						status = :s
						WHERE id = :id");
						$update = $query->execute(array(
						     "id" => $ticket,
						     "s" => 3
						));
						if ( $update ){
						      echo json_encode(["t"=>"success","m"=>"Yanıt gönderildi.","ok"=>true]);
						}else{
					echo json_encode(["t"=>"error","m"=>"Sistem hatası!"]);
				}




				   
				}
		}

}else{
	echo "yetkisiz erişim.";
}