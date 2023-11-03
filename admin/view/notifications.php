<div class="page-content">
   <div class="container-fluid">

<div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link <?php if(@$_GET['show'] == "odeme"){echo "active";}?>" href="main.php?page=notifications&show=odeme">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Ödeme Bildirimleri</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link <?php if(@$_GET['show'] == "ticket"){echo "active";}?>" href="main.php?page=notifications&show=ticket">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Destek Talepleri</span>    
                                    </a>
                                </li>
                                
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link <?php if(@$_GET['show'] == "applications"){echo "active";}?>" href="main.php?page=notifications&show=applications">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Turnuva Başvuruları</span>    
                                    </a>
                                </li>
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>

<?php if(@$_GET['show'] == "applications"){
?>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
<table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Turnuva Adı</th>
                                                <th>Oyuncu Adı</th>
                                                <th>Takım Adı</th>
                                                <th>Başvuru Tarihi</th>
                                                
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM tournament_recourses WHERE status = 1", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user_id']}'")->fetch(PDO::FETCH_ASSOC);
                $tt = $db->query("SELECT * FROM teams WHERE team_captain = '{$row['user_id']}'")->fetch(PDO::FETCH_ASSOC);
                $t = $db->query("SELECT * FROM tournaments WHERE id = '{$row['tournament_id']}'")->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                     <td><?=$t['tournament_name'];?></td>
                    <td><?=$u['user_firstname'] .' "'.$u['username'].'" '.$u['user_lastname']  ;?></td>
                    <td><?= '[' . $tt['team_tag']. '] ' . $tt['team_name'];?></td>

                    <td><?=$row['created_at']?></td>
                <td>
                        <a class="btn btn-info" href="?page=notifications&show=applicationsOK&id=<?=$row['id'];?>&tournament_id=<?=$t['id']?>&user=<?=$u['id']?>"><i class="fas fa-check"></i></a>

                        <a class="btn btn-danger" href="?page=notifications&show=applicationsRed&id=<?=$row['id'];?>&backpay=<?=$t['tournament_pay']?>&user=<?=$u['id']?>" style="margin-left:20px"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
        </div>
    </div>
</div>

