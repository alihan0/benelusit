<div class="page-content">
   <div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5>Bekleyen Siparişler</h5>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
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
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5>Tamamlanan Siparişler</h5>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
<table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Üye</th>
                                                <th>Şipariş</th>
                                                <th>Tarih</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM shop_order WHERE status = 2", PDO::FETCH_ASSOC);
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
    
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5>Reddedilen Siparişler</h5>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
<table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Üye</th>
                                                <th>Şipariş</th>
                                                <th>Tarih</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM shop_order WHERE status = 0", PDO::FETCH_ASSOC);
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
    
                </tr>
                <?php
             }
        }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
            </div>
        </div>
    </div>
</div>








</div>
</div>



<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
   
   $(".orderOK").on("click", function(){
      let id = $(this).parent("td").attr("id");

      $.ajax({
            type : 'POST',
            url  : 'core/order.php',
            data : {"islem":"ok", id:id},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                 window.location.reload(1);
                            }, 1000);
                        }
            }
        });
   })
   $(".orderRED").on("click", function(){
      let id = $(this).parent("td").attr("id");

      $.ajax({
            type : 'POST',
            url  : 'core/order.php',
            data : {"islem":"red", id:id},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                 window.location.reload(1);
                            }, 1000);
                        }
            }
        });
   })
</script>