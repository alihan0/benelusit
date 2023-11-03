<?php

include '../config.php';

if($_POST){
	$islem = $_POST['islem'];
	$date  = date("Y-m-d H:i:s");

	if($islem == "rankEkle"){
		$rankAdi = $_POST['rankAdi'];
		$rankimg = $_POST['rankimg'];
		$point = $_POST['point'];

			if(empty($rankAdi) || empty($point)){
				echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın"]);
			}elseif(empty($rankimg)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kapak görseli yükleyin"]);
			}else{
				$query = $db->prepare("INSERT INTO user_ranks SET
					rank_name = ?,
					rank_picture = ?,
					rank_point = ?
					");
					$insert = $query->execute(array(
					    $rankAdi,
					    $rankimg,
					    $point
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Rütbe Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "rankEkle2"){
		$rankAdi = $_POST['rankAdi'];
		$rankimg = $_POST['rankimg'];
		$point = $_POST['point'];

			if(empty($rankAdi) || empty($point)){
				echo json_encode(["stat"=>"warning", "message"=>"Boş alan bırakmayın"]);
			}elseif(empty($rankimg)){
				echo json_encode(["stat"=>"warning", "message"=>"Bir kapak görseli yükleyin"]);
			}else{
				$query = $db->prepare("INSERT INTO team_ranks SET
					rank_name = ?,
					rank_picture = ?,
					rank_point = ?
					");
					$insert = $query->execute(array(
					    $rankAdi,
					    $rankimg,
					    $point
					));
					if ( $insert ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Rütbe Eklendi!","ok"=>true]);
					}else{
						echo json_encode(["stat"=>"error", "message"=>"Sistem Hatası!"]);
					}
			}
	}elseif($islem == "user_settings"){
		$us1	=	$_POST['us1'];
		$us2	=	$_POST['us2'];
		$us3	=	$_POST['us3'];
		$us4	=	$_POST['us4'];
		$us5	=	$_POST['us5'];
		$us6	=	$_POST['us6'];
		$us7	=	$_POST['us7'];
		$us8	=	$_POST['us8'];
		$us9	=	$_POST['us9'];
		$us10	=	$_POST['us10'];
		$us11	=	$_POST['us11'];
		$us12	=	$_POST['us12'];
		$us13	=	$_POST['us13'];
		$us14	=	$_POST['us14'];
		$us15	=	$_POST['us15'];
		$us16	=	$_POST['us16'];
		$us17	=	$_POST['us17'];
		$us18	=	$_POST['us18'];
		$us19	=	$_POST['us19'];
		$us20	=	$_POST['us20'];
		$us21	=	$_POST['us21'];

		$query = $db->prepare("UPDATE user_settings SET
			user_login_permission			= :u1,
			user_register_permission		= :u2,
			user_starting_point				= :u3,
			user_starting_gem				= :u4,
			max_incorrect_login  			= :u5,
			points_earned_per_tournament 	= :u6,
			points_earned_per_tour 			= :u7,
			gem_earned_per_tournament  		= :u8,
			gem_earned_per_tour				= :u9,
			max_faul_suspend  				= :u10,
			max_faul_banned  				= :u11,
			force_tc_entry   				= :u12,
			force_phone_entry  				= :u13,
			force_email_entry  				= :u14,
			force_birthday_entry  			= :u15,
			force_email_verify  			= :u16,
			force_phone_verify  			= :u17,
			min_age_register 				= :u18,
			min_age_join_torunaments 		= :u19,
			max_age_register  				= :u20,
			max_age_join_tournament  		= :u21,
			last_update						= :up
			WHERE id = :id");
			$update = $query->execute(array(
			     "u1" => $us1,
			     "u2" => $us2,
			     "u3" => $us9,
			     "u4" => $us10,
			     "u5" => $us11,
			     "u6" => $us12,
			     "u7" => $us13,
			     "u8" => $us14,
			     "u9" => $us15,
			     "u10" => $us16,
			     "u11" => $us17,
			     "u12" => $us3,
			     "u13" => $us5,
			     "u14" => $us4,
			     "u15" => $us6,
			     "u16" => $us7,
			     "u17" => $us8,
			     "u18" => $us18,
			     "u19" => $us19,
			     "u20" => $us20,
			     "u21" => $us21,
			     "id" => 1,
			     "up" => $date
			     ));
			if ( $update ){
					    $last_id = $db->lastInsertId();
					   	echo json_encode(["stat"=>"success", "message"=>"Güncelleme başarılı!","ok"=>true]);
					}else{
						$uss9	=	"as";
						echo json_encode(["stat"=>"error", "message"=>$us21]);
					}
	}elseif($islem == "banla"){
		$oid = $_POST['oid'];
		$query = $db->prepare("UPDATE users SET user_status = :s WHERE id = :id");
		$update = $query->execute(array("s" => 0, "id" => $oid));
		if($update){
			echo json_encode(["stat"=>"error", "message"=>"Kullanıcı Banlandı!","ok"=>true]);
		}
	}
	elseif($islem == "askiya-al"){
		$oid = $_POST['oid'];
		$query = $db->prepare("UPDATE users SET user_status = :s WHERE id = :id");
		$update = $query->execute(array("s" => 1, "id" => $oid));
		if($update){
			echo json_encode(["stat"=>"warning", "message"=>"Kullanıcı Akıya Alındı!","ok"=>true]);
		}
	}elseif($islem == "onayla"){
		$oid = $_POST['oid'];
		$query = $db->prepare("UPDATE users SET user_status = :s WHERE id = :id");
		$update = $query->execute(array("s" => 2, "id" => $oid));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Kullanıcı Onaylandı!","ok"=>true]);
		}
	}elseif($islem == "shopok"){
		$id = $_POST['oid'];

			$query = $db->prepare("UPDATE users SET
				shop_permission = :i
				WHERE id = :id");
				$update = $query->execute(array(
				     "id" => $id,
				     "i" => 1
				));
				if ( $update ){
     echo json_encode(["icon"=>"success","title"=>"Başarılı!","html"=>"Kullanıcıya alışveriş izni verildi!"]);
			}else{
				echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"İşlem sırasında hata oluştu!"]);
			}
		
	}elseif($islem == "shopred"){
		$id = $_POST['oid'];

			$query = $db->prepare("UPDATE users SET
				shop_permission = :i
				WHERE id = :id");
				$update = $query->execute(array(
				     "id" => $id,
				     "i" => 0
				));
				if ( $update ){
     echo json_encode(["icon"=>"success","title"=>"Başarılı!","html"=>"Kullacının alışveriş izni kaldırıldı!"]);
			}else{
				echo json_encode(["icon"=>"error","title"=>"Hata!","html"=>"İşlem sırasında hata oluştu!"]);
			}
		
	}
}else{
	echo "yetkisiz erişim.";
}