<?php

include '../config.php';

if($_POST){

	$u = $_POST['user_id'];
	$t = $_POST['team_id'];
	$date = date("Y-m-d H:i:s");

	if(empty($u)){
		echo json_encode(["t"=>"warning","m"=>"Hata: Lütfen yeniden oturum açın!"]);
	}elseif(empty($t)){
		echo json_encode(["t"=>"warning","m"=>"Takım bilgisi bulunamadı!"]);
	}else{
		$query = $db->query("SELECT * FROM team_applications WHERE user_id = '{$u}' AND team_id = '{$t}'")->fetch(PDO::FETCH_ASSOC);
		if($query){
			echo json_encode(["t"=>"warning","m"=>"Bu takıma daha önce başvurmuşsunuz."]);
		}else{
			$query = $db->prepare("INSERT INTO team_applications SET
				team_id = ?,
				user_id = ?,
				status = ?,
				created_at = ?
				");
				$insert = $query->execute(array(
				    $t,
				    $u,
				    1,
				    $date
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();
				    echo json_encode(["t"=>"success","m"=>"Başvurunuz alındı!","ok"=>true]);
				}else{
					echo json_encode(["t"=>"error","m"=>"Sistem Hatası!"]);
				}
		}

	}
	

}else{
	echo "yetkisiz erişim";
}