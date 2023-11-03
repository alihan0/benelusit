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
        <title>Blog - <?=$seo['seo_title'];?></title>
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
                                <h2>Blog Yazıları</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- community-area -->
            <section class="blog-area primary-bg pt-120 pb-175">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            
                            
<?php
$query = $db->query("SELECT * FROM blog_posts", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
         ?>
<div class="blog-list-post">
                                <div class="blog-list-post-thumb">
                                    <a href="blog-detail.php?id=<?=$row['id']?>"><img width="50" src="admin/uploads/blog/<?=$row['blog_cover']?>" alt=""></a>
                                </div>
                                <div class="blog-list-post-content">
                                    
                                    <h2><a href="blog-detail.php?id=<?=$row['id']?>"><?=$row['blog_title']?></a></h2>
                                    <div class="blog-meta">
                                        <ul>
                                            <li><?=$row['created_at']?></li>
                                        </ul>
                                    </div>
                                    <p><?=substr($row['blog_desc'],0,300)?></p>
                                </div>
                                <div class="blog-list-post-bottom">
                                    <ul>
                                        <li><a href="blog-detail.php?id=<?=$row['id']?>">Oku<i class="fas fa-angle-double-right"></i></a></li>
                                        
                                    </ul>
                                </div>







                            </div>
         <?php
     }
}
                                            ?>



                            
                            
                        </div>
                        <div class="col-lg-4">
                            <aside class="blog-sidebar">
                                
                                
                                <div class="widget mb-45">
                                    <div class="sidebar-widget-title mb-25">
                                        <h4>Kategoriler</h4>
                                    </div>
                                    <div class="sidebar-cat">
                                        <ul>
                                            <?php
$query = $db->query("SELECT * FROM blog_categories", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
         ?>
 <li><a href="javascript:void(0)"><?=$row['cat_name']?></a></li>
         <?php
     }
}
                                            ?>
                                        
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget mb-45">
                                    <div class="sidebar-widget-title mb-25">
                                        <h4>Son <span>Yazılar</span></h4>
                                    </div>
                                    <div class="rc-post-list">
                                        <ul>
                                            <?php
$query = $db->query("SELECT * FROM blog_posts", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
         ?>
<li>
    <div class="rc-post-thumb">
        <a href="blog-detail.php?id=<?=$row['id']?>"><img width="50" src="admin/uploads/blog/<?=$row['blog_cover']?>" alt=""></a>
    </div>
    <div class="rc-post-content">
        <h5><a href="blog-detail.php?id=<?=$row['id']?>"><?=$row['blog_title']?></a></h5>
        <span><?=$row['created_at']?></span>
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
        
    </body>
</html>
