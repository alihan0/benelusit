<?php

include '../config.php';

if($_POST){


	$ticket = $_POST['ticket'];

		if(empty($ticket)){
			echo json_encode(["t"=>"error","m"=>"hata!"]);
		}else{
	


				    $query = $db->prepare("UPDATE tickets SET
						status = :s
						WHERE id = :id");
						$update = $query->execute(array(
						     "id" => $ticket,
						     "s" => 0
						));
						if ( $update ){


$query = $db->prepare("INSERT INTO ticket_chat SET
ticket_id = ?,
sender = ?,
message = ?");
$insert = $query->execute(array(
    $ticket, 0,"Destek talebi kapatıldı."
));
if ( $insert ){
    $last_id = $db->lastInsertId();
   echo json_encode(["t"=>"success","m"=>"Destek talebi kapatıldı.","ok"=>true]);
}else{
					echo json_encode(["t"=>"error","m"=>"Sistem hatası!"]);
				}


						      
						}




				   
				
		}

}else{
	echo "yetkisiz erişim.";
}