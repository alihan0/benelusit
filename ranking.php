 <?php
 session_start();
    include 'config.php';

$yazi = $db->query("SELECT * FROM blog_posts WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

 ?>
<!doctype html>
<html class="no-js" lang="<?=$seo['seo_lang'];?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Oyunlar - <?=$seo['seo_title'];?></title>
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
                                <h2>Sıralama</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- community-area -->
            <section class="shop-area pt-120 pb-90">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-3"></div>
                        
                        
 <div class="col-lg-6">
                            <aside class="blog-sidebar">
                                
                                
                               
                                <div class="widget mb-45">
                                    <div class="sidebar-widget-title mb-25">
                                        <h4>TOP <span>50</span></h4>
                                    </div>
                                    <div class="rc-post-list">
                                        <ul>
<li>
    <div class="rc-post-thumb">
       <h5>SIRA</h5>
    </div>

    <div class="rc-post-content float-start"style="float:left;padding:10px 20px;width: 100%;">
        <h5>Oyuncu</h5>
    </div>
    <div class="rc-post-content ml-10" style="float:right;margin-left: 200px;padding: 10px;width: 10%;">
        <h5>Puan</h5>
    </div>
</li>   
                                            <?php
                                              $a = 0;
$query = $db->query("SELECT * FROM users ORDER BY user_point DESC LIMIT 50", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
      

        $a ++;
         ?>
      
<li>
    <div class="rc-post-thumb">
       <h5><?=$a?></h5>
    </div>

    <div class="rc-post-content float-start"style="float:left;padding:10px 20px;width: 100%;">
        <h5><?=$row['user_firstname'].' '.$row['user_lastname']?></h5>
        <span>@<?=$row['username']?></span>
    </div>
    <div class="rc-post-content ml-10" style="float:right;margin-left: 200px;padding: 10px;width: 10%;">
        <h5><?=$row['user_point']?></h5>
    </div>
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
               $(".addBasket").on("click", function(){
                let urun = $(this).parent("div").attr("id");
                let sessid = "<?=session_id()?>";

                 $.ajax({
                    type : 'POST',
                    url  : 'core/addBasket.php',
                    data : {urun:urun, sessid:sessid},
                    dataType: 'JSON',
                    success: function(r){
                        toastr[r.t](r.m);
                    }
                 })
               })
            </script>
    </body>
</html>
