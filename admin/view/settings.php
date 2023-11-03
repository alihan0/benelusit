<div class="page-content">
   <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                
                             
                                
                                
                                

                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#T5" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Banka Bilgileri</span>    
                                    </a>
                                </li>

                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#T6" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">S.S.S.</span>    
                                    </a>
                                </li>
                                
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>
      <div class="tab-content p-3 text-muted">
        


<div class="tab-pane active" id="T5" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Banka Bilgileri</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   <?php

$query = $db->query("SELECT * FROM banka_bilgileri WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

   ?>
                  <div class="row mb-4">
                    <label for="banka" class="col-sm-3 col-form-label">Banka Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="banka"value="<?=$query['banka_adi']?>">
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="sube" class="col-sm-3 col-form-label">Şube</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="sube" value="<?=$query['sube']?>">                    </div>
                </div>

                <div class="row mb-4">
                    <label for="iban" class="col-sm-3 col-form-label">IBAN</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="iban" value="<?=$query['iban']?>">
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="alici" class="col-sm-3 col-form-label">Alıcı Ad Soyad</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="alici" value="<?=$query['sahip']?>">
                    </div>
                </div>
                
                
                

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="bankaBtn">Güncelle</button>
                    </div>
                </div>
               </div>
            </div>
         </div>
         

         
         </div>
      </div>








<div class="tab-pane " id="T6" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Sık Sorulan Sorular</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="soru" class="col-sm-3 col-form-label">Soru</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="soru" placeholder="Soruyu Girin">
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label for="cevap" class="col-sm-3 col-form-label">Cevap</label>
                    <div class="col-md-9">
                        <textarea id="cevap" class="form-control" placeholder="Cevabı girin"></textarea>
                    </div>
                </div>
                

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="sssEkle">Kaydet</button>
                    </div>
                </div>
               </div>
            </div>
         </div>
         <div class="col-6">
             
             <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Soru</th>
                                                <th>Cevap</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM faq", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                     <td><b><?=$row['ask']?></td>
                    <td><?=$row['answer']?></td>
                    <td id="<?=$row['id']?>">
                        <a href="#" class="text-danger delSSS"><i class="fas fa-trash"></i></a>
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
   </div>
</div>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">



$("#bankaBtn").on("click", function(){
        let banka  = $("#banka").val();
        let sube =  $("#sube").val();
        let iban =  $("#iban").val();
        let alici =  $("#alici").val();

        $.ajax({
            type : 'POST',
            url  : 'core/banka.php',
            data : {banka:banka, sube:sube, iban:iban, alici:alici },
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=settings");
                          }, 1000);
                      }
                }
        })
   });

$(".delSSS").on("click", function(){
    let sss = $(this).parent("td").attr("id");

    $.ajax({
            type : 'POST',
            url  : 'core/sss.php',
            data : {"islem":"sil", sss:sss},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=settings");
                          }, 1000);
                      }
                }
        })
});






























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
</script>