 <div class="page-content">
    <div class="container-fluid">
 
        <!-- start page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#t1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Tüm Yazılar</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#t2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Kategoriler</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#t3" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Yeni Yazı</span>   
                                    </a>
                                </li>
                                
                                
                                
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>


<div class="tab-content p-3 text-muted">
    


<div class="tab-pane active" id="t1" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Yazı Başlığı</th>
                                                <th>Kategori</th>
                                                <th>Kapak</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM blog_posts", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $cat = $db->query("SELECT * FROM blog_categories WHERE id = '{$row['blog_cat']}'")->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['blog_title'];?></td>
                    <td><span class="badge bg-primary"><?=$cat['cat_name'];?></span></td>
                    <td><img width="50" src="uploads/blog/<?=$row['blog_cover']?>"></td>
                   <td id="<?=$row['id']?>">
                        <a href="javascript:void(0)" class="btn btn-danger yaziSil"><i class="fas fa-trash-alt"></i></a>
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







<div class="tab-pane " id="t2" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Kategoriler</h5>
                        </div>
                     </div>
               </div>
            

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="soru" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="cat" placeholder="Kategori Adı">
                    </div>
                </div>
                
                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="bcatEkle">Kaydet</button>
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
                                                <th>Kategori</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM blog_categories", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                     <td><b><?=$row['cat_name']?></td>
                    <td id="<?=$row['id']?>">
                        <a href="#" class="text-danger delbCat"><i class="fas fa-trash"></i></a>
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

<div class="tab-pane" id="t3" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    

                            <div class="card-body">
            <h4 class="card-title mb-4">Yeni Yazı Ekle</h4>
           
            <form>
                <div class="row">
                 <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="yazicat">
                                <option value="0" selected>Kategori Seçin</option>
                                <?php
                                $query = $db->query("SELECT * FROM blog_categories", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>"><?=$row['cat_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Kategori Ekleyin!</option>';
                                    }
                                ?>
                                
                                
                            </select>
                            <label for="floatingSelectGrid">Blog Kategorisini Seçin</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                            <label for="formFile" class="form-label">Kapak Görselini Seçin</label>
                        <div class="col-10">
                            <input class="form-control" type="file" id="cover">
                            <input class="form-control" type="hidden" id="cover_path">
                        </div>
                        <div class="col-2 cover_upload_btn_show" style="display:none">

                        <a class="btn btn-success w-md" id="cover_upload_btn"><i class="fas fa-cloud-upload-alt"></i> Yükle</a>
                    </div>
                       </div>
                    
                    
                </div>
                

                </div>

                <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Yazı Başlığı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="title" placeholder="Yazı Başlığını girin
                        ">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Yazı</label>
                    <div class="col-md-9">
                        
                        <textarea required class="form-control" rows="15" id="yazi" placeholder="Yazıyı girin. (HTML kullanabilirsiniz.)"></textarea>
                                       
                    </div>
                </div>
                

                </div>
            </div>
            <div class="row">
                
             </div>
        
          
            </form>
            
        </div>


                        </div>
                    </div>
                </div>


               <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" >
                                <button  style="float:right" type="submit" class="btn btn-primary w-md" id="yaziekle">Kaydet</button>
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
    $("#bcatEkle").on("click", function(){
        let cat = $("#cat").val();

        $.ajax({
            type : 'POST',
            url  : 'core/blog.php',
            data : {"islem":"cat-ekle", cat:cat},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=blog");
                          }, 1000);
                      }
                }
        })
    });

    $(".delbCat").on("click", function(){
        let id = $(this).parent("td").attr("id");

       $.ajax({
            type : 'POST',
            url  : 'core/blog.php',
            data : {"islem":"cat-sil", id:id},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=blog");
                          }, 1000);
                      }
                }
        })
    });





    $("#cover").on("change", function(){
        $(".cover_upload_btn_show").show();
    });
    $("#cover_upload_btn").on("click", function(){
                var file_data = $('#cover').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-blog-cover.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#cover_path").val(r.filename);
                    }
                 });                    
             });

    $("#yaziekle").on("click", function(){
        let cat = $("#yazicat").val();
        let title = $("#title").val();
        let yazi = $("#yazi").val();
        let cover = $("#cover_path").val();

        $.ajax({
            type : 'POST',
            url  : 'core/blog.php',
            data : {"islem":"yazi-ekle", cat:cat,title:title,yazi:yazi, cover:cover},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=blog");
                          }, 1000);
                      }
                }
        })
    });

    $(".yaziSil").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/blog.php',
            data : {"islem":"yazi-sil", id:id},
            dataType : 'JSON',
            success: function(r){
              toastr[r.stat](r.message);
                      if(r.ok){
                          setTimeout(function(){   
                              window.location.assign("main.php?page=blog");
                          }, 1000);
                      }
                }
        })
    })
</script>