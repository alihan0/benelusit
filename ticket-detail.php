 <?php
 session_start();
    include 'config.php';


    $d = $db->query("SELECT * FROM tickets WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

 ?>
<!doctype html>
<html class="no-js" lang="<?=$seo['seo_lang'];?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Destek Detayları - <?=$seo['seo_title'];?></title>
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
        <style type="text/css">
            .chat{
                
                float: left;
                width: 100%;
                border-bottom: 1px solid #ddd;
                padding: 10px;
                color: #aaa;
                margin-bottom: 20px;
            }
            .sistem{
                text-align: center;
                color: #fff;
                background-color: #890000;

            }
            .user{
                text-align: right;
                color: #555;
            }
        </style>
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
                                <h2>Destek Detayları</h2>

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


<div class="row">
<div class="col-12">

                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                    <table class="table mt-0">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?=$d['konu']?></th>
                                                <th scope="col"><?php if($d['departman'] == 1){
                                echo "Teknik Destek";
                            }elseif($d['departman'] == 2){
                                echo "Muhasebe";
                            }elseif($d['departman'] == 3){
                                echo "Satış & Mağaza";
                            }elseif($d['departman'] == 3){
                                echo "Hata & BUG";
                            } ?></th>
                                                <th scope="col"><?php
                            if($d['aciliyet'] == 1){
                                echo "Düşük Öncelik";
                            }elseif($d['aciliyet'] == 2){
                                echo "Orta Öncelik";
                            }elseif($d['aciliyet'] == 3){
                                echo "Yüksek Öncelik";
                            }
                                            ?></th>
                                            </tr>
                                        </thead>
                                    </table>
             
                                </div>
                            </div>

</div>
</div>
<div class="row">
<div class="col-12">

<div class="card">
    <div class="card-body">
        <?php
        $query = $db->query("SELECT * FROM ticket_chat WHERE ticket_id = '{$_GET['id']}' ORDER BY id ASC", PDO::FETCH_ASSOC);
            if ( $query->rowCount() ){
                 foreach( $query as $row ){
                     ?>
   <span class="chat <?php if($row['sender'] == 0){echo "sistem";}elseif($row['sender'] == 1){echo "user";}elseif($row['sender'] == 2){echo "staf";}?>"><?=$row['message']?>
    
   </span>
                     <?php
                 }
            }
        ?>
     
      

    </div>
</div>

</div></div>
<?php

if($d['status'] != 0){
    ?>
<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
        <div class="row">>
        <div class="col-8">
            <input type="text" class="form-control" id="yanit" placeholder="Yanıtınız...">
        </div>
    
        <div class="col-3">
            <a class="btn btn-success" id="yanitla">Yanıtla</a>
        </div>
    </div>
</div>
</div>
</div>
    </div>
    <?php
}

?>



                        </div>
                        <div class="col-lg-4">
                            <aside class="community-sidebar">
                                <div class="widget community-widget mb-30">
                                    <div class="community-widget-title mb-25">
                                        <h5>Tabep Durumu</h5>
                                    </div>
                                    <div class="community-sidebar-social">
                                        <ul>

                                            <li><sup>Talep Durumu</sup>
                                                <?php 
                                                if($d['status'] == 0){
                                                    echo '<a class="text-white bg-danger" href="javascript:void(0)">ÇÖZÜLDÜ</a>';
                                                }else{
                                                    if($d['status'] == 1){
                                                        echo '<a class="bg-info text-white" href="javascript:void(0)">AÇIK</a>';
                                                    }elseif($d['status'] == 2){
                                                        echo '<a class="bg-success text-white" href="javascript:void(0)">YANITLANDI</a>';
                                                    }elseif($d['status'] == 3){
                                                        echo '<a class="bg-primary text-white" href="javascript:void(0)">YANITLADINIZ</a>';
                                                    }
                                                }
                                                ?>
                                                
                                            </li>
                                            <?php

if($d['status'] != 0){
    ?>
                                             <li><sup>İŞLEM</sup>
                                                <a  href="javascript:void(0)" id="kapat">Talebi Kapat</a>
                                            </li>
                                        <?php } ?>
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

$("#yanitla").on("click", function(){
    let yanit = $("#yanit").val();
    let ticket = "<?=$_GET['id']?>";
        
       $.ajax({
                    type : 'POST',
                    url  : 'core/ticket-yanitla.php',
                    data : {yanit:yanit,ticket:ticket},
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
});

$("#kapat").on("click", function(){
    let ticket = "<?=$_GET['id']?>";

    $.ajax({
                    type : 'POST',
                    url  : 'core/ticket-kapat.php',
                    data : {ticket:ticket},
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
