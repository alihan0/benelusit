       <div class="page-content">
   <div class="container-fluid">
   <?php 

$p = $db->query("SELECT * FROM users WHERE id = '{$_GET['id']}'")->fetch();



$sorgu1 = $db->prepare("SELECT COUNT(*) FROM tournament_recourses WHERE user_id='{$_GET['id']}'");
$sorgu1->execute();
$say1 = $sorgu1->fetchColumn();

$sorgu2 = $db->prepare("SELECT COUNT(*) FROM shop_order WHERE user_id='{$_GET['id']}'");
$sorgu2->execute();
$say2 = $sorgu2->fetchColumn();

$sorgu3 = $db->prepare("SELECT COUNT(*) FROM tickets WHERE user='{$_GET['id']}'");
$sorgu3->execute();
$say3 = $sorgu3->fetchColumn();



   ?> 
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="<?php if($p['user_status'] == 0){echo 'bg-danger';}elseif($p['user_status'] == 1){echo 'bg-warning';}else{echo 'bg-success';} ?>">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-light p-3">
                                <h5 class="text-light">@<?=$p['username']?></h5>
                                <p><?php if($p['user_status'] == 0){echo 'Kullanıcı Banlı';}elseif($p['user_status'] == 1){echo 'Kullanıcı Askıya Alınmış';}else{echo 'Kullanıcı Onaylı';} ?></p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 pt-4">
                            
                            <h5 class="font-size-15 text-truncate"><?=$p['user_firstname'].' '.$p['user_lastname']?></h5>
                        </div>

                        <div class="col-6">
                            <div class="pt-4">
                               
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15"><?=$p['user_gem']?></h5>
                                        <p class="text-muted mb-0">Gem</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15"><?=$p['user_point']?></h5>
                                        <p class="text-muted mb-0">Puan</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Profil Bilgileri</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">E-posta :</th>
                                    <td><?=$p['email']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Telefon :</th>
                                    <td><?=$p['user_phone']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Doğum T. :</th>
                                    <td><?=$p['user_birthdate']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Konum :</th>
                                    <td><?=$p['user_country'].'/'.$p['user_city']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->

              
            <!-- end card -->
        </div>         
        
        <div class="col-xl-8">
            <div class="row pb-4">
                <div class="col-4">
                    <a href="javascript:void(0)" id="addGem" class="btn btn-success">Gem Yükle</a>

                    <a href="javascript:void(0)"  id="addPoint" class="btn btn-info">Puan Ekle</a>
                </div>
                <div class="col-4">
                  <a href="javascript:void(0)" id="posta" class="btn btn-primary">E-posta</a>
                  <?php
                  if($p['shop_permission'] == 0){
                    echo '<a href="javascript:void(0)" id="shopok" class="btn btn-primary">Market İzni</a>';
                  }else{
                    echo '<a href="javascript:void(0)" id="shopred" class="btn btn-warning">Marketi Engl.</a>';
                  }
                  ?>
                  
                      
                </div>
                <div class="col-4">
                    <?php
                    if($p['user_status'] == 0){
                        echo '<a href="javascript:void(0)" id="onayla" class="btn btn-success">Onayla</a>';

                        echo '<a href="javascript:void(0)" id="aski" style="margin-left:10px" class="btn btn-warning">Askıya Al</a>';
                    }elseif($p['user_status'] == 1){
echo '<a href="javascript:void(0)"  id="onayla" class="btn btn-success">Onayla</a>';
echo '<a href="javascript:void(0)" id="banla" style="margin-left:10px"class="btn btn-danger">Banla</a>';
                    }elseif($p['user_status'] == 2){
                        echo '<a href="javascript:void(0)" id="aski" class="btn btn-warning">Askıya Al</a>';echo '<a href="javascript:void(0)" style="margin-left:10px" class="btn btn-danger" id="banla">Banla</a>';
                                            }
                    ?>
                </div>
        </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Turnuva</p>
                                    <h4 class="mb-0"><?=$say1?></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-check-circle font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Alışveriş</p>
                                    <h4 class="mb-0"><?=$say2?></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-basket font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Destek</p>
                                    <h4 class="mb-0"><?=$say3?></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="fas fa-ticket-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Turnuva Geçmişi</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                         
