<?php

include '../config.php';

if ($_POST) {
	$islem = $_POST['islem'];
	$date = date("Y-m-d H:i:s");


	if ($islem == 'baslatma_bekleniyor') {
		$tournament_id = $_POST['tournament_id'];
		$stmt = $db->exec("UPDATE `tournaments` SET `status`='2'  WHERE id = '" . $tournament_id . "'");
		$response['status']  = 'success';
		$response['message'] = 'Turnuva başlatıldı!';
		echo json_encode($response);
		exit;
	}

	if ($islem == 'turnuva_baslat') {
		$tournament_id = $_POST['tid'];
		$stmt = $db->query("SELECT * FROM tournaments  WHERE id = '" . $tournament_id . "'")->fetch(PDO::FETCH_ASSOC);
		$type = $stmt['tournament_type'];
		$match_type = $stmt['tournament_match_type'];
		$katilimci_sayisi = $stmt['tournament_participants'];
		$tournament_tour = $stmt['tournament_tour'];
		$current_tour = $stmt['current_tour'];


		$qry = $db->prepare("SELECT user_id FROM tournament_recourses WHERE tournament_id = '" . $tournament_id . "' AND status = '2'");
		$qry->execute();
		$users = $qry->fetchAll();
		foreach ($users as $row) {
			$user = $row['user_id'];
			$insert = $db->prepare("INSERT INTO `tournament_tours`(`tournament_id`,`tournament_tour`, `tournament_current_tour`, `user_id`) 
										VALUES ('" . $tournament_id . "','" . $tournament_tour . "', '" . $current_tour . "', '" . $user . "')");
			$insert->execute();
		}

		$qry2 = $db->prepare("UPDATE `tournaments` SET `status`='4' WHERE id = '" . $tournament_id . "'");
		$qry2->execute();

		if ($insert) {
			$response['status']  = 'success';
			$response['message'] = 'Turnuva başlatıldı!';
			echo json_encode($response);
			exit;
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Turnuva başlatılamadı!';
			echo json_encode($response);
			exit;
		}
	};

	if ($islem == 'kazanani_belirle') {
		$winnerArray = $_POST['winner'];
		$winner = explode("winner=", $winnerArray);
		$winner = str_replace('&', '', $winner);
		unset($winner['0']);
		$tournament_id = $_POST['turnuva_id'];
		$qry = $db->query("SELECT tournament_current_tour,tournament_tour FROM tournament_tours WHERE tournament_id = '" . $tournament_id . "' ORDER BY id DESC")->fetch(PDO::FETCH_ASSOC);
		$tournament_current_tour = $qry['tournament_current_tour'];
		$tournament_tour = $qry['tournament_tour'];
		if ($tournament_tour === $tournament_current_tour) {
			$tournament_current_tour = $tournament_current_tour + 1;
			foreach ($winner as $row) {
				$user_id = $row;
				$insert = $db->prepare("INSERT INTO `tournament_tours`(`tournament_id`, `tournament_tour`,`tournament_current_tour`, `user_id`,`tournament_winner`) 
									VALUES ('" . $tournament_id . "','" . $tournament_current_tour  . "','" . $tournament_current_tour . "','" . $user_id . "','1')");
				$insert->execute();
			}
			if ($insert) {
				$tournament_update = $db->prepare("UPDATE `tournaments` SET `status`='6' WHERE id = '" . $tournament_id . "'");
				$tournament_update->execute();
				if ($tournament_update) {
					$response['status']  = 'success';
					$response['message'] = 'Kazanan Belirlendi!';
					echo json_encode($response);
					exit;
				} else {
					$response['status']  = 'error';
					$response['message'] = 'Sistem Hatası!';
					echo json_encode($response);
					exit;
				}
			}
		} else if ($tournament_tour > $tournament_current_tour) {
			$tournament_current_tour = $tournament_current_tour + 1;
			foreach ($winner as $row) {
				$user_id = $row;
				$insert = $db->prepare("INSERT INTO `tournament_tours`(`tournament_id`, `tournament_tour`,`tournament_current_tour`, `user_id`) 
									VALUES ('" . $tournament_id . "','" . $tournament_tour  . "','" . $tournament_current_tour . "','" . $user_id . "')");
				$insert->execute();
			}
			if ($insert) {
				$tournament_update = $db->prepare("UPDATE `tournaments` SET `current_tour`='" . $tournament_current_tour . "',`status`='3' WHERE id = '" . $tournament_id . "'");
				$tournament_update->execute();
				if ($tournament_update) {
					$response['status']  = 'success';
					$response['message'] = 'Kazanan Belirlendi!';
					echo json_encode($response);
					exit;
				} else {
					$response['status']  = 'error';
					$response['message'] = 'Sistem Hatası!';
					echo json_encode($response);
					exit;
				}
			}
		}
	}
	if ($islem == "kuralEkle") {
		$kuraladi = $_POST['kuraladi'];
		$aciklama = $_POST['kuraldesc'];

		if (empty($kuraladi) || empty($aciklama)) {
			echo json_encode(["stat" => "warning", "message" => "Boş alan bırakmayın!"]);
		} else {
			$query = $db->prepare("INSERT INTO tournament_rules SET
				rule_name = ?,
				rule_desc = ?,
				created_at = ?");
			$insert = $query->execute(array(
				$kuraladi,
				$aciklama,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();
				echo json_encode(["stat" => "success", "message" => "Yeni kural eklendi!", "ok" => true]);
			} else {
				echo json_encode(["stat" => "error", "message" => "Sistem Hatası!"]);
			}
		}
	} elseif ($islem == "odulEkle") {
		$oduladi = $_POST['odulname'];
		$oduldesc = $_POST['oduldesc'];
		$kod = $_POST['kod'];
		$pic = $_POST['pic'];

		if (empty($oduladi) || empty($oduldesc)) {
			echo json_encode(["stat" => "warning", "message" => "Boş alan bırakmayın!"]);
		} elseif (empty($pic)) {
			echo json_encode(["stat" => "warning", "message" => "Bir resim yükleyin"]);
		} else {
			$query = $db->prepare("INSERT INTO tournament_rewards SET
				reward_name = ?,
				reward_desc = ?,
				reward_pic = ?,
				reward_code = ?,
				created_at = ?
				");
			$insert = $query->execute(array(
				$oduladi,
				$oduldesc,
				$pic,
				$kod,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();
				echo json_encode(["stat" => "success", "message" => "Yeni ödül eklendi!", "ok" => true]);
			} else {
				echo json_encode(["stat" => "error", "message" => "Sistem Hatası!"]);
			}
		}
	} elseif ($islem == "turnuva-ekle") {
		$turnuva_adi     	= $_POST['turnuva_adi'];
		$turnuva_desc    	= $_POST['turnuva_desc'];
		$eslesme_tipi    	= $_POST['eslesme_tipi'];
		$turnuva_tipi  		= $_POST['turnuva_tipi'];
		$katilimci 			= $_POST['katilimci'];
		$tur_sayisi     	= $_POST['tur_sayisi'];
		$kazanan_sayisi     = $_POST['kazanan_sayisi'];
		$ucret     			= $_POST['ucret'];
		$turnuva_oyun     	= $_POST['turnuva_oyun'];
		$turnuva_harita     = $_POST['turnuva_harita'];
		$reg_date     		= $_POST['reg_date'];
		$start_date     	= $_POST['start_date'];
		$start_time     	= $_POST['start_time'];
		$kurallar     		= $_POST['kurallar'];
		$oduller     		= $_POST['oduller'];
		$status 			= "1";

		if (
			empty($turnuva_adi) ||
			empty($turnuva_desc) ||
			empty($eslesme_tipi) ||
			empty($turnuva_tipi) ||
			empty($katilimci) ||
			empty($tur_sayisi) ||
			empty($kazanan_sayisi) ||
			empty($ucret) ||
			empty($turnuva_oyun) ||
			empty($turnuva_harita) ||
			empty($reg_date) ||
			empty($start_date) ||
			empty($start_time) ||
			empty($kurallar) ||
			empty($oduller)
		) {
			echo json_encode(["stat" => "warning", "message" => "Boş alan bırakmayın!"]);
		} else {
			$d = date("Y-m-d");
			if ($reg_date < $d) {
				echo json_encode(["stat" => "warning", "message" => "Geçmiş tarihli turnuva oluşturulamaz!"]);
			} elseif ($start_date < $d) {
				echo json_encode(["stat" => "warning", "message" => "Geçmiş tarihli turnuva başlatılamaz."]);
			} elseif ($start_date < $reg_date) {
				echo json_encode(["stat" => "warning", "message" => "Başlama tarihi Kayıt Tarihinden önce olamaz."]);
			} else {
				$query = $db->prepare("INSERT INTO tournaments SET
					tournament_name = ?,
					tournament_desc = ?,
					tournament_game = ?,
					tournament_type = ?,
					tournament_match_type = ?,
					tournament_participants = ?,
					tournament_tour = ?,
					tournament_pay = ?,
					tournament_winner_number = ?,
					tournament_reg_date = ?,
					tournament_start_date = ?,
					tournament_start_time	 = ?,
					tournament_map = ?,
					rules = ?,
					rewards = ?,
					status = ?,
					created_at = ?
					");
				$insert = $query->execute(array(
					$turnuva_adi,
					$turnuva_desc,
					$turnuva_oyun,
					$turnuva_tipi,
					$eslesme_tipi,
					$katilimci,
					$tur_sayisi,
					$ucret,
					$kazanan_sayisi,
					$reg_date,
					$start_date,
					$start_time,
					$turnuva_harita,
					$kurallar,
					$oduller,
					$status,
					$date
				));
				if ($insert) {
					$last_id = $db->lastInsertId();
					echo json_encode(["stat" => "success", "message" => "Turnuva başarıyla oluşturuldu...", "ok" => true]);
				} else {
					echo json_encode(["stat" => "error", "message" => "Sistem Hatası!"]);
				}
			}
		}
	} elseif ($islem == "start") {
		$tid = $_POST['tid'];
		if (empty($tid)) {
			echo json_encode(["stat" => "error", "m" => "Turnuva bilgilerine ulaşılamadı!", "b" => "Sistem Hatası!"]);
		} else {
			$t = $db->query("SELECT * FROM tournaments WHERE id = '{$tid}'")->fetch(PDO::FETCH_ASSOC);
			if ($t['status'] != 2) {
				echo json_encode(["stat" => "error", "m" => "Bu turnuva başlatmaya uygun değil!", "b" => "Sistem Hatası!"]);
			} else {
				$tur = $t['tournament_tour'];
				$oyuncu = $t['tournament_participants'];
				$sorgu = $db->prepare("SELECT COUNT(*) FROM tournament_recourses WHERE tournament_id = '{$tid}' && status = 2");
				$sorgu->execute();
				$kalitimci_sayisi = $sorgu->fetchColumn();

				if ($kalitimci_sayisi < $oyuncu) {
					echo json_encode(["stat" => "error", "m" => "Yeterince oyuncu yok!", "b" => "Hata!"]);
				} else {
					$query = $db->query("SELECT * FROM tournament_tours WHERE tournament_id = '" . $tid . "'")->fetch(PDO::FETCH_ASSOC);

					if ($query) {
						echo json_encode(["stat" => "error", "m" => "turnuva var", "b" => "Hata!"]);
					} else {
						// Eşleşme Tipi Belirleme
						$qry_tournament_match_type = $db->query("SELECT tournament_match_type,tournament_participants,tournament_tour FROM tournaments  WHERE id = '" . $tid . "'")->fetch(PDO::FETCH_ASSOC);
						$tournament_match_type = $qry_tournament_match_type['tournament_match_type'];
						$tournament_participants = $qry_tournament_match_type['tournament_participants'];
						$tournament_tour = $qry_tournament_match_type['tournament_tour'];
						// Herkes Tek
						if ($tournament_match_type === 1) {
							$qry_users = $db->prepare("SELECT tr.user_id FROM tournament_recourses tr											
							WHERE tournament_id = '" . $tid . "'");
							$qry_users->execute();
							$qry_users_data = $qry_users->fetchAll();
							foreach ($qry_users_data as $row) {
								$user = $row['user_id'];
								$insert = $db->prepare("INSERT INTO `tournament_tours`(`tournament_id`,`tour_no`, `gamer_id`, `round`) 
														VALUES ('" . $tid . "','" . $tournament_tour . "','" . $user . "', '1')");
								$insert->execute();
								if ($insert) {
									$last_id = $db->lastInsertId();
									$query = $db->prepare("UPDATE tournaments SET
									status = :s
									WHERE id = :tid");
									$update = $query->execute(array(
										"s" => 4,
										"tid" => $tid
									));
									if ($update) {
										echo json_encode(["stat" => "success", "m" => "Turnuva başlatıldı!", "b" => "Başarılı!", "ok" => true]);
									}
								}
							}
						} else {
							$takim_sayisi = $oyuncu / 2;
							$match = [];
							$query = $db->query("SELECT * FROM tournament_recourses WHERE status = 2")->fetch(PDO::FETCH_ASSOC);
							$l = $db->query("SELECT * FROM tournament_user_list WHERE tournament_id = '{$tid}'")->fetch(PDO::FETCH_ASSOC);
							$user_list = $l['user_list'];
							$users = explode(",", $user_list);
							$team1 = [];
							$team2 = [];

							// Oyuncuları karıştırma ve takımlara ayırma.

							shuffle($users);
							list($array1, $array2) = array_chunk($users, ceil(count($users) / 2));

							$team1 = $array1;
							$team2 = $array2;

							for ($i = 1; $i <= $takim_sayisi; $i++) {
								$str = "t" . $i;
								$t = [$str => array($team1[$i - 1], $team2[$i - 1])];
								array_push($match, $t);
							}

							$json = json_encode($match);
							$query = $db->prepare("INSERT INTO tournament_tours SET
							tournament_id = ?,
							tour_no = ?,
							gamer_no = ?,
							team_no = ?,
							tour_match = ?,
							status = ?,
							created_at = ?
							");
							$insert = $query->execute(array(
								$tid,
								1,
								$oyuncu,
								$takim_sayisi,
								$json,
								1,
								$date
							));
							if ($insert) {
								$last_id = $db->lastInsertId();
								$query = $db->prepare("UPDATE tournaments SET
								status = :s
								WHERE id = :tid");
								$update = $query->execute(array(
									"s" => 3,
									"tid" => $tid
								));
								if ($update) {
									echo json_encode(["stat" => "success", "m" => "Turnuva başlatıldı!", "b" => "Başarılı!", "ok" => true]);
								}
							}
						}
					}
				}
			}
		}
	} elseif ($islem == "turutamamla") {
		$turnuva = $_POST['turnuvaid'];
		$tur = $_POST['tur'];
		$list = $_POST['list'];
		$turno = $tur + 1;


		$query = $db->prepare("UPDATE tournament_tours SET
		status = :s
		WHERE tournament_id = :tid && tour_no = :tt");
		$update = $query->execute(array(
			"s" => 2,
			"tid" => $turnuva,
			"tt" => $tur
		));


		$userss = explode(",", $list);
		$count = count($userss);

		$takim_sayisii = $count / 2;

		$match = [];

		//$t = [$str => array($team1[$i-1],$team2[$i-1])];


		if ($count == 8) {
			$query = $db->prepare("UPDATE tournament_tours SET
status = :s
WHERE tournament_id = :tid && tour_no = :tt");
			$update = $query->execute(array(
				"s" => 2,
				"tid" => $turnuva,
				"tt" => $tur
			));
			$eslesme = [
				"t1" => array($userss[0], $userss[1]),
				"t2" => array($userss[2], $userss[3]),
				"t3" => array($userss[4], $userss[5]),
				"t4" => array($userss[6], $userss[7]),
			];

			array_push($match, $eslesme);

			$json2 = json_encode($match);

			$query = $db->prepare("INSERT INTO tournament_tours SET
				tournament_id = ?,
				tour_no = ?,
				gamer_no = ?,
				team_no = ?,
				tour_match = ?,
				status = ?,
				created_at = ?
				");
			$insert = $query->execute(array(
				$turnuva,
				$turno,
				$count,
				$takim_sayisii,
				$json2,
				1,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();
				echo json_encode(["t" => "success", "m" => "Yeni tur başlatıldı!", "ok" => true]);
			} else {
				echo json_encode(["t" => "error", "m" => "Sistem Hatası"]);
			}
		} elseif ($count == 4) {
			$query = $db->prepare("UPDATE tournament_tours SET
				status = :s
				WHERE tournament_id = :tid && tour_no = :tt");
			$update = $query->execute(array(
				"s" => 2,
				"tid" => $turnuva,
				"tt" => $tur
			));
			$eslesme = [
				"t1" => array($userss[0], $userss[1]),
				"t2" => array($userss[2], $userss[3]),
			];

			array_push($match, $eslesme);

			$json2 = json_encode($match);

			$query = $db->prepare("INSERT INTO tournament_tours SET
				tournament_id = ?,
				tour_no = ?,
				gamer_no = ?,
				team_no = ?,
				tour_match = ?,
				status = ?,
				created_at = ?
				");
			$insert = $query->execute(array(
				$turnuva,
				$turno,
				$count,
				$takim_sayisii,
				$json2,
				1,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();
				echo json_encode(["t" => "success", "m" => "Yeni tur başlatıldı!", "ok" => true]);
			} else {
				echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
			}
		} elseif ($count == 2) {
			$query = $db->prepare("UPDATE tournament_tours SET
			status = :s
			WHERE tournament_id = :tid && tour_no = :tt");
			$update = $query->execute(array(
				"s" => 2,
				"tid" => $turnuva,
				"tt" => $tur
			));

			$eslesme = [
				"t1" => array($userss[0], $userss[1])
			];

			array_push($match, $eslesme);

			$json2 = json_encode($match);

			$query = $db->prepare("INSERT INTO tournament_tours SET
				tournament_id = ?,
				tour_no = ?,
				gamer_no = ?,
				team_no = ?,
				tour_match = ?,
				status = ?,
				created_at = ?
				");
			$insert = $query->execute(array(
				$turnuva,
				$turno,
				$count,
				$takim_sayisii,
				$json2,
				1,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();
				echo json_encode(["t" => "success", "m" => "Yeni tur başlatıldı!", "ok" => true]);
			} else {
				echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
			}
		} elseif ($count == 1) {
			$query = $db->prepare("UPDATE tournament_tours SET
			status = :s
			WHERE tournament_id = :tid && tour_no = :tt");
			$update = $query->execute(array(
				"s" => 2,
				"tid" => $turnuva,
				"tt" => $tur
			));

			$eslesme = [
				"winner" => array($userss[0])
			];

			array_push($match, $eslesme);

			$json2 = json_encode($match);
			$query = $db->prepare("INSERT INTO tournament_tours SET
				tournament_id = ?,
				tour_no = ?,
				gamer_no = ?,
				team_no = ?,
				tour_match = ?,
				status = ?,
				created_at = ?
				");
			$insert = $query->execute(array(
				$turnuva,
				$turno,
				$count,
				$takim_sayisii,
				$json2,
				2,
				$date
			));
			if ($insert) {
				$last_id = $db->lastInsertId();



				$query2 = $db->prepare("UPDATE tournaments SET
				status = :s
				WHERE id = :tid");
				$update = $query2->execute(array(
					"s" => 4,
					"tid" => $turnuva
				));
				echo json_encode(["t" => "success", "m" => "Kazanan belirlendi!", "ok" => true]);
			} else {
				echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
			}
		}
	} elseif ($islem == "iptal") {
		$turnuva = $_POST['oid'];
		$query2 = $db->prepare("UPDATE tournaments SET
		status = :s
		WHERE id = :tid");
		$update = $query2->execute(array(
			"s" => 0,
			"tid" => $turnuva
		));
		echo json_encode(["icon" => "success", "title" => "Başarılı!", "html" => "Turnuva iptal edildi!", "ok" => true]);
	} elseif ($islem == "sil") {

		$query = $db->prepare("DELETE FROM tournaments WHERE id = :id");

		$delete = $query->execute(array(
			'id' => $_POST['id']
		));
		// tournament_recourses temizleme
		$delete2 = $db->prepare("DELETE FROM `tournament_recourses` WHERE tournament_id = '" . $_POST['id'] . "'");
		$delete2->execute();
		// tournament_tours temizleme 
		$delete3 = $db->prepare("DELETE FROM `tournament_tours` WHERE tournament_id = '" . $_POST['id'] . "'");
		$delete3->execute();
		// tournament_user_list temizleme
		$delete4 = $db->prepare("DELETE FROM `tournament_user_list` WHERE tournament_id = '" . $_POST['id'] . "'");
		$delete4->execute();
	}
} else {
	echo "yetkisiz erişim.";
}
