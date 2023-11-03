 <?php
 session_start();
    include 'config.php';

$turnuva = $db->query("SELECT * FROM tournaments WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
$oyun = $db->query("SELECT * FROM games WHERE id = '{$turnuva['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
$maps = $db->query("SELECT * FROM game_maps WHERE id = '{$turnuva['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);
$t = $turnuva['tournament_match_type'];
 ?>
<!doctype html>
<html class="no-js" lang="<?=$seo['seo_lang'];?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profil - <?=$seo['seo_title'];?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/odometer.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <img src="assets/img/icon/preloader.svg" alt="">
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-area -->
        <?php include 'sections/header.php'; ?>
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content text-center">
                                <h2><?=$user['user_firstname'];?><span><?=$user['user_lastname']?></span></h2>
                                <h3>@<?=$user['username'];?></h3>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- community-area -->
            <div class="community-area primary-bg pt-120 pb-175">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                    <table class="table mt-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Aktif Turnuvalarım</th>
                                                <th scope="col"> Başlama Zamanı</th>
                                                <th scope="col">Ücret</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$query = $db->query("SELECT * FROM tournament_recourses WHERE user_id = '{$user['id']}' && status = 2", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
$sorgu1 = $db->query("SELECT * FROM tournaments WHERE id = '{$row['tournament_id']}'")->fetch(PDO::FETCH_ASSOC);
$sorgu2 = $db->query("SELECT * FROM games WHERE id = '{$sorgu1['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);

          ?>
<tr>
    <th scope="row">
        <div class="community-post-wrap">
            <div class="community-post-content">
                <a href="#"><?=$sorgu1['tournament_name']?></a>
                <span><?php
                if($sorgu1['tournament_match_type'] == 2){echo "Bireysel";}else{echo "Takımca";}
                echo " - ";

                $t = $sorgu1['tournament_type'];
                    if($t == 1){echo"Herkes Tek";}elseif($t == 2){echo"1v1";}elseif($t==3){echo"2v2";}elseif($t==4){echo"3v3";}elseif($t==5){echo"4v4";}elseif($t==6){echo"5v5";}
            ?></span>
            </div>
            <div class="community-post-tag">
                <a href="#">
                    <?=$sorgu2['game_name']?>
                </a>
            </div>
        </div>
    </th>
    <td><?=$sorgu1['tournament_start_date']?></td>
    <td><?=$sorgu1['tournament_pay']?><img src="assets/img/gem.png" style="width:25px;"></td>
</tr>
          <?php
     }
}else{
    ?>
<tr class="community-post-type">
    <th><span>Hiç aktif turnuva kaydınız yok!</span></th>
</tr>
    <?php

}
?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                    <table class="table mt-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sipariş Geçmişim</th>
                                                <th scope="col">Durum</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="community-post-type">
                                                <th><span>Siparişlerim</span></th>
                                            </tr>
<?php
$query = $db->query("SELECT * FROM shop_order WHERE user_id = '{$user['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          ?>
<tr>
    <th scope="row">
        <div class="community-post-wrap">
            <div class="community-post-content">
                
                    <?php
                    $order_list =  $row['order_list'];
                    $order = json_decode($order_list);
                    $count = count($order->urunler);

                    for($i = 0; $i < $count; $i++){
                 $sorgu3 = $db->query("SELECT * FROM shop_product WHERE id = '{$order->urunler[$i]}'")->fetch(PDO::FETCH_ASSOC);
                 ?>
<div class="community-post-tag" style="float:left">
                <a href="#" >
                   <?php echo $sorgu3['p_name']; ?>
                </a>
            </div>
                 <?php
                 
       
                    }
                    ?>
              
            </div>
     
        </div>
    </th>
    <td><?php if($row['status'] == 0){echo 'Reddedildi';}elseif($row['status'] == 1){echo "Onay Bekliyor";}elseif($row['status'] == 2){echo "Onaylandı";}?></td>
    
</tr>
          <?php
     }
}else{
    ?>
    <tr class="community-post-type">
    <th><span>Hiç sipariş bulunmuyor!</span></th>
</tr>
    <?php
}
?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                    <table class="table mt-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Destek Kayıtlarım </th> 
                                                <th>
                                                    <div class="community-post-tag">
                                                            <a href="new-ticket.php">+ Yeni Destek</a>
                                                        </div>
                                                </th>
                                                <th scope="col"> Tarih</th>
                                                <th scope="col">Durum</th>
                                                <th scope="col">#</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
    <?php
$query = $db->query("SELECT * FROM tickets WHERE user = '{$user['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        

    ?>
                                            
            <tr>
                <th scope="row">
                    <div class="community-post-wrap">
                        <div class="community-post-content">
                            <a href="#"><?=$row['konu']?></a>
                            <span><?php
                            if($row['departman'] == 1){
                                echo "Teknik Destek";
                            }elseif($row['departman'] == 2){
                                echo "Muhasebe";
                            }elseif($row['departman'] == 3){
                                echo "Satış & Mağaza";
                            }elseif($row['departman'] == 3){
                                echo "Hata & BUG";
                            }
                            echo " - ";

                            if($row['aciliyet'] == 1){
                                echo "Düşük Öncelik";
                            }elseif($row['aciliyet'] == 2){
                                echo "Orta Öncelik";
                            }elseif($row['aciliyet'] == 3){
                                echo "Yüksek Öncelik";
                            }
                            ?></span>
                        </div>
                        
                    </div>
                </th>
                <td></td>
                <td><span style="font-size:12px;"><?=$row['created_at']?></span></td>
                <td>
                    <?php
                    if($row['status'] == 0){
                        echo "ÇÖZÜLDÜ";
                    }elseif($row['status'] == 1){
                        echo "Açık";
                    }elseif($row['status'] == 2){
                        echo "Yanıtlandı";
                    }elseif($row['status'] == 3){
                        echo "Yanıtladınız";
                    }
                    ?>
                </td>
                <td class="community-bell"><a href="ticket-detail.php?id=<?=$row['id']?>"><i class="fas fa-search"></i></a></td>
            </tr>


<?php 
     }
}
?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="widget community-widget ">
                                <div class="game-single-title mt-60 mb-30">
                                    <h4>Profil Bilgileri <a id="edit" href="javascript:void(0)" style="padding: 5px;border:1px solid #E9A401;background: #E9A401; color:#fff;border-radius: 4px;"><i class="fas fa-edit fa-xs"></i></a></h4>
                                </div>
                                <div class="game-single-info mb-65" id="profil-bilgileri">
                                    <ul>
                                        <li><span>İsim :</span> <?=$user['user_firstname'].' '.$user['user_lastname']?></li>
                                        <li><span>Kullanıcı Adı :</span><?=$user['username']?></li>
                                        <li><span>E-posta Adresi :</span> <?=$user['email']?><sup><?php if($us['force_email_verify'] == 1){ ?>(<?=$user['email_verify'] ? '<i class="fas fa-check-circle text-success"></i>' : 'Doğrulama gerekli'; echo ')'; } ?> </sup></li>
                                        <li><span>Telefon :</span> <?=$user['user_phone'] ? $user['user_phone'] : "-";?></li>

                                        <li><span>Doğum Tarihi :</span> <?=$user['user_birthdate']?></li>
                                        <li><span>Konum :</span><?=$user['user_city'].'/'.$user['user_country']?></li>
                                         <li><span>Steam Kullanıcı Adı :</span><?=$user['steam']?></li>
                                          <li><span>PlayStation Kullanıcı Adı :</span><?=$user['playstation']?></li>
                                    </ul>
                                </div>

                                <div class="game-single-info mb-65 d-none" id="profil-duzenle">
                                    <ul>
<li>
    <div class="row mb-4">
        <label for="ad">İsminiz:</label>
        <div class="row">
            <div class="col-6"><input id="u_ad" class="form-control" type="text" value="<?=$user['user_firstname']?>"></div>
            <div class="col-6"><input class="form-control" type="text" value="<?=$user['user_lastname']?>" id="u_soyad"></div>
        </div>
    </div>
    <div class="row mb-4">
        <label for="ad">Doğum Tarihi:</label>
        <input class="form-control" type="date" value="<?=$user['user_birthdate']?>" id="u_dt">
    </div>
    <div class="row mb-4">
        <label for="ad">Telefon:</label>
        <input class="form-control" type="number" value="<?=$user['user_phone']?>" id="u_gsm">
    </div>
    <div class="row mb-4">
        <label for="ad">Konum:</label>
        <div class="row">
            <div class="col-6"><input class="form-control" type="text" value="<?=$user['user_city']?>" id="u_city" placeholder="Şehir"></div>
            <div class="col-6"><input class="form-control" type="text" value="<?=$user['user_country']?>" id="u_country" placeholder="Ülke"></div>
        </div>
    </div>
    <div class="row mb-4">
        <label for="ad">Steam Kullanıcı Adı:</label>
        <input class="form-control" type="text" value="<?=$user['steam']?>" id="u_steam">
    </div>
    <div class="row mb-4">
        <label for="ad">PlayStation Kullanıcı Adı:</label>
        <input class="form-control" type="text" value="<?=$user['playstation']?>" id="u_ps">
    </div>
</li>
<li>
        <a href="javascript:void(0)" class="btn" id="guncelle">Güncelle</a>
</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="community-sidebar">
                                <div class="widget community-widget mb-30">
                                    <div class="community-widget-title mb-25">
                                        <h5>Profil Durumum</h5>
                                    </div>
                                    <div class="community-sidebar-social">
                                        <ul>
<li><sup>Rank</sup>

<?php 


$up = $user['user_point'];

if($up <= 10){
    $level = 1;
}elseif($up > 10 && $up <= 300){
    $level = 2;
}elseif($up > 300 && $up <=1000){
    $level = 3;
}elseif($up > 1000 && $up <= 2000){
    $level = 4;
}elseif($up > 1000 && $up <= 3000){
    $level = 5;
}

$ranks = $db->query("SELECT * FROM user_ranks WHERE level = '{$level}'")->fetch(PDO::FETCH_ASSOC);


?>


    <a  href="javascript:void(0)"><img width="50" src="admin/uploads/ranks/<?=$ranks['rank_picture']?>"> <?=$ranks['rank_name']?></a>
</li>
                                            <li><sup>Sıra / Puan</sup><a href="javascript:void(0)">#1 / <?=$user['user_point'];?></a></li>
                                            <li><sup>Gem</sup><a href="javascript:void(0)"><i class="fas fa-gem"></i><?=$user['user_gem'];?></a></li>
                                            <li><sup>Hesap Durumu</sup>
                                                <?php 
                                                if($profil_durum == 0){
                                                    echo '<a class="text-white bg-danger" href="javascript:void(0)">Profilde Eksik Bilgiler Var</a>';
                                                }else{
                                                    if($user['user_status'] == 1){
                                                        echo '<a class="bg-warning text-white" href="javascript:void(0)">Askıya Alınmış</a>';
                                                    }elseif($user['user_status'] == 2){
                                                        echo '<a class="bg-success text-white" href="javascript:void(0)">Aktif</a>';
                                                    }
                                                }
                                                ?>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget community-widget">
                                    <div class="community-widget-title mb-25">
                                        <h5>Ödeme Geçmişi</h5>
                                    </div>
                                    <div class="community-sidebar-game">
                                        <ul>
<?php 
$query = $db->query("SELECT * FROM odeme_bildirimi WHERE user = '{$user['id']}' ORDER BY id DESC", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        foreach( $query as $row ){
            ?>
<li style="border-bottom: 1px solid #ddd;">
    <div class="sidebar-new-game-content">
        <span><?=$row['created_at']?></span>
        <h5><a href="#">
            <?php 
    $query = $db->query("SELECT * FROM gem_packages WHERE id = '{$row['paket']}'")->fetch(PDO::FETCH_ASSOC);
        echo $query['gem_name'];
        echo " - ";
        echo $row['tutar']."₺";
            ?>

        </a></h5>

        
    </div>
   <?php 
   if($row['status'] == 0){
    ?>
 <div class=" bg-danger" >
                <a href="#" style="color:#fff; padding: 20px;">
                    REDDEDİLDİ
                </a>
            </div>
    <?php
   }elseif($row['status'] == 1){
    ?>
 <div class="bg-warning" >
                <a href="#" style="color:#fff; padding: 20px;">
                    ONAY BEKLİYOR
                </a>
            </div>
    <?php
   }elseif($row['status'] == 2){
    ?>
 <div class=" bg-success">
                <a href="#" style="color:#fff; padding: 20px;">
                    ONAYLANDI
                </a>
            </div>
    <?php
   }
?>
</li>
            <?php
        }
    }
?>

                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="community-bg-shape"><img src="img/images/community_bg_shape.png" alt=""></div>
            </div>
            <!-- community-area-end -->


        </main>
       
        <!-- footer-area -->
        <?php include 'sections/footer.php'; ?>
        <!-- footer-area-end -->





        <!-- JS here -->
        <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/jquery.lettering.js"></script>
        <script src="assets/js/jquery.textillate.js"></script>
        <script src="assets/js/jquery.odometer.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/jquery.scrollUp.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
          $("#edit").on("click", function(){
            $(this).hide();
            $("#profil-bilgileri").hide();
            $("#profil-duzenle").show();
            $("#profil-duzenle").removeClass("d-none");
          });

          $("#guncelle").on("click", function(){
            var ad = $("#u_ad").val();
            var soyad = $("#u_soyad").val();
            var dt = $("#u_dt").val();
            var gsm = $("#u_gsm").val();
            var city = $("#u_city").val();
            var country = $("#u_country").val();
            var user = <?=$_SESSION['uid']?>;
            var steam = $("#u_steam").val();
            var ps = $("#u_ps").val();

                $.ajax({
                    type : 'POST',
                    url  : 'core/edit-profile.php',
                    data : {user:user, ad:ad, soyad:soyad, dt:dt, gsm:gsm, city:city, country:country,steam:steam,ps:ps},
                    dataType : 'JSON',
                    success: function(r){
                            toastr[r.t](r.m);
                            if(r.ok){
                                setTimeout(function(){
                                 window.location.reload(1);
                                }, 2000);
                            }
                        }
                })

          })
        </script>
    </body>
</html>
