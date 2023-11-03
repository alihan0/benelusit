 <?php
    session_start();
    include 'config.php';
    if (!$_GET['id']) {
        header("location:index.php");
    }

    $sorgu = $db->prepare("SELECT COUNT(*) FROM tournament_recourses WHERE tournament_id = '{$_GET['id']}'");
    $sorgu->execute();
    $kalitimci_sayisi = $sorgu->fetchColumn();


    $turnuva = $db->query("SELECT * FROM tournaments WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
    $oyun = $db->query("SELECT * FROM games WHERE id = '{$turnuva['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
    $maps = $db->query("SELECT * FROM game_maps WHERE id = '{$turnuva['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);


    $takim = $db->query("SELECT * FROM team_members WHERE user_id = '{$user['id']}'")->fetch(PDO::FETCH_ASSOC);

    ?>
 <!doctype html>
 <html class="no-js" lang="<?= $seo['seo_lang']; ?>">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Turnuva Detayları - <?= $seo['seo_title']; ?></title>
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
                             <img src="admin/uploads/games/<?= $oyun['game_cover']; ?>" alt="">
                         </div>
                     </div>
                     <div class="col-xl-8 col-lg-6">
                         <div class="breadcrumb-content text-center text-lg-left pl-80">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item active" aria-current="page"><?= $turnuva['tournament_start_date']; ?></li>
                                 </ol>
                             </nav>
                             <h2><?= $turnuva['tournament_name']; ?></h2>
                             <div class="game-overview-status">
                                 <ul>
                                     <li><span>Turnuva Modu :</span> <?php
                                                                        $t = $turnuva['tournament_type'];
                                                                        if ($t == 1) {
                                                                            echo "Herkes Tek";
                                                                        } elseif ($t == 2) {
                                                                            echo "1v1";
                                                                        } elseif ($t == 3) {
                                                                            echo "2v2";
                                                                        } elseif ($t == 4) {
                                                                            echo "3v3";
                                                                        } elseif ($t == 5) {
                                                                            echo "4v4";
                                                                        } elseif ($t == 6) {
                                                                            echo "5v5";
                                                                        }
                                                                        ?></li>
                                     <li><span>Katılım :</span><?php if ($turnuva['tournament_match_type'] == 1) {
                                                                    echo "Takımca";
                                                                } else {
                                                                    echo "Bireysel";
                                                                } ?></li>
                                     <li><span> Harita: </span><?= $maps['map_name']; ?></li>
                                     <li><span>Ücret :</span> <?= $turnuva['tournament_pay']; ?> <img src="assets/img/gem.png" style="width:25px;"></li>
                                 </ul>
                             </div>
                             <input type="hidden" value="<?= $_GET['id'] ?>" id="turnuva_id">
                             <input type="hidden" value="<?= $_SESSION['uid'] ?>" id="user_id">
                             <input type="hidden" value="<?= $takim['team_id'] ?>" id="team_id">



                             <?php

                                $query = $db->query("SELECT * FROM tournament_recourses WHERE tournament_id = '{$_GET['id']}' && user_id = '{$_SESSION['uid']}' ")->fetch(PDO::FETCH_ASSOC);

                                if ($query) {
                                    echo '<a href="javascript:void(0)" class="btn btn-style-two">Başvuru Durumunuz: ';
                                    $s = $query['status'];
                                    if ($s == 0) {
                                        echo '<span class="text-danger"> REDDEDILDI</span>';
                                    } elseif ($s == 1) {
                                        echo '<span class="text-info"> BEKLIYOR</span>';
                                    } elseif ($s == 2) {
                                        echo '<span class="text-success"> ONAYLANDI</span>';
                                    }
                                    echo '</a>';
                                } else {
                                    echo '<a href="javascript:void(0)" id="join" class="btn btn-style-two">Şimdi Katıl</a>';
                                }
                                ?>





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
                                     <span><?= $turnuva['tournament_start_date']; ?></span>
                                     <h4><?= $turnuva['tournament_name']; ?></h4>
                                 </div>
                             </div>
                             <p><?= $turnuva['tournament_desc']; ?></p>
                             <div class="game-single-title mt-50 mb-30">
                                 <h4>Ödüller</h4>
                             </div>
                             <div class="game-single-info mb-45">



                                 <ul>
                                     <?php
                                        $oduller = $turnuva['rewards'];

                                        $odullerArray = explode(",", $oduller);

                                        foreach ($odullerArray as $rowOduller) {
                                        ?>
                                         <li><span><?= $rowOduller ?></span></li>

                                     <?php } ?>

                                 </ul>
                             </div>


                             <div class="game-single-title mt-50 mb-30">
                                 <h4>Kurallar</h4>
                             </div>
                             <div class="game-single-info mb-45">
                                 <ul>
                                     <?php
                                        $kurallar = $turnuva['rules'];
                                        $kurallarArray = explode(",", $kurallar);
                                        foreach ($kurallarArray as $rowKurallar) { ?>
                                         <li><span><?= $rowKurallar ?></span></li>
                                     <?php }
                                        ?>


                                 </ul>
                             </div>
                             <span class="btn btn-style-two">Mod: <?php
                                                                    $t = $turnuva['tournament_type'];
                                                                    if ($t == 1) {
                                                                        echo "Herkes Tek";
                                                                    } elseif ($t == 2) {
                                                                        echo "1v1";
                                                                    } elseif ($t == 3) {
                                                                        echo "2v2";
                                                                    } elseif ($t == 4) {
                                                                        echo "3v3";
                                                                    } elseif ($t == 5) {
                                                                        echo "4v4";
                                                                    } elseif ($t == 6) {
                                                                        echo "5v5";
                                                                    }
                                                                    ?></span>
                             <span class="btn btn-style-two">Katılım: <?php if ($turnuva['tournament_match_type'] == 1) {
                                                                            echo "Takımca";
                                                                        } else {
                                                                            echo "Bireysel";
                                                                        } ?></span>
                             <span class="btn btn-style-two">Oyun: <?= $oyun['game_name']; ?></span>
                             <span class="btn btn-style-two">Harita: <?= $maps['map_name']; ?></span>
                             <span class="btn btn-style-two">Kontenjan: <?= $turnuva['tournament_participants']; ?></span>
                             <hr>
                             <span class="btn btn-style-two">Katılımcı: <?= $kalitimci_sayisi; ?>/<?= $turnuva['tournament_participants']; ?></span>
                             <span class="btn btn-style-two">Başlama Tarihi: <?= $turnuva['tournament_start_date']; ?></span>
                             <span class="btn btn-style-two">Kazanan Sayısı: <?= $turnuva['tournament_winner_number']; ?></span>




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
         $("#join").on("click", function() {
             var turnuva_id = $("#turnuva_id").val();
             var user_id = $("#user_id").val();
             var team_id = $("#team_id").val();

             if (user_id == "") {
                 toastr["warning"]("Turnuvaya katılabilmek için oturum açmanız gerekiyor");
             } else {
                 $.ajax({
                     type: 'POST',
                     url: './core/join.php',
                     data: {
                         turnuva_id: turnuva_id,
                         user_id: user_id,
                         team_id: team_id
                     },
                     dataType: 'JSON',
                     success: function(r) {
                         toastr[r.t](r.m);
                         if (r.ok) {
                             setTimeout(function() {
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