<div class="page-content">
   <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#T1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Ürünler</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Kategoriler</span> 
                                    </a>
                                </li>
                                
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T3" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Yeni Ürün</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T4" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Yeni Kategori</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T6" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Gem Paketleri</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T7" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Yeni Gem P.</span>    
                                    </a>
                                </li>

                                
                                
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>
      <div class="tab-content p-3 text-muted">
        

         <div class="tab-pane active" id="T1" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                
                                                <th>Resim</th>
                                                <th>Ürün Adı</th>
                                                <th>Kategori</th>
                                                <th>Fiyatı</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM shop_product", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><img width="50" src="uploads/products/<?=$row['p_pic'];?>"></td>
                    <td><?=$row['p_name'];?></td>
                     
                     <td><?php 
$query = $db->query("SELECT * FROM shop_categories WHERE id = '{$row['p_cat']}'")->fetch(PDO::FETCH_ASSOC);
echo $query['cat_name'];
                 ?></td>
                    <td><?=$row['p_price'];?></td>
                    
                    <td id="<?=$row['id']?>">
                        <a class="btn btn-info" href="main.php?page=edit-product&id=<?=$row['id']?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger delProduct" href="javascript:void(0)"><i class="fas fa-trash"></i></a>
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
                </div>


<div class="tab-pane " id="T2" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kategori Adı</th>
                                                <th>Üst Kategori</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM shop_categories", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                     <td><b><?=$row['cat_name']?></td>
                    <td><?php if($row['main_cat'] == 0){echo "YOK";}else{
                        $query = $db->query("SELECT * FROM shop_categories WHERE id = '{$row['main_cat']}'")->fetch(PDO::FETCH_ASSOC);
                        echo $query['cat_name'];
                    }?></td>
                    <td id=<?=$row['id']?>>
                        <a class="btn btn-danger delCat" href="javascript:void(0)"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
             }
        }else{
                echo "<tfoot><tr><td>Kategori yok</td></tr></tfoot>";
             }
?>
                                            
                                            
        
        
                                           
                                                
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>



      <div class="tab-pane " id="T3" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Yeni Ürün</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ürün Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="p_name" placeholder="Ürün Adı">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-md-9">
                        <select class="form-select" id="p_cat">
                            <?php
$query = $db->query("SELECT * FROM shop_categories WHERE main_cat = 0", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $mid = $row['id'];
    ?>
 <optgroup label="<?=$row['cat_name']?>">

        <?php

        $query2 = $db->query("SELECT * FROM shop_categories WHERE main_cat = '{$mid}'", PDO::FETCH_ASSOC);
if ( $query2->rowCount() ){
     foreach( $query2 as $row2 ){
        ?>
    <option value="<?=$row2['id']?>"><?=$row2['cat_name']?></option>
<?php } } ?>
  </optgroup>
    <?php
     }
}else{
    echo '<option value="0">Hiç kategori yok...</option>';
}
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Fiyatı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="p_price" placeholder="Sadece sayısal değer girin: ( 100 , 150, 1000 ...)">
                    </div>
                </div>
                <div class="row mb-4">
                            <label for="formFile" class="col-sm-3 col-form-label">Ürün Resmi</label>
                        <div class="col-9">
                            <div class="input-group">
                            <input type="file" class="form-control" id="pUpload" aria-label="Upload">
                            <button class="btn btn-success" type="button" id="p_upload_btn" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                                          </div> 
                            <input class="form-control" type="hidden" id="p_path">
                        </div>
                       </div>


                       <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                       <textarea id="p_desc" class="form-control" placeholder="Ürün sayfasında görünecek açıklama"></textarea>
                    </div>
                </div>

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="pEkleBtn">Kaydet</button>
                    </div>
                </div>
               </div>
            </div>
         </div>

         
         </div>
      </div>





<div class="tab-pane " id="T4" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Yeni Kategori</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="cat_name" placeholder="Kategori Adı">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Üst Kategori</label>
                    <div class="col-md-9">
                        <select class="form-select" id="cat_parent">
                            <?php
$query = $db->query("SELECT * FROM shop_categories WHERE main_cat = 0", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
    ?><option value="<?=$row['id']?>"><?=$row['cat_name']?></option><?php
     }
}else{
    echo '<option value="0">Hiç kategori yok...</option>';
}
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                        <textarea id="cat_desc" class="form-control" placeholder="Kategori açıklaması (zorunlu değil)"></textarea>
                    </div>
                </div>
                

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="catEkleBtn">Kaydet</button>
                    </div>
                </div>
               </div>
            </div>
         </div>

         
         </div>
          </div>





