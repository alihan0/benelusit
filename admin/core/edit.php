<?php

include '../config.php';

if($_POST){

	$sec = $_POST['sec'];

	if($sec == "oyunPlatform"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE game_platforms SET platform_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Platform Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "oyunTur"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE game_kinds SET kind_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Tür Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "oyunKategori"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE game_categories SET categori_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Kategori Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "rutbe"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE team_ranks SET rank_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Rütbe Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "rutbe2"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE user_ranks SET rank_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Rütbe Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "kural"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE tournament_rules SET rule_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Kural Güncellendi!","ok"=>true]);
		}

	}elseif($sec == "odul"){

		$id = $_POST['id'];
		$n = $_POST['n'];

		$query = $db->prepare("UPDATE tournament_rewards SET reward_name = :s WHERE id = :id");
		$update = $query->execute(array("s" => $n, "id" => $id));
		if($update){
			echo json_encode(["stat"=>"success", "message"=>"Ödül Güncellendi!","ok"=>true]);
		}

	}

}