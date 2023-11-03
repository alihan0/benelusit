 <?php

 include '../config.php';

 if($_POST){

 	$islem = $_POST['islem'];

 		if($islem == "ekle"){
 			$gem_name = $_POST['gem_name'];
 			$gem_adet = $_POST['gem_adet'];
 			$gem_fiyat= $_POST['gem_fiyat'];
 			$link = $_POST['link'];

 				if(empty($gem_name) || empty($link)  || empty($gem_adet) || empty($gem_fiyat)){
 					echo json_encode(["stat"=>"warning","message"=>"Lütfen boş alan bırakmayın!"]);
 				}else{
 					$query = $db->prepare("INSERT INTO gem_packages SET
						gem_name = ?,
						gem_adet = ?,
						gem_fiyat = ?,
						gem_link = ?
						");
						$insert = $query->execute(array(
						    $gem_name,
						    $gem_adet,
						    $gem_fiyat,
						    $link
						));
						if ( $insert ){
						    $last_id = $db->lastInsertId();
						   echo json_encode(["stat"=>"success","message"=>"Paket başarıyla eklendi!", "ok"=>true]);
						}else{
							echo json_encode(["stat"=>"error","message"=>"Sistem hatası!"]);
						}
 				}
 		}
 }else{
 	echo "yetkisiz erişim.";
 }
