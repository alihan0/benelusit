<?php 

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];

	if($islem == "yanitla"){
		$yanit = $_POST['yanit'];
		$ticket = $_POST['ticket'];

		if(empty($yanit)){
			echo json_encode(["stat"=>"warning","message"=>"Yanıtınızı girin"]);
		}else{
			$query = $db->prepare("INSERT INTO ticket_chat SET
				ticket_id = ?,
				sender = ?,
				message = ?");
				$insert = $query->execute(array(
				     $ticket,
				     2,
				     $yanit
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				    

				    $query2 = $db->prepare("UPDATE tickets SET
						status = :s
						WHERE id = :id");
						$update = $query2->execute(array(
						     "id" => $ticket,
						     "s" => 2
						));
						if ( $update ){
						    echo json_encode(["stat"=>"success","message"=>"Yanıtınız gönderildi.","ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
						}



				}
		}
	}elseif($islem == "kapat"){
		$ticket = $_POST['ticket'];

		if(empty($ticket)){
			echo json_encode(["stat"=>"error","message"=>"Hata!"]);
		}else{
			$query = $db->prepare("INSERT INTO ticket_chat SET
				ticket_id = ?,
				sender = ?,
				message = ?");
				$insert = $query->execute(array(
				     $ticket,
				     0,
				     "Destek talebi kapatıldı."
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				    

				    $query2 = $db->prepare("UPDATE tickets SET
						status = :s
						WHERE id = :id");
						$update = $query2->execute(array(
						     "id" => $ticket,
						     "s" => 0
						));
						if ( $update ){
						    echo json_encode(["stat"=>"success","message"=>"Talep kapatıldı.","ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
						}



				}
		}
	}
}