<?php
$query = $db->query("SELECT * FROM tournament_recourses WHERE user_id = '{$_GET['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){


?>
   <thead>

<tr>
    <th scope="col">#</th>
    <th scope="col">Turnuva Adı</th>
    <th scope="col">Oyun</th>
    <th scope="col">Harita</th>
    <th scope="col">Durum</th>
</tr>
</thead>
 <tbody>

<?php

   foreach( $query as $row ){

    $t = $db->query("SELECT * FROM tournaments WHERE id = '{$row['tournament_id']}'")->fetch();
    $o = $db->query("SELECT * FROM games WHERE id = '{$t['tournament_game']}'")->fetch();
    $m = $db->query("SELECT * FROM game_maps WHERE id = '{$t['tournament_map']}'")->fetch();
      ?>
<tr>
    <th scope="row"><?=$row['id']?></th>
    <td><?=$t['tournament_name']?></td>
    <td><?=$o['game_name']?></td>
    <td><?=$m['map_name']?></td>
    <td>
        <?php 
        if($row['status'] == 0){
            echo '<span class="badge bg-danger">Reddedildi</span>';
        }elseif($row['status'] == 1){
            echo '<span class="badge bg-warning">Bekliyor</span>';
        }elseif($row['status'] == 2){
            echo '<span class="badge bg-success">Onaylandı</span>';
        }
        ?>
    </td>
</tr>

      <?php
   }
}else{
    echo "Kayıt yok!";
}
?>
                                
                           


                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Alışveriş Geçmişi</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                         
<?php
$query = $db->query("SELECT * FROM shop_order WHERE user_id = '{$_GET['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){


?>
   <thead>

<tr>
    <th scope="col">#</th>
    <th scope="col">Ürünler</th>
    <th scope="col">Tarih</th>
    <th scope="col">Durum</th>
</tr>
</thead>
 <tbody>

<?php

   foreach( $query as $row ){
      ?>
<tr>
    <th scope="row"><?=$row['id']?></th>
    <td>
        
                     <?php
                    $order_list =  $row['order_list'];
                    $order = json_decode($order_list);
                    $count = count($order->urunler);

                    for($i = 0; $i < $count; $i++){
                 $sorgu3 = $db->query("SELECT * FROM shop_product WHERE id = '{$order->urunler[$i]}'")->fetch(PDO::FETCH_ASSOC);
                 ?>

                 <span class="badge bg-primary" style="padding:5px 10px"><?php echo $sorgu3['p_name']; ?></span>
          
                 <?php
                 
       
                    }
                    ?>

    </td>
    <td><?=$row['created_at']?></td>
    <td>
        <?php 
        if($row['status'] == 0){
            echo '<span class="badge bg-danger">Reddedildi</span>';
        }elseif($row['status'] == 1){
            echo '<span class="badge bg-warning">Bekliyor</span>';
        }elseif($row['status'] == 2){
            echo '<span class="badge bg-success">Onaylandı</span>';
        }
        ?></td>
</tr>

      <?php
   }
}else{
    echo "Kayıt yok!";
}
?>
                                
                           


                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Destek Geçmişi</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                         
<?php
$query = $db->query("SELECT * FROM tickets WHERE user = '{$_GET['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){


?>
   <thead>

<tr>
    <th scope="col">#</th>
    <th scope="col">Departman</th>
    <th scope="col">Konu</th>
    <th scope="col">Durum</th>
</tr>
</thead>
 <tbody>

<?php

   foreach( $query as $row ){
      ?>
<tr>
    <th scope="row"><?=$row['id']?></th>
    <td><?php if($row['departman'] == 1){
                                echo "Teknik Destek";
                            }elseif($row['departman'] == 2){
                                echo "Muhasebe";
                            }elseif($row['departman'] == 3){
                                echo "Satış & Mağaza";
                            }elseif($row['departman'] == 3){
                                echo "Hata & BUG";
                            } ?></td>
    <td><?=$row['konu']?></td>
    <td> <?php
                    if($row['status'] == 0){
                        echo '<span class="badge bg-success">Çözüldü</span>';
                    }elseif($row['status'] == 1){
                        echo '<span class="badge bg-info">Açık</span>';
                    }elseif($row['status'] == 2){
                        echo '<span class="badge bg-primary">Yanıtlandı</span>';
                    }elseif($row['status'] == 3){
                     echo '<span class="badge bg-warning">Yanıtladınız</span>';
                    }
                    ?></td>
</tr>

      <?php
   }
}else{
    echo "Kayıt yok!";
}
?>
                                
                           


                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>









        </div>
    </div>
                        <!-- end row -->
 </div>
                        </div>




<script src="assets/libs/jquery/jquery.min.js"></script>

