<?php
session_start();
include '../config.php';

if($_POST){
	$sifre = $_POST['pass'];
	$id = $_POST['id'];

	$sifre = $_POST["pass"];
	$pass = md5(sha1($sifre)).sha1(md5($sifre));

	if(empty($sifre)){
		echo json_encode(["title"=>"Hata!","html"=>"Yönetici şifresiniz girmek zorundasınız!","icon"=>"error"]);
	}elseif(empty($id)){
		echo json_encode(["title"=>"Hata!","html"=>"Kullanıcı bilgisi Bulunamadı!","icon"=>"error"]);
	}else{
		$query = $db->query("SELECT * FROM admins WHERE email = '{$_SESSION['adminmail']}'")->fetch(PDO::FETCH_ASSOC);

		if(!$query){
			echo json_encode(["title"=>"Hata!","html"=>"Yönetici bilgilerinize ulaşılamadı!","icon"=>"error"]);
		}else{
			if($pass != $query['password']){
				echo json_encode(["title"=>"Hata!","html"=>"Hatalı Şifre Girdiniz!","icon"=>"error"]);
			}else{


				$query = $db->prepare("DELETE FROM users WHERE id = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM shop_order WHERE user_id = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM teams WHERE team_captain = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM team_applications WHERE user_id = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM team_members WHERE user_id = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM tickets WHERE user = :id");
					$delete = $query->execute(array('id' => $id));

					$query = $db->prepare("DELETE FROM tournament_recourses WHERE user_id = :id");
					$delete = $query->execute(array('id' => $id));




					if( $delete ){
					   echo json_encode(["title"=>"Başarılı!","html"=>"Kullanıcı silindi! <br><br> Aşağıdaki veriler silindi:<br><ul>
<li>Kullanıcı Verileri</li>
<li>Sipariş Verileri</li>
<li>Kullanıcının kaptanı olduğu takım</li>
<li>Takım Başvuruları</li>
<li>Takım Üyeliği</li>
<li>Destek Talepleri</li>
<li>Turnuva Başvuruları</li>
</ul>","icon"=>"success","ok"=>true]);
					}else{
						echo json_encode(["title"=>"Hata!","html"=>"Kullanıcı silinemedi!","icon"=>"error"]);
					}




				
			}
		}
	}
}