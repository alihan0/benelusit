<?php

include '../config.php';

if($_POST){
	$banka = $_POST['banka'];
	$sube = $_POST['sube'];
	$iban = $_POST['iban'];
	$alici = $_POST['iban'];

		if(empty($banka) || empty($sube) || empty($iban) || empty($alici)){
			echo json_encode(["stat"=>"warning","message"=>"Boş alan bırakmayın!"]);
		}else{
			$query = $db->prepare("UPDATE banka_bilgileri SET
				banka_adi = :b,
				sube = :s,
				iban = :i,
				sahip = :a
				WHERE id = :id");
				$update = $query->execute(array(
				     "id" => 1,
				     "b" => $banka,
				     "s" => $sube,
				     "i" => $iban,
				     "a" => $alici
				));
				if ( $update ){
				     echo json_encode(["stat"=>"success","message"=>"Banka bilgileri güncellendi.","ok"=>true]);
				}else{
					echo json_encode(["stat"=>"error","message"=>"Sistem Hatası!"]);
				}
		}
}