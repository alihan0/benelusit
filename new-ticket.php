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
        <title>Yeni Destek Talebi - <?=$seo['seo_title'];?></title>
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


.faqs-container {
    margin: 0 auto;
    max-width: 600px;
}

.faq {
    background-color: #E3A103;
    border: 1px solid #9FA4A8;
    border-radius: 10px;
    padding: 15px;
    position: relative;
    overflow: hidden;
    margin: 10px 0;
    transition: 0.3s ease;
}

.faq.active {
    background-color: #4173B1;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
}

.faq.active::after, .faq.active::before {
    color: #2ecc71;
    content: '\f075';
    font-family: 'Font Awesome 5 Free';
    font-size: 7rem;
    position: absolute;
    opacity: 0.2;
    top: 20px;
    left: 20px;
    z-index: 0;
}

.faq.active::before {
    color: #3498db;
    top: -10px;
    left: -30px;
    transform: rotateY(180deg);
}

.faq-title {
    margin: 0 35px 0 0;
}

.faq-text {
    display: none;
    margin: 30px 0 0;
}

.faq.active .faq-text {
    display: block;
}

.faq-toggle {
    background-color: transparent;
    border: none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    padding: 0;
    position: absolute;
    top: 30px;
    right: 30px;
    height: 30px;
    width: 30px;
}

.faq-toggle:focus {
    outline: none;
}

.faq.active .faq-toggle {
    background-color: #9FA4A8;
}

.faq-toggle .fa-times {
    display: none;
}

.faq.active .faq-toggle .fa-times {
    display: block;
}

.faq-toggle .fa-chevron-down {
    color: #83888E;
}

.faq.active .faq-toggle .fa-chevron-down {
    display: none;
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
                                <h2>Destek Talebi Oluştur</h2>

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
                  <h5>Destek Kaydı Oluşturmadan Önce Mutlaka Okuyunuz!</h5>
                  <hr>
                  <p class="text-dark">
                      Destek sistemimiz size en hızlı şekilde yardımcı olabilmemiz için tasarlandı. Destek ekibimiz düzenli olarak destek kayıtlarını inceliyor ve sizlere yardımcı olabilmek için ellerinden geleni yapıyorlar. Lütfen sizlere daha doğru ve hızlı bir şekilde yardımcı olabilmemiz için aşağıdaki şu adımlara dikkat ediniz:
                  </p>
                  <ul>
                      <li>- Yeni bir destek kaydı oluşturmadan önce lütfen S.S.S. alanında sorunuzun cevabı var mı, bakın.</li>
                      <li>- Lütfen oluşturmak istediğiniz destek talebi için doğru departmanı seçin.</li>
                      <li>- Destek kaydı oluştururken konu başlağınızı mümkün olduğu kadar net ve açık yazın.</li>
                      <li>- Destek talebinizin önceliğinin doğru belirtilmesi önemlidir. Gereksiz yere "acil" işaretlenen destek kayıtları sistem tarafından geçersiz sayılmanıza yol açabilir.</li>
                      <li>- Çözülen destek taleplerinizi kapatmayı unutmayın.</li>
                      <li>- Destek sistemi üzerinden küfürlü, argo ve hakaret içerikli konuşmaların ceza almanıza yol açabileceğini unutmyın!</li>
                  </ul>
                  <hr>
            </div>
                          
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

<div class="faqs-container">
    

<?php
$query = $db->query("SELECT * FROM faq", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        ?>
        <div class="faq">
            <h3 class="faq-title">
                <?=$row['ask']?>
            </h3>
            <p class="faq-text">
                <?=$row['answer']?>
            </p>
            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>
        <?php
     }
}
?>

    
</div>

</div>
                        <div class="col-lg-6 pl-45">
                            <div class="section-title title-style-three mb-20">
                                <h2>Yeni Destek  <span>Talebi</span></h2>
                            </div>
                            
                            <div class="contact-form">
                                <form>
                                
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="form-control" id="departman">
                                                <option value="0">Departman Seçin</option>
                                                <option value="1">Teknik Destek</option>
                                                <option value="2">Muhasebe</option>
                                                <option value="3">Satış & Mağaza</option>
                                                <option value="4">Hata & BUG</option>
                                            </select>
                                        </div>
                                        <hr>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="konu" placeholder="Konu">
                                        </div>
                                        <div class="col-md-6">
                                           <select class="form-control" id="aciliyet">
                                                <option value="0">Öncelik</option>
                                                <option value="1">Düşük</option>
                                                <option value="2">Orta</option>
                                                <option value="3">Yüksek</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea id="mesaj" placeholder="Mesajınız"></textarea>
                                        </div>
                                        <hr>
                                    
                                    </div>
                                    <button id="destek">Destek Kaydı Oluştur</button>
                                </form>
                            </div>
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

          $("#destek").on("click", function(e){
            e.preventDefault();
            var departman = $("#departman").val();
            var konu = $("#konu").val();
            var aciliyet = $("#aciliyet").val();
            var mesaj = $("#mesaj").val();
            var user = "<?=$_SESSION['uid']?>";

                $.ajax({
                    type : 'POST',
                    url  : 'core/ticket.php',
                    data : {departman:departman,user:user, konu:konu, aciliyet:aciliyet, mesaj:mesaj},
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
        <script type="text/javascript">
            const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        toggle.parentNode.classList.toggle('active');
    });
});

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');

        </script>
    </body>
</html>
