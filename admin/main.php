<?php 
    require 'engine.php';
    if(!isset($_SESSION['admin'])){
        header("location:index.php");
    }
?>
<!doctype html>
<html lang="tr">
<head>
        
        <meta charset="utf-8" />
        <title>Metadmin | Anasayfa - Benelusit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo-ikon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <?php include 'add-styles.php'; ?>
    </head>

    <body data-sidebar="dark">


        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php 
                include 'inc/topbar.php';
                include 'inc/sidebar.php';
             ?>

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <?php

                    
                    if($_GET){
                        $p = @$_GET['page'];
                        $q = @$_GETE['q'];
                        $dir = "view/";
                        $path = $dir.$p.'.php';
                        switch ($p) {
                            case $p:
                            
                                if(file_exists($path)){
                                    include $path;
                                }else{
                                    include 'view/404.php';
                                }
                            
                                
                                break;
                            
                            default:
                                include 'view/index.php';
                                break;
                        }
                    }else{
                        include 'view/index.php';
                    }
                ?>
                 <?php include 'inc/footer.php'; ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
        <?php include 'add-scripts.php'; ?>
    </body>
</html>
