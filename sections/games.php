<section class="featured-game-area new-released-game-area pt-115 pb-90" style="margin-top:150px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="section-title home-four-title black-title text-center mb-60">
                                <h2><span>Tüm oyunlar</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid container-full">
                    <div class="row no-gutters new-released-game-active">

<?php
$query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        ?>
        <div class="col-lg-3">
                            <div class="featured-game-item mb-30">
                                <div class="featured-game-thumb">
                                    <img src="admin/uploads/games/<?=$row['game_cover'];?>" alt="">
                                </div>
                                <div class="featured-game-content">
                                    <h4><a href="<?= $row['game_url']; ?>"><?=$row['game_name'];?></a></h4>
                                    <div class="featured-game-meta">
                                        <?php 
                                            $c = $db->query("SELECT * FROM game_categories WHERE id = '{$row['game_categori']}'")->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <i class="fas fa-bell"></i>
                                        <span><?=$c['categori_name'];?></span>
                                    </div>
                                </div>
                                <div class="featured-game-content featured-game-overlay-content">
                                      <div class="featured-game-icon"><a href="<?= $row['game_url']; ?>"><img src="assets/img/icon/featured_game_icon.png" alt=""></a></div>
                                    <h4><a href="<?= $row['game_url']; ?>"><?=$row['game_name'];?></a></h4>
                                    <div class="featured-game-meta">

                                        <?php

                                        $kind = $row['game_kind'];

                                        $s = explode(',', $kind);

                                        $len = count($s);

                                        for($i = 0; $i < $len; $i++){
                                $kinds = $db->query("SELECT * FROM game_kinds WHERE id = '{$s[$i]}'")->fetch(PDO::FETCH_ASSOC);

                                echo '<span class="badge bg-danger p-2 ml-1">'.$kinds['kind_name'].'</span>';

                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                        </div>

        <?php
     }
}
?>


                        








                    </div>
                </div>
            </section>