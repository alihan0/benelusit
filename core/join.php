<?php
session_start();

include '../config.php';

if ($_POST) {

	$turnuva_id = $_POST['turnuva_id'];
	$user_id = $_POST['user_id'];
	@$team_id = $_POST['team_id'];

	$dogumTarihi = $user['user_birthdate'];
	$bugun = date("Y-m-d");
	$diff = date_diff(date_create($dogumTarihi), date_create($bugun));
	$yas = $diff->format('%y');
	$min_yas = $us['min_age_join_torunaments'];
	$max_yas = $us['max_age_join_tournament'];
	$sorgu = $db->prepare("SELECT COUNT(*) FROM tournament_recourses WHERE tournament_id = '" . $turnuva_id . "'");
	$sorgu->execute();
	$kalitimci_sayisi = $sorgu->fetchColumn();
	$t = $db->query("SELECT * FROM tournaments WHERE id = '" . $turnuva_id . "'")->fetch(PDO::FETCH_ASSOC);

	// Turnuva 30 dk önce kayıtları sonlandırma işlemi
	// Zamanı Türkiye'ye göre ayarladık.
	date_default_timezone_set('Europe/Istanbul');	
	$tournament_start_time = strtotime($t['tournament_start_time']);
	$current_time = strtotime(date('H:i:s', time()));
	$time_check = $tournament_start_time - $current_time;
		
	if ($t['tournament_start_time'] > date("Y-m-d")) {
		if ($time_check <= '1800') {
			echo json_encode(["t" => "warning", "m" => "Bu turnuvaya katılım süresi dolmuştur..."]);
			exit;
		}
	}

	if ($t['status'] == 3 || $t['status'] == 4 || $t['status'] == 5) {
		echo json_encode(["t" => "warning", "m" => "Bu turnuvaya artık katılamazsınız..."]);
	} elseif ($t['tournament_match_type'] == 2) {
		if ($profil_durum == 0) {
			echo json_encode(["t" => "warning", "m" => "Profilinizi güncellemeden turnuvalara katılamazsınız."]);
		} elseif ($user['user_status'] == 1) {
			echo json_encode(["t" => "warning", "m" => "Hesabınız askıya alınmışken turnuvalara katılamazsınız."]);
		} elseif ($yas < $min_yas) {
			echo json_encode(["t" => "warning", "m" => $min_yas . " yaşından küçükler turnuvalara katılamaz."]);
		} else {
			$query = $db->query("SELECT * FROM tournament_recourses WHERE user_id = '{$user_id}' && NOT status = 0 && tournament_id = '{$turnuva_id}'")->fetch(PDO::FETCH_ASSOC);
			if ($query) {
				echo json_encode(["t" => "warning", "m" => "Bu turnuvada zaten mevcut bir kaydınız var."]);
			} elseif ($user['user_gem'] < $t['tournament_pay']) {
				echo json_encode(["t" => "warning", "m" => "Yeterli bakiyeniz bulunmuyor!"]);
			} elseif ($t['tournament_participants'] > $kalitimci_sayisi) {
				$query = $db->prepare("INSERT INTO tournament_recourses SET
						tournament_id = ?,
						user_id = ?,
						status = ?,
						created_at =?
						");
				$insert = $query->execute(array(
					$turnuva_id,
					$user_id,
					1,
					$bugun
				));
				if ($insert) {
					$last_id = $db->lastInsertId();


					$g = $user['user_gem'];
					$ucret =  $t['tournament_pay'];
					$kalan =  $g - $ucret;

					$query = $db->prepare("UPDATE users SET
								user_gem = :g
								WHERE id = :id");
					$update = $query->execute(array(
						"g" => $kalan,
						"id" => $user_id
					));
					if ($update) {
						echo json_encode(["t" => "success", "m" => "Turnuvaya başarıyla kaydoldunuz.", "ok" => true]);
					}
				}
			} else {
				echo json_encode(["t" => "warning", "m" => "Bu turnuva kapasitesi dolu!"]);
			}
		}
	} elseif ($t['tournament_match_type'] == 1) {
		if ($profil_durum == 0) {
			echo json_encode(["t" => "warning", "m" => "Profilinizi güncellemeden turnuvalara katılamazsınız."]);
		} elseif ($user['user_status'] == 1) {
			echo json_encode(["t" => "warning", "m" => "Hesabınız askıya alınmışken turnuvalara katılamazsınız."]);
		} elseif (empty($team_id)) {
			echo json_encode(["t" => "warning", "m" => "Bu turnuvaya bireysel olarak katılamazsınız!"]);
		} else {
			$teams = $db->query("SELECT * FROM teams WHERE id = '{$team_id}'")->fetch(PDO::FETCH_ASSOC);
			$captan = $teams['team_captain'];
			if ($captan != $user_id) {
				echo json_encode(["t" => "warning", "m" => $captan . "Sadece takım kaptanları başvuru yapabilir..." . $user_id]);
			} else {
				$query = $db->query("SELECT * FROM tournament_recourses WHERE user_id = '{$user_id}' && NOT status = 0 && tournament_id = '{$turnuva_id}'")->fetch(PDO::FETCH_ASSOC);
				if ($query) {
					echo json_encode(["t" => "warning", "m" => "Bu turnuvada zaten mevcut bir kaydınız var."]);
				} elseif ($user['user_gem'] < $t['tournament_pay']) {
					echo json_encode(["t" => "warning", "m" => "Yeterli bakiyeniz bulunmuyor!"]);
				} elseif ($t['tournament_participants'] > $kalitimci_sayisi) {
					$query = $db->prepare("INSERT INTO tournament_recourses SET
						tournament_id = ?,
						user_id = ?,
						status = ?,
						created_at =?
						");
					$insert = $query->execute(array(
						$turnuva_id,
						$user_id,
						1,
						$bugun
					));
					if ($insert) {
						$last_id = $db->lastInsertId();


						$g = $user['user_gem'];
						$ucret =  $t['tournament_pay'];
						$kalan =  $g - $ucret;

						$query = $db->prepare("UPDATE users SET
								user_gem = :g
								WHERE id = :id");
						$update = $query->execute(array(
							"g" => $kalan,
							"id" => $user_id
						));
						if ($update) {
							echo json_encode(["t" => "success", "m" => "Turnuvaya başarıyla kaydoldunuz.", "ok" => true]);
						}
					}
				} else {
					echo json_encode(["t" => "warning", "m" => "Kontenjan dolu!"]);
				}
			}
		}
	}
} else {
	echo "yetkisiz erişim.";
}
