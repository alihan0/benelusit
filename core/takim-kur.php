<?php

include '../config.php';

if($_POST){
	$tag = $_POST['tag'];
	$isim = $_POST['isim'];
	$slogan = $_POST['slogan'];
	$user = $_POST['user_id'];
	$date = date("Y-m-d H:i:s");

	if(empty($user)){
		echo json_encode(["t"=>"warning","m"=>"Lütfen yeniden oturum açın..."]);
	}elseif(empty($isim) or empty($tag) or empty($slogan)){
		echo json_encode(["t"=>"warning","m"=>"Lütfen boş alan bırakmayın!"]);
	}else{
		$query = $db->query("SELECT * FROM teams WHERE team_captain = '{$user}'")->fetch(PDO::FETCH_ASSOC);
		$query2 = $db->query("SELECT * FROM team_members WHERE user_id = '{$user}'")->fetch(PDO::FETCH_ASSOC);
		if($query){
			echo json_encode(["t"=>"warning","m"=>"Zaten bir takımın kaptanısınz!"]);
		}elseif($query2){
			echo json_encode(["t"=>"warning","m"=>"Zaten bir takıma üyesiniz!"]);
		}else{
			$query = $db->prepare("INSERT INTO teams SET
				team_name = ?,
				team_captain = ?,
				team_tag = ?,
				team_slogan = ?,
				team_point = ?,
				team_status = ?,
				created_at = ?
				");
				$insert = $query->execute(array(
				    $isim,
				    $user,
				    $tag,
				    $slogan,
				    0,
				    1,
				    $date
				));
				if ( $insert ){
				    $last_id = $db->lastInsertId();

				    $query2 = $db->prepare("INSERT INTO team_members SET
						team_id = ?,
						user_id = ?,
						user_position = ?,
						user_inviting = ?,
						membership_status = ?,
						created_at = ?
						");
						$insert = $query2->execute(array(
						    $last_id,
						    $user,
						    1,
						    $user,
						    2,
						    $date
						));

				    echo json_encode(["t"=>"success","m"=>"Başarıyla takım kuruldu!", "ok"=>true]);
				}else{
					echo json_encode(["t"=>"error","m"=>"Sistem Hatası!"]);
				}
		}

	}

		
}else{
	echo "yetkisiz erişim.";
}