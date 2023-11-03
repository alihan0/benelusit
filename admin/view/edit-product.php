<?php 
    if(!isset($_GET['id']) || $_GET['id'] == null){
        header("location:main.php?page=shop");
    }else{
        $p = $db->query("SELECT * FROM shop_product WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
$c = $db->query("SELECT * FROM shop_categories WHERE id = '{$p['p_cat']}'")->fetch(PDO::FETCH_ASSOC);
    }
?>
<div class="page-content">
   <div class="container-fluid">
      <div class="row">

<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Düzenleniyor: <strong><?=$p['p_name']?> </strong> - <?=$c['cat_name']?></h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ürün Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="p_name" value="<?=$p['p_name']?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Yeni Kategori</label>
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
                        <input type="text" class="form-control" id="p_price" value="<?=$p['p_price']?>">
                    </div>
                </div>
                <div class="row mb-4">
                            <label for="formFile" class="col-sm-3 col-form-label">Yeni Ürün Resmi</label>
                        <div class="col-9">
                            <div class="input-group">
                            <input type="file" class="form-control" id="pUpload" aria-label="Upload">
                            <button class="btn btn-success" type="button" id="p_upload_btn" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                                          </div> 
                            <input class="form-control" type="hidden" value="<?=$p['p_pic']?>" id="p_path">
                        </div>
                       </div>


                       <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                       <textarea id="p_desc" class="form-control"><?=$p['p_desc']?></textarea>
                    </div>
                </div>

                  <div class="row ">
                    <div class="col-md-12">
                        <input type="hidden" id="id" value="<?=$_GET['id']?>">
                      <button  style="float:right" type="submit" class="btn btn-info w-md " id="pEkleBtn">Güncelle</button>
                    </div>
                </div>
               </div>
            </div>
         </div>
         <div class="col-6">
             <img src="uploads/products/<?=$p['p_pic']?>">
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
       let id = $("#id").val();

        $.ajax({
            type : 'POST',
            url  : 'core/shop.php',
            data : {"islem":"urun-guncelle",id:id, p_name:p_name, p_cat:p_cat, p_price:p_price, p_pic:p_pic, p_desc:p_desc},
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
   
</script>