<script type="text/javascript">


    $("#banla").on("click", function(){
    var oid = <?=$_GET['id']?>;

    $.ajax({
        type : 'POST',
        url  : 'core/users.php',
        data : {"islem":"banla",oid:oid},
        dataType : 'JSON',
        success: function(result){
           toastr[result.stat](result.message);
                     if(result.ok){
                         setTimeout(function(){   
                              window.location.reload();
                          }, 1000);
                     }
        }
    })
});

     $("#aski").on("click", function(){
    var oid = <?=$_GET['id']?>;

    $.ajax({
        type : 'POST',
        url  : 'core/users.php',
        data : {"islem":"askiya-al",oid:oid},
        dataType : 'JSON',
        success: function(result){
           toastr[result.stat](result.message);
                     if(result.ok){
                         setTimeout(function(){   
                              window.location.reload();
                          }, 1000);
                     }
        }
    })
});
      $("#onayla").on("click", function(){
    var oid = <?=$_GET['id']?>;

    $.ajax({
        type : 'POST',
        url  : 'core/users.php',
        data : {"islem":"onayla",oid:oid},
        dataType : 'JSON',
        success: function(result){
           toastr[result.stat](result.message);
                     if(result.ok){
                         setTimeout(function(){   
                              window.location.reload();
                          }, 1000);
                     }
        }
    })
});






    $("#addGem").on("click", function(){
    var oid = <?=$_GET['id']?>;
  

Swal.fire({title:"Gem Yükle",input:"text",showCancelButton:!0,confirmButtonText:"Yükle",showLoaderOnConfirm:!0,confirmButtonColor:"#556ee6",cancelButtonText:"İptal",cancelButtonColor:"#f46a6a",preConfirm:function(n){

        $.ajax({
            type : 'POST',
            url  : 'core/addGem.php',
            data : {oid:oid, n:n},
            dataType: 'JSON',
            success : function(result){
                Swal.fire({icon:result.icon,title:result.title,html:result.html,confirmButtonColor:"#556ee6",preConfirm:function(a){
                     window.location.reload()
                }})
            }
        })

},allowOutsideClick:!1})


});


$("#addPoint").on("click", function(){
    var oid = <?=$_GET['id']?>;
  

Swal.fire({title:"Puan Yükle",input:"text",showCancelButton:!0,confirmButtonText:"Yükle",showLoaderOnConfirm:!0,confirmButtonColor:"#556ee6",cancelButtonText:"İptal",cancelButtonColor:"#f46a6a",preConfirm:function(n){

        $.ajax({
            type : 'POST',
            url  : 'core/addPoint.php',
            data : {oid:oid, n:n},
            dataType: 'JSON',
            success : function(result){
                Swal.fire({icon:result.icon,title:result.title,html:result.html,confirmButtonColor:"#556ee6",preConfirm:function(a){
                     window.location.reload()
                }})
            }
        })

},allowOutsideClick:!1})


});


$("#posta").on("click", function(){
    var oid = <?=$_GET['id']?>;
  

Swal.fire({title:"E-posta Mesajınız",input:"text",showCancelButton:!0,confirmButtonText:"Gönder",showLoaderOnConfirm:!0,confirmButtonColor:"#556ee6",cancelButtonText:"İptal",cancelButtonColor:"#f46a6a",preConfirm:function(n){

        $.ajax({
            type : 'POST',
            url  : 'core/send-email.php',
            data : {oid:oid, n:n},
            dataType: 'JSON',
            success : function(result){
                Swal.fire({icon:result.icon,title:result.title,html:result.html,confirmButtonColor:"#556ee6",preConfirm:function(a){
                     //window.location.reload()
                }})
            }
        })

},allowOutsideClick:!1})
})

$("#shopok").on("click", function(){
    var oid = <?=$_GET['id']?>;
  

Swal.fire({title:"Kullanıcının Alışveriş Yapmasına İzin Ver",text:"Kullacının alışveriş yapmasına izin verdiğiniz zaman, artık sipariş oluşturmak için herhangi bir şart aranmayacak.",showCancelButton:!0,confirmButtonText:"İzin Ver",showLoaderOnConfirm:!0,confirmButtonColor:"#556ee6",cancelButtonText:"İptal",cancelButtonColor:"#f46a6a",preConfirm:function(n){

        $.ajax({
            type : 'POST',
            url  : 'core/users.php',
            data : {"islem":"shopok",oid:oid},
            dataType: 'JSON',
            success : function(result){
                Swal.fire({icon:result.icon,title:result.title,html:result.html,confirmButtonColor:"#556ee6",preConfirm:function(a){
                     window.location.reload()
                }})
            }
        })

},allowOutsideClick:!1})


});

$("#shopred").on("click", function(){
    var oid = <?=$_GET['id']?>;
  

Swal.fire({title:"Kullanıcının Alışveriş Yapmasını Engelle",text:"Kullacının alışveriş iznini kaldırdığınız zaman, herhangi bir turnuyava katılana kadar alışveriş yapmayacak. Kullanıcının en az 5 turnuva başvurusunun onaylanması durumunda bu engel otomatik olarak kaldırılır.",showCancelButton:!0,confirmButtonText:"İzin Ver",showLoaderOnConfirm:!0,confirmButtonColor:"#556ee6",cancelButtonText:"İptal",cancelButtonColor:"#f46a6a",preConfirm:function(n){

        $.ajax({
            type : 'POST',
            url  : 'core/users.php',
            data : {"islem":"shopred",oid:oid},
            dataType: 'JSON',
            success : function(result){
                Swal.fire({icon:result.icon,title:result.title,html:result.html,confirmButtonColor:"#556ee6",preConfirm:function(a){
                     window.location.reload()
                }})
            }
        })

},allowOutsideClick:!1})


});

</script>