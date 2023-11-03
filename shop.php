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
        <title>Mağaza - <?=$seo['seo_title'];?></title>
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
                                <h2>Mağaza</h2>
                                
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
                        
                        
                        
                        
    <?php 
$query = $db->query("SELECT * FROM shop_product", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $query = $db->query("SELECT * FROM shop_categories WHERE id = '{$row['p_cat']}'")->fetch(PDO::FETCH_ASSOC);
        ?>
<div class="col-lg-4 col-sm-6">
                            <div class="accessories-item text-center mb-80">
                                <div class="accessories-thumb ">
                                    <a href="product.php?id=<?=$row['id']?>"><img src="admin/uploads/products/<?=$row['p_pic']?>" alt=""></a>
                                </div>
                                <div class="product-content" style="background:#252634;">
                                    <div class="product-tag"><a href="#"><?=$query['cat_name']?></a></div>
                                    <h4><a href="product.php?id=<?=$row['id']?>"><?=$row['p_name']?></a></h4>
                                    <div class="product-meta">
                                        <div class="product-price">
                                            <h5><?=$row['p_price']?><img src="assets/img/gem.png" style="width:25px;"></h5>
                                        </div>
                                        <div class="product-cart-action" id="<?=$row['id']?>">
                                            <a href="javascript:void(0)" class="addBasket"><i class="fas fa-shopping-basket"></i></a>
                                        </div>
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
