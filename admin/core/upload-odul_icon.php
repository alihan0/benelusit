<?php

        $time = time();
        $date = date("Y-m-d");

        $name = $time.'_'.$date;

        $t = $_FILES['file']["type"];

        if($t == "image/jpeg"){
            $type = ".jpg";
        }elseif($t == "image/png"){
           $type = ".png";
        }elseif($t == "image/gif"){
            $type = ".gif";
        } 

        $filename = $name.$type;
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/rewards/'. $name.$type)){
            echo json_encode(["toast"=>"success","text"=>"Resim başarıyla yüklendi!","filename"=>$filename]);
        }else{
            echo json_encode(["toast"=>"error","text"=>"Sistem Hatası!"]);
        }
    