<div class="tab-pane " id="T7" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Yeni Gem Paketi</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="gem_name" class="col-sm-3 col-form-label">Paket Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="gem_name" placeholder="Paket Adı">
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label for="gem_adet" class="col-sm-3 col-form-label">Gem Adedi</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="gem_adet" placeholder="Gem Adedi">
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="gem_fiyat" class="col-sm-3 col-form-label">Fiyatı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="gem_fiyat" placeholder="Paket Fiyatı">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="gem_fiyat" class="col-sm-3 col-form-label">Alışveriş Linki</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="link" placeholder="Shopier Ürün Linki">
                    </div>
                </div>
                

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="gemEkle">Ekle</button>
                    </div>
                </div>
               </div>
            </div>
         </div>

         
         </div>
      </div>




<div class="tab-pane " id="T6" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Paket Adı</th>
                                                <th>Gem Adedi</th>
                                                <th>Fiyat</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM gem_packages", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                     <td><b><?=$row['gem_name']?></td>
                    <td><?=$row['gem_adet']?></td>
                    <td><?=$row['gem_fiyat']?>₺</td>
                    <td id="<?=$row['id']?>">
                        <a href="javascript:void(0)" class="delGem btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
             }
        }else{
                echo "<tfoot><tr><td>Paket yok</td></tr></tfoot>";
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
      </div>
   </div>
</div>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">

    $("#pUpload").on("change", function(){
        $("#p_upload_btn").show();
    });
   $("#p_upload_btn").on("click", function(){
                var file_data = $('#pUpload').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-product.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#p_path").val(r.filename);

                    }
                 });                    
             });

    $("#pEkleBtn").on("click",function(){
       let p_name = $("#p_name").val();
       let p_cat = $("#p_cat").val();
       let p_price = $("#p_price").val();
       let p_pic = $("#p_path").val();
       let p_desc = $("#p_desc").val();

        $.ajax({
            type : 'POST',
            url  : 'core/shop.php',
            data : {"islem":"urun-ekle", p_name:p_name, p_cat:p_cat, p_price:p_price, p_pic:p_pic, p_desc:p_desc},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
    });
   
   
   $("#catEkleBtn").on("click", function(){
        let cat_name  = $("#cat_name").val();
        let cat_parent =  $("#cat_parent").val();
        let cat_desc = $("#cat_desc").val();

        $.ajax({
            type : 'POST',
            url  : 'core/shop.php',
            data : {"islem":"kategori-ekle", cat_desc:cat_desc, cat_parent:cat_parent, cat_name:cat_name},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
   });



   $("#settings_btn").on("click", function(){

      var s1 = $("#s1").val();
      var s2 = $("#s2").val();
      var s3 = $("#s3").val();
      var s4 = $("#s4").val();


      if ($('#s1').is(':checked')) {
          var s1 = 1;
      }else{
         var s1 = 0;
      }
      if ($('#s2').is(':checked')) {
          var s2 = 1;
      }else{
         var s2 = 0;
      }
     

      $.ajax({
         type : 'POST',
         url : 'core/shop.php',
         data : {"islem":"shop-settings", s1:s1,s2:s2,s3:s3,s4:s4},
         dataType: 'JSON',
         success: function(r){
          toastr[r.stat](r.message);
                  if(r.ok){
                      setTimeout(function(){   
                          window.location.assign("main.php?page=shop");
                      }, 1000);
                  }
            }
      })
   });


   $("#gemEkle").on("click", function(){
        let gem_name  = $("#gem_name").val();
        let gem_adet =  $("#gem_adet").val();
        let gem_fiyat = $("#gem_fiyat").val();
        let link = $("#link").val();

        $.ajax({
            type : 'POST',
            url  : 'core/gem.php',
            data : {"islem":"ekle", link:link,gem_name:gem_name, gem_adet:gem_adet, gem_fiyat:gem_fiyat},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
   });


   $(".delProduct").on("click", function(){
    let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/del-shop.php',
            data : {
                id:id,
                islem:"product"
            },
            dataType: 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
   });

   $(".delCat").on("click", function(){
    let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/del-shop.php',
            data : {
                id:id,
                islem:"category"
            },
            dataType: 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
   });
   $(".delGem").on("click", function(){
    let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/del-shop.php',
            data : {
                id:id,
                islem:"gem"
            },
            dataType: 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=shop");
                          }, 1000);
                      }
                }
        })
   });
</script>