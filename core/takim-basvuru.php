<?php

include '../config.php';

if ($_POST) {
    $process = $_POST['process'];
    if ($process === 'team_applications_del') {
        $user_id =  $_POST['user_id'];
        $team_id =  $_POST['team_id'];
        $qryDelete = $db->prepare("DELETE FROM `team_applications` WHERE team_id = '" . $team_id . "' AND user_id = '" . $user_id . "'");
        $qryDelete->execute();
        if ($qryDelete) {
            echo json_encode(["t" => "success", "m" => "Başvuru silindi!", "ok" => true]);
        } else {
            echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
        }
    }
    
    if ($process === 'team_applications_ok') {
        $user_id =  $_POST['user_id'];
        $team_id =  $_POST['team_id'];
        $user_position = "3";
        $membership_status = "2";

        $insert = $db->prepare("INSERT INTO `team_members`(`team_id`, `user_id`, `user_position`, `membership_status`) 
        VALUES ('" . $team_id . "','" . $user_id . "','" . $user_position . "','" . $membership_status . "')");
        $insert->execute();

        $qryDelete = $db->prepare("DELETE FROM `team_applications` WHERE team_id = '" . $team_id . "' AND user_id = '" . $user_id . "'");
        $qryDelete->execute();

        if ($insert) {
            echo json_encode(["t" => "success", "m" => "Başvuru kabul edildi!", "ok" => true]);
        } else {
            echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
        }
    }

    if ($process === 'team_members_del') {
        $user_id =  $_POST['user_id'];
        $team_id =  $_POST['team_id'];

        $delete = $db->prepare("DELETE FROM `team_members` WHERE team_id = '" . $team_id . "' AND user_id = '" . $user_id . "'");
        $delete->execute();
        if ($delete) {
            echo json_encode(["t" => "success", "m" => "Takımdan çıkartıldı!", "ok" => true]);
        } else {
            echo json_encode(["t" => "error", "m" => "Sistem Hatası!"]);
        }
    }
} else {
    echo "yetkisiz erişim.";
}