<?php
}elseif(@$_GET['show'] == "applicationsRed"){
    $id = $_GET['id'];
    $user = $_GET['user'];
    $p = $_GET['backpay'];

    $oyuncu = $db->query("SELECT * FROM users WHERE id = '{$user}'")->fetch(PDO::FETCH_ASSOC);

    $eski = $oyuncu['user_gem'];
    $yeni = $eski + $p;


    $query = $db->prepare("UPDATE tournament_recourses SET
        status = :s
        WHERE id = :id");
        $update = $query->execute(array(
             "id" => $id,
             "s" => 0
        ));
        if ( $update ){
               $query2 = $db->prepare("UPDATE users SET
                    user_gem = :s
                    WHERE id = :id");
                    $update2 = $query2->execute(array(
                         "id" => $user,
                         "s" => $yeni
                    )); 

                    if($update2){
                        header("location:main.php?page=notifications&show=applications");
                    }


        }
}elseif(@$_GET['show'] == "applicationsOK"){

$id = $_GET['id'];
$turnuva = $_GET['tournament_id'];
$user = $_GET['user'];
$oyuncu = $db->query("SELECT * FROM users WHERE id = '{$user}'")->fetch(PDO::FETCH_ASSOC);

$query = $db->query("SELECT * FROM tournament_user_list WHERE tournament_id = '{$turnuva}'")->fetch(PDO::FETCH_ASSOC);

if($query){

    $list = $query['user_list'];

    $add = $list.",".$user;

    $query = $db->prepare("UPDATE tournament_user_list SET
        user_list = :l
        WHERE tournament_id = :i");
        $update = $query->execute(array(
             "i" => $turnuva,
             "l" => $add
        ));
}else{
    $query = $db->prepare("INSERT INTO tournament_user_list SET
        tournament_id = ?,
        user_list = ?
        ");
        $insert = $query->execute(array(
            $turnuva,
            $user
        ));
}

   
$query = $db->prepare("UPDATE tournament_recourses SET
status = :s
WHERE id = :id");
$update = $query->execute(array(
     "s" => 2,
     "id" => $id
));
if ( $update ){
    $tt = $oyuncu['tournament_num'] + 1;
    $query2 = $db->prepare("UPDATE users SET
                    tournament_num = :s
                    WHERE id = :id");
                    $update2 = $query2->execute(array(
                         "id" => $user,
                         "s" => $tt
                    )); 

if($tt >= 5){
    $query2 = $db->prepare("UPDATE users SET
                    shop_permission = :s
                    WHERE id = :id");
                    $update2 = $query2->execute(array(
                         "id" => $user,
                         "s" => 1
                    )); 
}
   



    header("location:main.php?page=notifications&show=applications");
}

}elseif(@$_GET['show'] == "odeme"){
?>






<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
<table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kullanıcı</th>
                                                <th>Paket</th>
                                                <th>Gönderen</th>
                                                <th>Tutar</th>
                                                <th>Tarih/Saat</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM odeme_bildirimi WHERE status = 1", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user']}'")->fetch(PDO::FETCH_ASSOC);
                $p = $db->query("SELECT * FROM gem_packages WHERE id = '{$row['paket']}'")->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                    <td><?=$u['user_firstname'] .' "'.$u['username'].'" '.$u['user_lastname']  ;?></td>
                    <td><?=$p['gem_name']?></td>

                    <td><?=$row['gonderen']?></td>
                    <td><?=$row['tutar']?></td>
                    <td><?=$row['tarih'].' - '.$row['saat']?></td>
                <td>
                        <a class="btn btn-info" href="?page=notifications&show=odemeOK&id=<?=$row['id'];?>&user=<?=$u['id']?>&paket=<?=$row['paket']?>"><i class="fas fa-check"></i></a>

                        <a class="btn btn-danger" href="?page=notifications&show=odemeRed&id=<?=$row['id'];?>" style="margin-left:20px"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
        </div>
    </div>
</div>



<?php
}elseif(@$_GET['show'] == "odemeOK"){
    $user = $_GET['user'];
    $id  = $_GET['id'];
    $paket = $_GET['paket'];
$query = $db->query("SELECT * FROM users WHERE id = '{$user}'")->fetch(PDO::FETCH_ASSOC);
 $p = $db->query("SELECT * FROM gem_packages WHERE id = '{$paket}'")->fetch(PDO::FETCH_ASSOC);
$bakiye = $query['user_gem'];

$yenibakiye = $bakiye + $p['gem_adet'];

$query = $db->prepare("UPDATE users SET
    user_gem = :bakiye
    WHERE id = :id");
    $update = $query->execute(array(
         "bakiye" => $yenibakiye,
         "id" => $user
    ));
    if ( $update ){
        

        $query = $db->prepare("UPDATE odeme_bildirimi SET
            status = :s
            WHERE id = :id");
            $update = $query->execute(array(
                 "s" => 2,
                 "id" => $id
            ));
            if ( $update ){
                header("location:main.php?page=notifications&show=odeme");
            }

    }


}elseif(@$_GET['show'] == "odemeRed"){
    $id = $_GET['id'];
    $query = $db->prepare("UPDATE odeme_bildirimi SET
            status = :s
            WHERE id = :id");
            $update = $query->execute(array(
                 "s" => 0,
                 "id" => $id
            ));
            if ( $update ){
                header("location:main.php?page=notifications&show=odeme");
            }

}elseif(@$_GET['show'] == "ticket"){
?>






<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
<table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kullanıcı</th>
                                                <th>Konu</th>
                                                <th>Departman</th>
                                                <th>Aciliyet</th>
                                                <th>Tarih</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM tickets WHERE status = 1 || status = 3", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user']}'")->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                    <td><?=$u['user_firstname'].' ' .$u['user_lastname']  ;?></td>
                    <td><?=$row['konu']?></td>

                    <td><?php if($row['departman'] == 1){
                                echo "Teknik Destek";
                            }elseif($row['departman'] == 2){
                                echo "Muhasebe";
                            }elseif($row['departman'] == 3){
                                echo "Satış & Mağaza";
                            }elseif($row['departman'] == 3){
                                echo "Hata & BUG";
                            } ?></td>
                    <td><?php  if($row['aciliyet'] == 1){
                                echo "Düşük Öncelik";
                            }elseif($row['aciliyet'] == 2){
                                echo "Orta Öncelik";
                            }elseif($row['aciliyet'] == 3){
                                echo "Yüksek Öncelik";
                            } ?></td>
                    <td><?=$row['created_at']?></td>
                <td>
                        <a class="btn btn-info" href="?page=notification-detail&id=<?=$row['id'];?>"><i class="fas fa-search"></i></a>

                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
        </div>
    </div>
</div>



<?php
}
?>


    </div></div>