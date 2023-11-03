 <?php
 session_start();
    include 'config.php';
$sess = session_id();


 $Fiyat=$db->prepare("SELECT SUM(price) AS takma_ad FROM shop_basket WHERE sessid = '{$sess}'");
$Fiyat->execute();
$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);


 ?>
<!doctype html>
<html class="no-js" lang="<?=$seo['seo_lang'];?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kasa - <?=$seo['seo_title'];?></title>
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
                                <h2>KASA</h2>
                               

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
                                                <th scope="col">Sepet</th>
                                                <th scope="col">Fiyat</th>
                                                <th scope="col">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="community-post-type">
                                                <th><span>Ürünlerim</span></th>
                                            </tr>
                                            <?php

$query = $db->query("SELECT * FROM shop_basket WHERE sessid = '{$sess}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
$u = $db->query("SELECT * FROM shop_product WHERE id = '{$row['urun_id']}'")->fetch(PDO::FETCH_ASSOC);
$c = $db->query("SELECT * FROM shop_categories WHERE id = '{$u['p_cat']}'")->fetch(PDO::FETCH_ASSOC);

          ?>
<tr>
    <th scope="row">
        <div class="community-post-wrap">
            <div class="community-post-content">
                <a href="#"><?=$u['p_name']?></a>
                <span><?=$c["cat_name"]?></span>
            </div>
        </div>
    </th>
    <td><?=$u['p_price']?>
        <img src="assets/img/gem.png" style="width:25px;">
    </td>
    <td id="<?=$row['id']?>"><a href="javascript:void(0)" class="text-danger silItem"><i class="fas fa-trash"></i></a></td>
</tr>
          <?php
               }
}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="community-sidebar-social">
                                        <ul>
                                            <li>
                                                <a  style="background: #E4A101;color:#fff" href="shop.php">Alışverişe Devam Et</a>
                                            </li>

                                        </ul>
                                    </div>
                            
                            
                            
                        </div>
                        <div class="col-lg-4">
                            <aside class="community-sidebar">
                                <div class="widget community-widget mb-30">
                                    <div class="community-widget-title mb-25">
                                        <h5>Kasa</h5>
                                    </div>
                                    <div class="community-sidebar-social">
                                        <ul>
                                            <li><sup>Toplam:</sup>
                                                <a  href="javascript:void(0)">
                                                    <?=$FiyatYaz['takma_ad']?>
                                                    <img src="assets/img/gem.png" style="width:25px;">
                                                </a>
                                            </li>
                                            <li></li>
                                            <li></li>
                                            <li>
                                                <input type="hidden" id="sess" value="<?=session_id()?>">
                                           <a class="bg-info text-white" id="addOrder" href="javascript:void(0)">Sipariş Oluştur</a>
                                                
                                            </li>
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
         
          $(".silItem").on("click", function(){
                let urun = $(this).parent("td").attr("id");

                $.ajax({
                    type : 'POST',
                    url :  'core/removeBasket.php',
                    data : {urun:urun},
                    success: function (r) {
                         window.location.reload()
                    }
                })
          });

          $("#addOrder").on("click", function(){
            let sess = $("#sess").val();

            $.ajax({
                    type : 'POST',
                    url :  'core/addOrder.php',
                    data : {sess:sess},
                    dataType : 'JSON',
                    success: function (r) {
                        
                        if(r.login){
                            $("#search-modal").modal("show");
                        }else{
                            toastr[r.t](r.m);
                            if(r.devam){
                                 setTimeout(function(){
                                       window.location.assign("profil.php");

                                    }, 2000);
                            }
                        }

                    }
                })
          });
        </script>
    </body>
</html>
