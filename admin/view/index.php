<?php 
include 'sayac.php';
?>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Anasayfa</h4>

                                    <div class="page-title-right"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        


<div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Hoşgeldin!</h5>
                                                
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-8">
                                           
                                                <h5 class="font-size-15 mt-4 text-truncate"><?=$admin['first_name'].' '.$admin['last_name'];?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?=$admin['email']?></p>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Bekleyen Ödemeler</p>
                                                        <h4 class="mb-0"><?=$say4?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Ödeme</p>
                                                        <h4 class="mb-0"><?=$say3?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Açık Destek</p>
                                                        <h4 class="mb-0"><?=$say6?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Destek</p>
                                                        <h4 class="mb-0"><?=$say5?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Bekleyen Sipariş</p>
                                                        <h4 class="mb-0"><?=$say8?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Sipariş</p>
                                                        <h4 class="mb-0"><?=$say7?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Toplam Oyun</p>
                                                        <h4 class="mb-0"><?=$say1?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
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
                                                        <p class="text-muted fw-medium">Toplam Oyuncu</p>
                                                        <h4 class="mb-0"><?=$say2?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
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
                                                        <p class="text-muted fw-medium">Toplam Kazanç</p>
                                                        <h4 class="mb-0"><?=$FiyatYaz['takma_ad']?>₺</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Bekleyen Destek Talepleri</h4>
            <div class="table-responsive">
                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kullanıcı</th>
                                                <th>Konu</th>
                                                <th>Departman</th>
                                                <th>Aciliyet</th>
                                                <th>Tarih</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM tickets WHERE status = 1 || status = 3", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user']}'")->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                    <td><?=$u['user_firstname'].' ' .$u['user_lastname']  ;?></td>
                    <td><?=$row['konu']?></td>

                    <td><?php if($row['departman'] == 1){
                                echo "Teknik Destek";
                            }elseif($row['departman'] == 2){
                                echo "Muhasebe";
                            }elseif($row['departman'] == 3){
                                echo "Satış & Mağaza";
                            }elseif($row['departman'] == 3){
                                echo "Hata & BUG";
                            } ?></td>
                    <td><?php  if($row['aciliyet'] == 1){
                                echo "Düşük Öncelik";
                            }elseif($row['aciliyet'] == 2){
                                echo "Orta Öncelik";
                            }elseif($row['aciliyet'] == 3){
                                echo "Yüksek Öncelik";
                            } ?></td>
                    <td><?=$row['created_at']?></td>
                <td>
                        <a class="btn btn-info" href="?page=notification-detail&id=<?=$row['id'];?>"><i class="fas fa-search"></i></a>

                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>
                        </div>


                        <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Bekleyen Ödeme Bildirimleri</h4>
            <div class="table-responsive">
                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kullanıcı</th>
                                                <th>Paket</th>
                                                <th>Gönderen</th>
                                                <th>Tutar</th>
                                                <th>Tarih/Saat</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM odeme_bildirimi WHERE status = 1", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user']}'")->fetch(PDO::FETCH_ASSOC);
                $p = $db->query("SELECT * FROM gem_packages WHERE id = '{$row['paket']}'")->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                    <td><?=$u['user_firstname'] .' "'.$u['username'].'" '.$u['user_lastname']  ;?></td>
                    <td><?=$p['gem_name']?></td>

                    <td><?=$row['gonderen']?></td>
                    <td><?=$row['tutar']?></td>
                    <td><?=$row['tarih'].' - '.$row['saat']?></td>
                <td>
                        <a class="btn btn-info" href="?page=notifications&show=odemeOK&id=<?=$row['id'];?>&user=<?=$u['id']?>&paket=<?=$row['paket']?>"><i class="fas fa-check"></i></a>

                        <a class="btn btn-danger" href="?page=notifications&show=odemeRed&id=<?=$row['id'];?>" style="margin-left:20px"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>
                        </div>





                        <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Bekleyen Siparişler</h4>
            <div class="table-responsive">
                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Üye</th>
                                                <th>Şipariş</th>
                                                <th>Tarih</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM shop_order WHERE status = 1", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $u = $db->query("SELECT * FROM users WHERE id = '{$row['user_id']}'")->fetch(PDO::FETCH_ASSOC);
               
                ?>
                <tr>
                    <td><?=$row['id'];?></td>              
                    <td><?=$u['user_firstname'] .' '.$u['user_lastname']  ;?></td>
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
                <td id="<?=$row['id']?>">
                        <a  href="javascript:void(0)" class="btn btn-info orderOK"><i class="fas fa-check"></i></a>

                        <a href="javascript:void(0)" class="btn btn-danger orderRED" style="margin-left:20px"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>
                        </div>











                    </div> <!-- container-fluid -->
                </div>