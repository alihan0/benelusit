<?php
    require 'engine.php';
    if(isset($_SESSION['admin'])){
        header("location:index.php");
    }
?>
<!doctype html>
<html lang="tr">
<head>
        
        <meta charset="utf-8" />
        <title>Metadmin | Login - Benelusit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <?php require 'add-styles.php'; ?>
    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4 text-white" style="padding:20px;background: rgba(00,00,00,0.90);margin-top:100px">"Metadmin'de oturum açarak bağlı olan websiteni kolayca yönetebilisin. Bir yönetici hesabın yoksa burada oturum açamayacağını unutma. Metadmin'de şifre sıfırlamana izin verilmez. Bu yüzden lütfen doğru e-posta ve şifre kombinasyonuna sahip olduğundan emin ol. Eğer üst üste hatalı giriş yaparsan sistem tarafından bloklanacaksın."</p>
                                                                    <div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index-2.html" class="d-block auth-logo">
                                            <img src="assets/images/logo-yatay.png" alt="" height="42" class="auth-logo-dark">
                                            <img src="assets/images/logo-yatay.png" alt="" height="42" class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Hoşgeldin !</h5>
                                        </div>
            
                                        <div class="mt-4">
                                            <form>
                
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">E-posta</label>
                                                    <input type="text" class="form-control" id="email" placeholder="E-postanı gir">
                                                </div>
                        
                                                <div class="mb-3">
                                                    <label class="form-label">Şifre</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input id="sifre" type="password" class="form-control" placeholder="Şifreni gir" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-3 d-grid">
                                                    <button id="loginBtn" class="btn btn-primary waves-effect waves-light" type="submit">Oturum Aç</button>
                                                </div>
                
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">Copyright © 2022 - <a href="https://metatige.com" target="_blank">Metatige</a> <br> Tüm hakları saklıdır.</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- owl.carousel js -->
        <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- auth-2-carousel init -->
        <script src="assets/js/pages/auth-2-carousel.init.js"></script>
        <?php require 'add-scripts.php'; ?>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script type="text/javascript">
            $("#loginBtn").on("click", function(e){
                e.preventDefault();

                var mail = $("#email").val();
                var pass = $("#sifre").val();
                $.ajax({
                    type : 'POST',
                    url  : 'core/login.php',
                    data : {mail:mail,pass:pass},
                    dataType : 'JSON',
                    success: function(r){
                        toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("index.php");
                            }, 1000);
                        }
                    }
                })
            })
        </script>

    </body>
</html>
