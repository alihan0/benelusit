 <?php
 session_start();
    include 'config.php';
    if(!$_GET['id']){
        header("location:index.php");
    }


$oyun = $db->query("SELECT * FROM games WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

 ?>
<!doctype html>
<html class="no-js" lang="<?=$seo['seo_lang'];?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Oyun Detayları - <?=$seo['seo_title'];?></title>
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
            <div class="breadcrumb-area breadcrumb-bg game-overview-breadcrumb">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="game-overview-img">
                                <img src="admin/uploads/games/<?=$oyun['game_cover'];?>" alt="">
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6">
                            <div class="breadcrumb-content text-center text-lg-left pl-80">
                     
                                <h2><?=$oyun['game_name'];?> <i class="fas fa-bullseye-pointer"></i></h2>
                                
                               

                              




                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- game-single-area -->
            <section class="game-single-area pt-120 pb-180">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="game-single-content game-overview-content">
                                <div class="upcoming-game-head">
                                    <div class="uc-game-head-title">
                                       
                                        <h4><a href="<?=$oyun['game_official_web']?>" target="_blank"><?=$oyun['game_name'];?> <i class="fas fa-link"></i></a></h4>
                                    </div>
                                </div>
                                <p><?=$oyun['game_desc'];?></p>
                                <div class="game-single-title mt-50 mb-30">
                                    <h4>Kategori</h4>
                                </div>
                                <div class="game-single-info mb-45">




    <?php
        $c = $oyun['game_categori'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            $cat = $db->query("SELECT * FROM game_categories WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            ?>
            <span class="btn btn-style-two"><?=$cat['categori_name']?></span>
            <?php
        }

    ?>

                                </div>
<div class="game-single-title mt-50 mb-30">
    <h4>Oyun Türü</h4>
</div>
<div class="game-single-info mb-45">




    <?php
        $c = $oyun['game_kind'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            $cat = $db->query("SELECT * FROM game_kinds WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            ?>
            <span class="btn btn-style-two"><?=$cat['kind_name']?></span>
            <?php
        }

    ?>

</div>

<div class="game-single-title mt-50 mb-30">
    <h4>Oyun Platformu</h4>
</div>
<div class="game-single-info mb-45">




    <?php
        $c = $oyun['game_platform'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            $cat = $db->query("SELECT * FROM game_platforms WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            ?>
            <span class="btn btn-style-two"><?=$cat['platform_name']?></span>
            <?php
        }

    ?>

</div>
<div class="game-single-title mt-50 mb-30">
    <h4>Haritalar</h4>
</div>
<div class="game-single-info mb-45">



<div class="row">
    <?php


      $query = $db->query("SELECT * FROM game_maps WHERE game_id = '{$_GET['id']}'", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                 ?>
                  
                        
                        
                        
                        
    <div class="col-lg-4 col-sm-6">
                            <div class="accessories-item text-center mb-80">
                                <div class="accessories-thumb ">
                                    <a href="#"><img src="admin/uploads/maps/<?=$row['map_cover']?>" alt=""></a>
                                </div>
                                <div class="product-content" style="background:#252634;">
                                    <div class="product-tag"><a href="#"><?=$oyun['game_name']?></a></div>
                                    <h4><a href="#"><?=$row['map_name']?> </a></h4>
                                    
                                </div>
                            </div>
                        </div>

                 <?php
             }
        }
    ?>

</div>

            </div>                 
                                
                                
                                <div class="game-single-shape"><img src="assets/img/images/game_section_shape.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- game-single-area-end -->

        </main>
        <!-- main-area-end -->

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
            $("#join").on("click", function(){
                var turnuva_id = $("#turnuva_id").val();
                var user_id = $("#user_id").val();
                var team_id = $("#team_id").val();
                
                if(user_id == ""){
                    toastr["warning"]("Turnuvaya katılabilmek için oturum açmanız gerekiyor");
                }else{
                    $.ajax({
                        type : 'POST',
                        url  : 'core/join.php',
                        data : {turnuva_id:turnuva_id, user_id:user_id, team_id:team_id},
                        dataType : 'JSON',
                        success: function(r){
                            toastr[r.t](r.m);
                            if(r.ok){
                                setTimeout(function(){
                                 window.location.reload(1);
                                }, 2000);
                            }
                        }
                    });
                }
            })
        </script>
    </body>
</html>
