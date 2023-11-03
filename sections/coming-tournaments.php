<div class="home-four-area-bg" >
                <div class="bg"></div>
                <!-- latest-games-area -->
                <section class="latest-games-area home-four-latest-games pt-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="section-title home-four-title mb-50">
                                    <span>BENELUSIT</span>
                                    <h2>Yaklaşan <span>Turnuvalar</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="latest-games-active owl-carousel">

<?php

$query = $db->query("SELECT * FROM tournaments WHERE status = 1", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        
        $game = $db->query("SELECT * FROM games WHERE id = '{$row['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
        $maps = $db->query("SELECT * FROM game_maps WHERE id = '{$row['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);

        $t = $row['tournament_match_type'];

          ?>
<div class="latest-games-items mb-30">
    <div class="latest-games-thumb">
        <a href="turnuva.php?id=<?=$row['id']?>"><img src="admin/uploads/games/<?=$game['game_cover'];?>" alt=""></a>
    </div>
    <div class="latest-games-content">
        <div class="lg-tag">
            <ul>
                <li><a href="#"><?=($row['tournament_type'] == 1) ? "Takımca":"Bireysel";?></a></li>
                <li><a href="#"><?php
 if($t == 1){echo"Herkes Tek";}elseif($t == 2){echo"1v1";}elseif($t==3){echo"2v2";}elseif($t==4){echo"3v3";}elseif($t==5){echo"4v4";}elseif($t==6){echo"5v5";}
                ?></a></li>
                <li><a href="#"> <?=$maps['map_name'];?></a></li>
            </ul>
        </div>
        <h4><a href="turnuva.php?id=<?=$row['id']?>"><?=$game['game_name'];?></a></h4>
        <p>Turnuva Tarihi : <span><?=$row['tournament_start_date'].' '. $row['tournament_start_time'];?></span></p>
        <p style="float:left;line-height: 23px;">Giriş Ücreti : <span><?=$row['tournament_pay'];?> <img src="assets/img/gem.png" style="width:25px;float:right"></span></p>
       <div style="clear: both;" class="mb-10"></div>
        <center><a class="btn" href="turnuva.php?id=<?=$row['id']?>"><i class="fas fa-calendar-plus"></i> KATIL</a>
    </div>
</div>
          <?php
     }
}else{
    echo "Turnuva yok!";
}
?>
                    


                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- latest-games-area-end -->

                <!-- live-match-area -->
                
                <!-- live-match-area-end -->

                <!-- live-match-team-area -->
                
                <!-- live-match-team-area-end -->

            </div>