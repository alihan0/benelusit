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
       <!--  preloader-end -->

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
            <section class="contact-area pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-dark">
                            <div class="community-widget-title mb-25">
                <h5 style="font-size:32px">Dikkat!</h5>
                  <h5>Ödeme Bildirimi Yapmadan Önce Mutlaka Okuyunuz!</h5>
                  <hr>
                  <p class="text-dark">
                      Aşağıdaki alandan bulunan banka bilgilerimize satın almak istediğiniz paketin tutarını HAVALE/EFT olarak gönderin. Daha sonra bankanızdan aldığınız dekonttaki bilgilere göre Ödeme Bildirimi formunu doldurun ve ödeme bildirimi oluşturun. Tüm ödeme bildirimleri yetkililer tarafından kontrol edildikten sonra onaylanacaktır.  Onaylanmayan ödeme bildirimleri için lütfen destek talebi oluşturarak bilgi verin.
                  </p>
                  <hr>
            </div>
                          
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

    <aside class="community-sidebar">
        <div class="widget community-widget mb-30">
            <div class="community-widget-title mb-25">
                <h5>Banka Bilgilerimiz</h5>
            </div>
            <div class="community-sidebar-social">
                <ul>
                    <li><sup>Banka Adı</sup><a href="#"><?=$bank['banka_adi']?></a></li>
                    <li><sup>Şube Adı/Kodu:</sup><a href="#"><?=$bank['sube']?></a></li>
                    <li><sup>IBAN</sup><a href="#"><?=$bank['iban']?></a></li>
                    <li><sup>ALICI</sup><a href="#"><?=$bank['sahip']?></a></li>
                </ul>
            </div>
        </div>
    </aside>

                        </div>
                        <div class="col-lg-6 pl-45">
                            <div class="section-title title-style-three mb-20">
                                <h2>Ödeme  <span>Bildirimi</span></h2>
                            </div>
                            
                            <div class="contact-form">
                                <form>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="gonderen" placeholder="Gönderen Adı">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="tutar" placeholder="Gönderilen Tutar">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="tarih" placeholder="Havale Tarihi">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="saat" placeholder="Havale Saati">
                                        </div>
                                    </div>
                                    <button id="odeme">Ödeme Bildirimi Oluştur</button>
                                </form>
                            </div>
                            <?php
                            include 'shopier/index.php';
                            ?>
                        </div>
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

          $("#odeme").on("click", function(e){
            e.preventDefault();
            var gonderen = $("#gonderen").val();
            var tutar = $("#tutar").val();
            var tarih = $("#tarih").val();
            var saat = $("#saat").val();
            var paket = "<?=$_GET['paket']?>";

                $.ajax({
                    type : 'POST',
                    url  : 'core/gem.php',
                    data : {gonderen:gonderen,paket:paket, tutar:tutar, tarih:tarih, saat:saat},
                    dataType : 'JSON',
                    success: function(r){
                            toastr[r.t](r.m);
                            if(r.ok){
                                setTimeout(function(){
                                 window.location.assign("profil.php");
                                }, 2000);
                            }
                        }
                })

          })
        </script>
    </body>
</html>
