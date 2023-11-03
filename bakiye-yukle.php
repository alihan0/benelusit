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
        <title>Bakiye Yükle - <?=$seo['seo_title'];?></title>
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
                                <h2>Bakiye Yükle</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- community-area -->
            <section class="shop-area pt-120 pb-90">
                <div class="container">
                    <h3 style="color:#666">Lütfen sipariş verirken "Satıcı Notu" kısmına, sisteme kayıt olduğunuz <u>e-posta</u> adresinizi ve <u>kullanıcı adınızı</u> yazınız...</h3><br><br>
                    <div class="row">
<?php 
$query = $db->query("SELECT * FROM gem_packages", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        ?>
        <div class="col-lg-4 col-sm-6">
                            <div class="accessories-item text-center mb-80">
                                <div class="accessories-thumb mb-30">
                                    <a target="_blank" href="<?=$row['gem_link']?>"><img src="assets/img/gem-paket.png" alt=""></a>
                                </div>
                                <div class="accessories-content">
                                    <h5><a target="_blank" href="<?=$row['gem_link']?>"><?=$row['gem_name']?></a></h5>

                                   

                                </div><b>
                                <span><?=$row['gem_adet']?> <img  width="25" src="assets/img/gem.png"></span>
                                <br>
                                    <span>Fiyatı: <?=$row['gem_fiyat']?>₺</span>
                            </b><br>
                             <a target="_blank" href="<?=$row['gem_link']?>" class="btn btn-success">Satın Al</a>

                        </div>

                        </div>
        <?php
     }
}
?>
                    </div>
                </div>
            </section>
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

                $.ajax({
                    type : 'POST',
                    url  : 'core/edit-profile.php',
                    data : {user:user, ad:ad, soyad:soyad, dt:dt, gsm:gsm, city:city, country:country},
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
