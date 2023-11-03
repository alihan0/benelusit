$id = $_GET['id'];

$t = $db->query("SELECT * FROM tournaments WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
$o = $db->query("SELECT * FROM games WHERE id = '{$t['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
$m = $db->query("SELECT * FROM game_maps WHERE id = '{$t['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);


?>






<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary"><?=$t['tournament_name']?></h5>
                            <h5><?=$o['game_name']?> - <?=$m['map_name']?></h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="uploads/games/<?=$o['game_cover']?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="pt-4">
                           
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="font-size-15"><?php
                                        $mod = $t['tournament_match_type'];
 if($mod == 1){echo"Herkes Tek";}elseif($mod == 2){echo"1v1";}elseif($mod==3){echo"2v2";}elseif($mod==4){echo"3v3";}elseif($mod==5){echo"4v4";}elseif($mod==6){echo"5v5";}
                ?></h5>
                                    <p class="text-muted mb-0">Mod</p>
                                </div>
                                <div class="col-4">
                                    <h5 class="font-size-15"><?php if($t['tournament_type'] == 1){echo "Bireysel";}else{echo "Takımca";} ?></h5>
                                    <p class="text-muted mb-0">Katılım</p>
                                </div>
                                <div class="col-4">
                                    <h5 class="font-size-15"><?=$t['tournament_pay'];?></h5>
                                    <p class="text-muted mb-0">Ücret</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?=$t['tournament_name']?></h4>

                <p class="text-muted mb-4"><?=$t['tournament_desc']?></p>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Oyun :</th>
                                <td><?=$o['game_name']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Harita :</th>
                                <td><?=$m['map_name']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kayıt T. :</th>
                                <td><?=$t['tournament_reg_date']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Başlama T. :</th>
                                <td><?=$t['tournament_start_date']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Geçmiş</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list active">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Başlatma Bekleniyor</a></h5>
                                        <span class="text-primary"><?=$t['tournament_start_date']?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Kayıtlar Başladı</a></h5>
                                        <span class="text-primary"><?=$t['created_at']?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Turnuva oluşturuldu</a></h5>
                                        <span class="text-primary"><?=$t['created_at']?></span>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>  
        <!-- end card -->
    </div>         
    
    <div class="col-xl-8">

        <div class="row">
            
            
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <?php
                    if($t['status'] == 1){
                        ?><button class="btn btn-warning">Beklemede</button><?php
                    }elseif($t['status'] == 2){
                        ?><button class="btn btn-info" id="turnuvaStart">Turnuvayı Başlat</button><?php
                    }elseif($t['status'] == 3){
                        ?><button class="btn btn-primary">Turnuvayı Bitir</button><?php
                    }elseif($t['status'] == 4){
                        ?><button class="btn btn-success">Kazananı Belirle</button><?php
                    }
                    ?>
                        
                </div>
            </div>

             <div class="col-md-4">
                <div class="card mini-stats-wid">
                        <button class="btn btn-danger">Turnuvayı İptal Et</button>
                </div>
            </div>


        </div>

<?php 
    if($t['status'] > 2){
?>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Katılımcılar</h4>
<style type="text/css">
    main{
  display:flex;
  flex-direction:row;
}
.round{
  display:flex;
  flex-direction:column;
  justify-content:center;
  width:200px;
  list-style:none;
  padding:0;
}
  .round .spacer{ flex-grow:1; }
  .round .spacer:first-child,
  .round .spacer:last-child{ flex-grow:.5; }

  .round .game-spacer{
    flex-grow:1;
  }

/*
 *  General Styles
*/


li.game{
  padding-left:20px;
}

  li.game.winner{
    font-weight:bold;
  }
  li.game span{
    float:right;
    margin-right:5px;
  }

  li.game-top{ border-bottom:1px solid #aaa; }

  li.game-spacer{ 
    border-right:1px solid #aaa;
    min-height:40px;
  }

  li.game-bottom{ 
    border-top:1px solid #aaa;
  }
</style>
                <main id="tournament">
  <ul class="round round-1">

    <?php 
$tur = $t['tournament_participants'] / 2;

for($i = 1; $i <= $tur; $i++){

    $query = $db->query("SELECT * FROM tournament_tours WHERE tournament_id = '{$t['id']}'")->fetch(PDO::FETCH_ASSOC);

   $decode = json_decode($query['tour_match']);
   $a = $i-1;
   $str = "t".$i;


$user1 = $decode[$a]->$str[0];
$user2 = $decode[$a]->$str[1];

$u1 = $db->query("SELECT * FROM users WHERE id = '{$user1}'")->fetch(PDO::FETCH_ASSOC);
$u2 = $db->query("SELECT * FROM users WHERE id = '{$user2}'")->fetch(PDO::FETCH_ASSOC);
?>

<li class="spacer">&nbsp;</li>
    
    <li class="game game-top "><?=$u1['user_firstname'].' "'.$u1['username'].'" '.$u1['user_lastname'] ?><span>79</span></li>
    <li class="game game-spacer">&nbsp;</li>
    <li class="game game-bottom "><?=$u2['user_firstname'].' "'.$u2['username'].'" '.$u2['user_lastname'] ?><span>48</span></li>

    <li class="spacer">&nbsp;</li>
<?php
}
?>




    
    
  
  </ul>
  
  
     
</main>
            </div>
        </div>
<?php } ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Katılımcılar</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        
                            <?php 

$query = $db->query("SELECT * FROM tournament_recourses WHERE tournament_id = '{$_GET['id']}' && status = 2", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){




    ?>
<thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Oyuncu</th>
            <th scope="col">Takım</th>

        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
     foreach( $query as $row ){
        $u = $db->query("SELECT * FROM users WHERE id = '{$row['user_id']}'")->fetch(PDO::FETCH_ASSOC);
$tt = $db->query("SELECT * FROM teams WHERE team_captain = '{$row['user_id']}'")->fetch(PDO::FETCH_ASSOC);

          ?>
           <tr>
                <th scope="row"><?=$i++?></th>
                <td><?=$u['user_firstname'].' "'.$u['username'].'" '.$u['user_lastname'] ?></td>
                <td></td>
            </tr>
          <?php
     }
     ?></tbody><?php
}else{
    echo "Hiç onaylanmış başvuru yok!";
}

                            ?>
                           
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

