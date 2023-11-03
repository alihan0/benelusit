<?php 


include '../config.php';

if($_POST){
	$sec = $_POST['sec'];

	if($sec == "oyunKategori"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM game_categories WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Oyun kategorisi silindi!", "ok"=>true]);
		}
	}elseif($sec == "oyunTur"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM game_kinds WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Oyun türü silindi!", "ok"=>true]);
		}
	}elseif($sec == "oyunPlatform"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM game_platforms WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Oyun platformu silindi!", "ok"=>true]);
		}
	}elseif($sec == "oyunMap"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM game_maps WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Oyun haritası silindi!", "ok"=>true]);
		}
	}elseif($sec == "takim"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM teams WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Takım silindi!", "ok"=>true]);
		}
	}elseif($sec == "rutbe"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM team_ranks WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Rütbe silindi!", "ok"=>true]);
		}
	}elseif($sec == "rutbe2"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM user_ranks WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Rütbe silindi!", "ok"=>true]);
		}
	}elseif($sec == "admin"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM admins WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Admin silindi!", "ok"=>true]);
		}
	}elseif($sec == "admingrup"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM admin_groups WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Admin grubu silindi!", "ok"=>true]);
		}
	}elseif($sec == "kural"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM tournament_rules WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Kural silindi!", "ok"=>true]);
		}
	}elseif($sec == "odul"){
		$id = $_POST['id'];

		$query = $db->prepare("DELETE FROM tournament_rewards WHERE id = :id");
		$delete = $query->execute(array(
		   'id' => $id
		));

		if($delete){
			echo json_encode(["stat"=>"success","message"=>"Ödül silindi!", "ok"=>true]);
		}
	}

}