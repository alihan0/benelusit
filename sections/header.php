<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome-animation@1.1.1/css/font-awesome-animation.min.css">
<header class="header-style-four">
            <div class="header-top-area s-header-top-area d-none d-lg-block">
                <div class="container custom-container-two">
                    <div class="row align-items-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <!-- TOP BAR SOL TARAF -->
                        </div>
                        <div class="col-lg-6">
                            <div class="header-social">
                                <span>Sosyal Medya :</span>
                                <ul>
                                 <li><a href="https://twitter.com/benelusit" target="blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/benelusitgame/?igshid=YmMyMTA2M2Y=" target="blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://discord.gg/G9XBWY4P" target="blank"><i class="fab fa-discord"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCwoSLvbk4lFoPDbp8O0snfA/featured" target="blck"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-four-wrap">
                <div class="container custom-container-two">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-menu menu-style-two">
                                <nav>
                                    <div class="logo">
                                        <a href="index.php"><img src="assets/img/logo/PSD.png" alt="Logo" width="250" style="margin-left:-30px"></a>
                                    </div>
                                    <div id="mobile-menu" class="navbar-wrap d-none d-lg-flex">
                                        <ul>
                                            <li class="show"><a href="index.php">Anasayfa</a>
                                            </li>
                                            <li><a href="#">Keşfet</a>
                                                <ul class="submenu">
                                                    <li><a href="games.php">Oyunlar</a></li>
                                                    <li><a href="tournaments.php">Turnuvalar</a></li>
                                                    <li><a href="ranking.php">Sıralama</a></li>
                                                </ul>
                                            </li>
                                    
                                           
                                            <li><a href="shop.php">Mağaza</a></li>
                                            <li><a href="blog.php">Blog</a></li>


<?php 

    if(isset($_SESSION['login'])){

    $user_ranks = $db->query("SELECT * FROM user_ranks WHERE id = '{$user['user_rank']}'")->fetch(PDO::FETCH_ASSOC);

        ?>

            <li><a  data-toggle="modal" data-target="#login-modal" class="btn" href="javascript:void(0)"><i class="fas fa-user"></i> <?=$user['user_firstname'] .' '.$user['user_lastname'] ;?></a>
                <ul class="submenu">
                    <table class="table">
                        <tr>

<?php 
$query = $db->query("SELECT * FROM team_members WHERE user_id = '{$user['id']}'")->fetch(PDO::FETCH_ASSOC);

if($query){
    $t = $db->query("SELECT * FROM teams WHERE id = '{$query['team_id']}' ")->fetch(PDO::FETCH_ASSOC);
    ?>
    <td style="border-top:0 !important;"><img width="25" src="assets/img/Settlement.png"></td>
                            <td style="width: 100%;border-top:0 !important;"><span style="font-size: 12px !important;"><?=$t['team_name'];?></span></td>
    <?php
}
?>
                        </tr>
                        <tr>
                            <td style="border-top:0 !important;" class="d-flex"><i class="fab fa-first-order mr-2 mt-1"></i> <?=$user['user_point'];?></td>
                            <td style="border-top:0 !important;"><i class="far fa-gem"></i> <?=$user['user_gem'];?></td>
                        </tr>
                    </table>
                    <li>
                        <?php
                            if($profil_durum == 0){
                                echo '<a href="profil.php">Profil <i style="color:red" class="fas fa-exclamation fa-lg faa-wrench animated"></i></a>';
                            }else{
                                echo '<a href="profil.php">Profil</a>';
                            }

                        ?>
                        </li>
                         <li><a href="team.php">Takım</a></li>
                    <li><a href="bakiye-yukle.php">Bakiye Yükle</a></li>
                    <li> <a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
                </ul>
            </li>
        <?php


    }else{


?>

                                            <li><a  data-toggle="modal" data-target="#search-modal" href="javascript:void(0)"><i class="fas fa-user"></i> Giriş Yap</a></li>
<?php } ?>

 

                                        </ul>
                                    </div>
                                    <div class="header-action">
    <ul>
        <li class="header-shop-cart">
            <a href="#"><i class="fas fa-shopping-basket"></i><span id="basketSay"></span></a>
            <div id="basket"></div>
        </li>
    </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                        <!-- Modal Search -->
                    </div>
                </div>
            </div>
        </header>


        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <input type="text" id="username" placeholder="Kullanıcı Adı">
                                        <input type="password" id="password" placeholder="Şifre">
                                        <br>
                                        

<?php 

if($us['user_register_permission'] == 1){
    ?>
    <a data-toggle="modal" data-target="#register-modal" class="btn btn-info mt-5" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Hesap Oluştur</a>
    <?php
}

?>
                                         

                                         <a id="login-btn"  class="btn mt-5" href="javascript:void(0)"><i class="fas fa-sign-in-alt fa-lg"></i>Giriş Yap</a>

                                        <hr>
                                        <p>Şifreni mi unuttun? <a href="#">Sıfırla</a></p>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <div class="row">
                                        <input class="col-6" id="ad" type="text" placeholder="Ad">
                                        <input class="col-6" id="soyad" type="text" placeholder="Soyad
                                        "></div>
                                        <input type="text" id="kadi"  placeholder="Kullanıcı Adı">
                                        <input type="email" id="mail" placeholder="Eposta">
                                        <input type="password" id="pass" placeholder="Şifre">
                                        <br>
                                        

                                         <a id="register-btn" class="btn btn-info mt-5" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Hesap Oluştur</a>

                                    </form>
                                </div>
                            </div>
                        </div>
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
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
</script>


<script type="text/javascript">
setInterval(function () {
       $("#basket").load("sections/basket.php");
       $("#basketSay").load("core/sayBasket.php");
   }, 1000);
 
    
    $("#register-btn").on("click", function(){
        var ad = $("#ad").val();
        var soyad = $("#soyad").val();
        var kadi = $("#kadi").val();
        var mail = $("#mail").val();
        var pass = $("#pass").val();

        $.ajax({
            type: 'POST',
            url : 'core/register.php',
            data : {ad:ad, soyad:soyad, kadi:kadi, mail:mail, pass:pass},
            dataType : 'JSON',
            success: function(r){
                toastr[r.t](r.m);
                if(r.ok){
                   $("#register-modal").modal('hide');
                   $("#username").val(kadi);
                }
            }
        })
    });

    $("#login-btn").on("click", function(){
        var kadi = $("#username").val();
        var pass = $("#password").val();

        $.ajax({
            type: 'POST',
            url : 'core/login.php',
            data : {kadi:kadi,pass:pass},
            dataType : 'JSON',
            success: function(r){
                toastr[r.t](r.m);
                if(r.ok){
                   $("#search-modal").modal('hide');
                   setTimeout(function(){
                     window.location.reload(1);
                    }, 2000);

                }
            }
        })
    })
</script>