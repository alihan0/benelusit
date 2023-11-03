 <?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['login'])) {
        header("location:index.php");
    }

    $takim = $db->query("SELECT * FROM team_members WHERE user_id = '{$user['id']}' && membership_status = 2 ")->fetch(PDO::FETCH_ASSOC);

    $t = $db->query("SELECT * FROM teams WHERE id = '{$takim['team_id']}' ")->fetch(PDO::FETCH_ASSOC);
    ?>
 <!doctype html>

 <html class="no-js" lang="<?= $seo['seo_lang']; ?>">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Takım - <?= $seo['seo_title']; ?></title>
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
     <?php
        if ($takim) {
        ?>

         <!-- header-area-end -->

         <!-- main-area -->
         <main>

             <!-- breadcrumb-area -->
             <div class="breadcrumb-area breadcrumb-bg game-overview-breadcrumb">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-xl-4 col-lg-6">
                             <div class="game-overview-img" style="margin:0 auto;">
                                 <img src="admin/uploads/teams/<?= $t['team_logo']; ?>" alt="">
                             </div>
                         </div>
                         <div class="col-xl-8 col-lg-6">
                             <div class="breadcrumb-content text-center text-lg-left pl-80">
                                 <nav aria-label="breadcrumb">
                                     <ol class="breadcrumb">
                                         <li class="breadcrumb-item active" aria-current="page"><?= $t['team_slogan']; ?></li>
                                     </ol>
                                 </nav>
                                 <h2>[<?= $t['team_tag'] ?>]<?= $t['team_name']; ?></h2>
                                 <div class="game-overview-status">
                                     <ul>
                                         <li><span>Kaptan :</span>
                                             <?php
                                                $query = $db->query("SELECT * FROM users WHERE id = '{$t['team_captain']}'")->fetch(PDO::FETCH_ASSOC);
                                                echo $query['user_firstname'] . ' "' . $query['username'] . '" ' . $query['user_lastname'];

                                                ?>
                                         </li>
                                         <li><span> Üye: </span>
                                             <?php
                                                $sorgu = $db->prepare("SELECT COUNT(*) FROM team_members WHERE team_id = '{$t['id']}'");
                                                $sorgu->execute();
                                                echo $sorgu->fetchColumn();
                                                ?>
                                         </li>
                                     </ul>
                                     <div class="card" style="width: 500px;background: rgba(0,0,0,0);">
                                         <p><?= $t['team_desc'] ?></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- breadcrumb-area-end -->
             <div class="container">
                 <div class="row mt-50 mb-30">
                     <div class="col-12">

                         <div class="card">
                             <div class="card-body">
                                 <ul class="nav nav-pills nav-fill">
                                     <li class="nav-item">
                                         <a class="nav-link <?php if ((@!$_GET['show']) || ($_GET['show'] == "turnuvalar")) {
                                                                echo "active";
                                                            } ?>" href="?show=turnuvalar">Turnuvalar</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link  <?php if (@$_GET['show'] == "members") {
                                                                    echo "active";
                                                                } ?>" href="?show=members">Üyeler</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link  <?php if (@$_GET['show'] == "applications") {
                                                                    echo "active";
                                                                } ?>" href="?show=applications">Başvurular</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <!-- game-single-area -->
             <section class="game-single-area  pb-180">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="game-single-content game-overview-content">
                                 <?php
                                    $s = @$_GET['show'];
                                    if ($s == "members") {
                                        // Takım üyleri
                                        $qryTeamMembers = $db->prepare("SELECT username,tm.user_id FROM team_members tm
                                        INNER JOIN users u ON tm.user_id = u.id
                                        WHERE team_id = '" . $takim['team_id'] . "'");
                                        $qryTeamMembers->execute();
                                        $qryTeamMembersData = $qryTeamMembers->fetchAll();

                                        //Takim Lider 
                                        $qryTeamLeader = $db->query("SELECT * FROM teams WHERE  id = '" . $takim['team_id'] . "'")->fetch(PDO::FETCH_ASSOC);
                                        $teamLeader = $qryTeamLeader['team_captain'];
                                        echo "<h3 class='text-dark text-center'>Üyeler</h3>";
                                        echo '<ul class="list-group">';
                                        foreach ($qryTeamMembersData as $qryTeamMembersDataRow) {
                                            echo '<li class="list-group-item d-flex justify-content-between text-dark">
                                            <span class="text-primary mt-3">' . $qryTeamMembersDataRow['username'] . '</span>';
                                            if ($takim['user_id'] === $teamLeader) {
                                                echo '<div>
                                                    <button type="button" class="btn btn-danger btn-sm" id="team_members_del" data-id="' . $qryTeamMembersDataRow['user_id'] . '" data-id2="' . $takim['team_id'] . '"">Takımdan Çıkar</button>
                                                </div>';
                                            }
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    } elseif ($s == "turnuvalar") {
                                        //Takımın Katıldığı Turnuvalar
                                        $qryTeamTournament = $db->prepare("SELECT * FROM tournament_recourses tr
                                        INNER JOIN tournaments t ON tr.tournament_id = t.id WHERE tr.user_id = '" . $takim['user_id'] . "'
                                        ");
                                        $qryTeamTournament->execute();
                                        $qryTeamTournamentData = $qryTeamTournament->fetchAll();
                                        echo "<h3 class='text-dark text-center'>Turnuvalar</h3>";
                                        echo '<ol class="list-group list-group-numbered">';
                                        foreach ($qryTeamTournamentData as $qryTeamTournamentRow) {
                                            echo '<li class="list-group-item">
                                                <div class="text-dark">Turnuva Adı : <span class="text-primary">' . $qryTeamTournamentRow['tournament_name'] . '</span></div>                                     
                                                <div class="text-dark mt-3">Turnuva Açıklaması : <span class="text-primary">' . $qryTeamTournamentRow['tournament_name'] . '</span></div>                                     
                                                 </li>';
                                        }
                                        echo '</ol>';
                                    } elseif ($s == "applications") {
                                        //Başvurular
                                        $qryTeamApplications = $db->prepare("SELECT u.username,u.id FROM team_applications ta
                                        INNER JOIN users u ON ta.user_id = u.id
                                        WHERE team_id = '" . $takim['team_id'] . "'");
                                        $qryTeamApplications->execute();
                                        $qryTeamApplicationsData = $qryTeamApplications->fetchAll();
                                        echo "<h3 class='text-dark text-center'>Başvurular</h3>";
                                        if ($takim['user_position'] == 1 or $takim['user_position'] == 2) {
                                            echo '<ol class="list-group list-group-numbered">';
                                            foreach ($qryTeamApplicationsData as $qryTeamApplicationsRow) {
                                                echo
                                                '<li class="list-group-item d-flex justify-content-between text-dark">
                                                <span class="mt-3">' . $qryTeamApplicationsRow['username'] . '</span>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-sm"  id="team_applications_ok" data-id="' . $qryTeamApplicationsRow['id'] . '" data-id2="' . $takim['team_id'] . '"">Onayla</button>
                                                <button type="button" class="btn btn-danger btn-sm" id="team_applications_del" data-id="' . $qryTeamApplicationsRow['id'] . '" data-id2="' . $takim['team_id'] . '"">Reddet</button>
                                            </div>
                                        </li>';
                                            }
                                            echo '</ol>';
                                        } else {
                                            echo "<span class='text-warning'>Başvuruları görmek için yetkiniz yok.</span>";
                                        }
                                    }
                                    ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- game-single-area-end -->

         </main>
         <!-- main-area-end -->


     <?php
        } else {
        ?>
         <main>

             <!-- breadcrumb-area -->
             <div class="breadcrumb-area breadcrumb-bg game-overview-breadcrumb">
                 <div class="container">
                     <div class="row align-items-center">

                         <div class="col-12">
                             <div class="breadcrumb-content text-center">
                                 <h2>Takım Yönetimi</h2>
                             </div>
                         </div>
                     </div>
                     <hr>
                     <div class="row align-items-center">

                         <div class="col-6 text-center">
                             <h3>Takım Ara</h3>
                             <div class="row">
                                 <div class="col-8">
                                     <input type="text" class="form-control" id="takimara" style="padding:  15px 15px;">
                                 </div>
                                 <div class="col-4">
                                     <a href="javascript:void(0)" id="basvur" class="btn">Başvur</a>
                                 </div>
                             </div>

                         </div>
                         <div class="col-6 text-center">
                             <h3>Takım Kur</h3>
                             <div class="row">
                                 <div class="col-8">
                                     <input type="text" class="form-control" id="isim" style="padding:  15px 15px;">
                                 </div>
                                 <div class="col-4">
                                     <a href="javascript:void(0)" id="olustur" class="btn">oluştur</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php
                        $sorgu = $db->prepare("SELECT COUNT(*) FROM team_applications WHERE user_id = '{$_SESSION['uid']}' && status = 1 ");
                        $sorgu->execute();
                        $basvuru_sayisi = $sorgu->fetchColumn();

                        ?>

                     <hr>
                     <a href="javascript:void(0)">Gelen Davet (0)</a>
                     <a href="javascript:void(0)">Bekleyen Başvuru (<?= $basvuru_sayisi ?>)</a>
                 </div>
             </div>
         </main>
     <?php } ?>
     <div class="modal fade " id="basvuru-modal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content col-12">
                 <div id="basvuru-takim-load" style="width: 800px !important; margin-left: -200px;position: relative;"></div>
             </div>
         </div>
     </div>


     <div class="modal fade" id="takimkur-modal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content col-12">
                 <div id="takimkur-load"></div>
             </div>
         </div>
     </div>


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
         $("#basvur").on("click", function() {
             var basvuru = $("#takimara").val();
             $.ajax({
                 type: 'POST',
                 url: 'sections/takim-basvuru.php',
                 data: {
                     basvuru: basvuru
                 },
                 success: function(r) {
                     $("#basvuru-takim-load").html(r);
                 }
             })
             $("#basvuru-modal").modal("show");
         });


         $("#olustur").on("click", function() {
             var isim = $("#isim").val();
             $.ajax({
                 type: 'POST',
                 url: 'sections/takim-kur.php',
                 data: {
                     isim: isim
                 },
                 success: function(r) {
                     $("#takimkur-load").html(r);
                 }
             })
             $("#takimkur-modal").modal("show");
         });

         $("#team_applications_del").on("click", function() {
             if (confirm('Reddetmek istediğinize emin misiniz?')) {
                 var process = 'team_applications_del';
                 var user_id = $(this).attr("data-id");
                 var team_id = $(this).attr("data-id2");
                 $.ajax({
                     type: 'POST',
                     url: 'core/takim-basvuru.php',
                     data: {
                         process: process,
                         user_id: user_id,
                         team_id: team_id,
                     },
                     dataType: 'JSON',
                     success: function(r) {
                         toastr[r.t](r.m);
                         if (r.ok) {
                             setTimeout(function() {
                                 window.location.reload(1);
                             }, 2000);
                         }
                     }
                 })
             }
         });

         $("#team_applications_ok").on("click", function() {
             if (confirm('Takıma kabul etmek istediğinize emin misiniz?')) {
                 var process = 'team_applications_ok';
                 var user_id = $(this).attr("data-id");
                 var team_id = $(this).attr("data-id2");
                 $.ajax({
                     type: 'POST',
                     url: 'core/takim-basvuru.php',
                     data: {
                         process: process,
                         user_id: user_id,
                         team_id: team_id,
                     },
                     dataType: 'JSON',
                     success: function(r) {
                         toastr[r.t](r.m);
                         if (r.ok) {
                             setTimeout(function() {
                                 window.location.reload(1);
                             }, 2000);
                         }
                     }
                 })
             }
         })

         $("#team_members_del").on("click", function() {
             if (confirm('Takımdan çıkarmak istediğinize emin misiniz?')) {
                 var process = 'team_members_del';
                 var user_id = $(this).attr("data-id");
                 var team_id = $(this).attr("data-id2");
                 $.ajax({
                     type: 'POST',
                     url: 'core/takim-basvuru.php',
                     data: {
                         process: process,
                         user_id: user_id,
                         team_id: team_id,
                     },
                     dataType: 'JSON',
                     success: function(r) {
                         toastr[r.t](r.m);
                         if (r.ok) {
                             setTimeout(function() {
                                 window.location.reload(1);
                             }, 2000);
                         }
                     }
                 })
             }
         });
     </script>
 </body>

 </html>