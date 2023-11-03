<div class="page-content">
   <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#USER1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Kullanıcılar</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#USER2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Takımlar</span> 
                                    </a>
                                </li>
                                
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#USER3" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Rütbeler</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#USER4" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Ayarlar</span>    
                                    </a>
                                </li>
                                
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>
      <div class="tab-content p-3 text-muted">
        

         <div class="tab-pane active" id="USER1" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>K.Adı</th>
                                                <th>İsim</th>
                                                <th>E-Posta</th>
                                                <th>Telefon</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['username'];?></td>
                     
                     <td><?=$row['user_firstname'].' '.$row['user_lastname'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['user_phone'];?></td>
                    <td id="<?=$row['id']?>">
                        <a class="btn btn-info" href="main.php?page=profil&id=<?=$row['id']?>"><i class="fas fa-search"></i></a>
                        <a href="javascript:void(0)" class="btn btn-danger userDel"><i class="fas fa-trash"></i></a>
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


<div class="tab-pane " id="USER2" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Logo</th>
                                                <th>Takım Adı</th>
                                                <th>Kaptan</th>
                                                <th>Puan</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM teams", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
               $u = $db->query("SELECT * FROM users WHERE id = '{$row['team_captain']}'")->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td>logo</td>
                     
                     <td><b>[<?=$row['team_tag'].']</b> '.$row['team_name'];?></td>
                    <td><?=$u['user_firstname'].' <b>"'.$u['username'] .'"</b> '.$u['user_lastname'] ;?></td>
                    <td><?=$row['team_point'];?></td>
                    <td id="<?=$row['id']?>">
                         <a href="javascript:void(0)" class="btn btn-danger silTakim">
                            <i class="fas fa-trash"></i>
                         </a>
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



      <div class="tab-pane " id="USER3" role="tabpanel">
        <div class="row">



                
        
<div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Kullanıcı Rütbeleri</h5>
                        </div>
                     </div>
               </div>
            <div class="card">
                    <div class="card-body">
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>İkon</th>
                                                <th>Rütbe Adı</th>
                                                <th>Puan</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM user_ranks", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><img width="50" src="uploads/ranks/<?=$row['rank_picture'];?>"></td>
                     
                     <td><b><?=$row['rank_name'];?></b></td>
                   
                    <td><?=$row['rank_point'];?></td>
                    <td id="<?=$row['id']?>">
                        <a href="javascript:void(0)" class="btn btn-info editRutbe2">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="javascript:void(0)" class="btn btn-danger silRutbe2">
                            <i class="fas fa-trash"></i>
                         </a>
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

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Rütbe Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="rank_name" placeholder="Rütbe Adı">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Max Puan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="rank_point" placeholder="Rütbeye sahip olmak için gerekli puan">
                    </div>
                </div>
                <div class="row mb-4">
                            <label for="formFile" class="col-sm-3 col-form-label">İkon</label>
                        <div class="col-9">
                            <div class="input-group">
                            <input type="file" class="form-control" id="rankUpload" aria-label="Upload">
                            <button class="btn btn-success" type="button" id="rank_upload_btn" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                                          </div> 
                            <input class="form-control" type="hidden" id="rank_icon_path">
                        </div>
                       </div>

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="rankEkleBtn">Kaydet</button>
                    </div>
                </div>
               </div>
            </div>
         </div>

         <div class="col-6">
   <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                           <h5 class="text-muted">Takım Rütbeleri</h5>
                        </div>
                     </div>
               </div>
            <div class="card">
                    <div class="card-body">
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>İkon</th>
                                                <th>Rütbe Adı</th>
                                                <th>Puan</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM team_ranks", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><img width="50" src="uploads/ranks/<?=$row['rank_picture'];?>"></td>
                     
                     <td><b><?=$row['rank_name'];?></b></td>
                   
                    <td><?=$row['rank_point'];?></td>
                    <td id="<?=$row['id']?>">
                        <a href="javascript:void(0)" class="btn btn-info editRutbe">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="javascript:void(0)" class="btn btn-danger silRutbe">
                            <i class="fas fa-trash"></i>
                         </a>
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

                <div class="card">
                    <div class="card-body">
   
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Rütbe Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="rank_name2" placeholder="Rütbe Adı">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Max Puan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="rank_point2" placeholder="Rütbeye sahip olmak için gerekli puan">
                    </div>
                </div>
                <div class="row mb-4">
                            <label for="formFile" class="col-sm-3 col-form-label">İkon</label>
                        <div class="col-9">
                            <div class="input-group">
                            <input type="file" class="form-control" id="rankUpload2" aria-label="Upload">
                            <button class="btn btn-success" type="button" id="rank_upload_btn2" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                                          </div> 
                            <input class="form-control" type="hidden" id="rank_icon_path2">
                        </div>
                       </div>

                  <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="rankEkleBtn2">Kaydet</button>
                    </div>
                </div>
               </div>
            </div>
         </div>
         </div>
      </div>



<div class="tab-pane " id="USER4" role="tabpanel">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="card-title">Kullanıcı Ayarları </div>
               <sub class="text-muted" style="float:right">Son Güncelleme: <?=$us['last_update'];?></sub>
               <hr>
               <form id="user_settings_form">
               <div class="row">
                  <div class="col-4">
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us1" name="us1" <?php  ($us['user_login_permission'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us1" >Kullanıcılar oturum açabilsin</label>
                     </div>
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us2" name="us2"<?php  ($us['user_register_permission'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us2">Kullanıcılar kayıt olabilsin</label>
                     </div>
                     
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input onclick="return false;" class="form-check-input" type="checkbox" id="us4" name="us4"<?php  ($us['force_email_entry'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us4">E-posta girmek zorunlu</label>
                     </div>
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us5" name="us5"<?php  ($us['force_phone_entry'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us5">Telefon girmek zorunlu</label>
                     </div>
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us6"name="us6" <?php  ($us['force_birthday_entry'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us6">Doğum tarihi girmek zorunlu</label>
                     </div>
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us7" name="us7"<?php  ($us['force_email_verify'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us7">E-posta doğrulamaya zorla</label>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="us8" name="us8"<?php  ($us['force_phone_verify'] == 1) ? print'checked': ""; ?>>
                     <label class="form-check-label" for="us8">Telefon doğrulamaya zorla</label>
                     </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us9"name="us9" value="<?=$us['user_starting_point'];?>">
                        </div>
                        <label for="us9" class="col-8 col-form-label">Başlangıç puanı</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us10"name="us10" value="<?=$us['user_starting_gem'];?>">
                        </div>
                        <label for="us10" class="col-8 col-form-label">Başlangıç Gem Miktarı</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us11"name="us11" value="<?=$us['max_incorrect_login'];?>">
                        </div>
                        <label for="us11" class="col-8 col-form-label">Hatalı giriş sayısı</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us12"name="us12" value="<?=$us['points_earned_per_tournament'];?>">
                        </div>
                        <label for="us12" class="col-8 col-form-label">Turnuva başına puan</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us13"name="us13" value="<?=$us['points_earned_per_tour'];?>">
                        </div>
                        <label for="us13" class="col-8 col-form-label">Tur başına puan</label>
                    </div>
                    <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us14"name="us14" value="<?=$us['gem_earned_per_tournament'];?>">
                        </div>
                        <label for="us14" class="col-8 col-form-label">Turnuva başına Gem</label>
                    </div>
                  </div>
                  <div class="col-4">
                     
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us15"name="us15" value="<?=$us['gem_earned_per_tour'];?>">
                        </div>
                        <label for="us15" class="col-8 col-form-label">Tur başına Gem</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us16"name="us16" value="<?=$us['max_faul_suspend'];?>">
                        </div>
                        <label for="us16" class="col-8 col-form-label">faul sonra askıya al</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us17"name="us17" value="<?=$us['max_faul_banned'];?>">
                        </div>
                        <label for="us17" class="col-8 col-form-label">faul sonra banla</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us18"name="us18" value="<?=$us['min_age_register'];?>">
                        </div>
                        <label for="us18" class="col-8 col-form-label">Min. kayıt yaşı</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us19"name="us19" value="<?=$us['min_age_join_torunaments'];?>">
                        </div>
                        <label for="us19" class="col-8 col-form-label">Min. turnuva kayıt yaşı</label>
                    </div>
                     <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us20"name="us20" value="<?=$us['max_age_register'];?>">
                        </div>
                        <label for="us20" class="col-8 col-form-label">Max. kayıt yaşı</label>
                    </div>
                    <div class="row">
                        
                        <div class="col-2">
                          <input type="text" class="form-control form-control-sm" id="us21"name="us21" value="<?=$us['max_age_join_tournament'];?>">
                        </div>
                        <label for="us21" class="col-8 col-form-label">Max. turnuva kayıt yaşı</label>
                    </div>
                  </div>
               </div>
            </form>
               <hr>  
               <div class="row">
                  <div class="col-10">
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                           Burada yaptığınız değişiklikler bazı servislerin çalışmasına engel olabilir. Emin olmadan değiştirmeyin.
                    </div>
                  </div>
                  <div class="col-2">
                     <a id="user_settings_btn" class="btn btn-info"><i class="fas fa-redo"></i> Güncelle</a>
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







<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
   
   $("#rankUpload").on("change", function(){
        $("#rank_upload_btn").show();
    });
   $("#rank_upload_btn").on("click", function(){
                var file_data = $('#rankUpload').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-rank-icon.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#rank_icon_path").val(r.filename);

                    }
                 });                    
             });
   $("#rankEkleBtn").on("click", function(){
        var rankAdi = $("#rank_name").val();
        var rankimg = $("#rank_icon_path").val();
        var point = $("#rank_point").val();

        $.ajax({
            type : 'POST',
            url  : 'core/users.php',
            data : {"islem":"rankEkle", rankAdi:rankAdi, rankimg:rankimg, point:point},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=users");
                            }, 1000);
                        }
            }
        });
    });

   $("#rankUpload2").on("change", function(){
        $("#rank_upload_btn2").show();
    });
   $("#rank_upload_btn2").on("click", function(){
                var file_data = $('#rankUpload2').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-rank-icon.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#rank_icon_path2").val(r.filename);

                    }
                 });                    
             });
   $("#rankEkleBtn2").on("click", function(){
        var rankAdi = $("#rank_name2").val();
        var rankimg = $("#rank_icon_path2").val();
        var point = $("#rank_point2").val();

        $.ajax({
            type : 'POST',
            url  : 'core/users.php',
            data : {"islem":"rankEkle2", rankAdi:rankAdi, rankimg:rankimg, point:point},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=users");
                            }, 1000);
                        }
            }
        });
    });

   $("#user_settings_btn").on("click", function(){
      var us9 = $("#us9").val();
      var us10 = $("#us10").val();
      var us11 = $("#us11").val();
      var us12 = $("#us12").val();
      var us13 = $("#us13").val();
      var us14 = $("#us14").val();
      var us15 = $("#us15").val();
      var us16 = $("#us16").val();
      var us17 = $("#us17").val();
      var us18 = $("#us18").val();
      var us19 = $("#us19").val();
      var us20 = $("#us20").val();
      var us21 = $("#us21").val();

      if ($('#us1').is(':checked')) {
          var us1 = 1;
      }else{
         var us1 = 0;
      }
      if ($('#us2').is(':checked')) {
          var us2 = 1;
      }else{
         var us2 = 0;
      }
      if ($('#us3').is(':checked')) {
          var us3 = 1;
      }else{
         var us3 = 0;
      }
      if ($('#us4').is(':checked')) {
          var us4 = 1;
      }else{
         var us4 = 0;
      }
      if ($('#us5').is(':checked')) {
          var us5 = 1;
      }else{
         var us5 = 0;
      }
      if ($('#us6').is(':checked')) {
          var us6 = 1;
      }else{
         var us6 = 0;
      }
      if ($('#us7').is(':checked')) {
          var us7 = 1;
      }else{
         var us7 = 0;
      }
      if ($('#us8').is(':checked')) {
          var us8 = 1;
      }else{
         var us8 = 0;
      }
      $.ajax({
         type : 'POST',
         url : 'core/users.php',
         data : {"islem":"user_settings", us1:us1,us2:us2,us3:us3,us4:us4,us5:us5,us6:us6,us7:us7,us8:us8,us9:us9,us10:us10,us11:us11,us12:us12,us13:us13,us14:us14,us15:us15,us16:us16,us17:us17,us18:us18,us19:us19,us20:us20,us21:us21},
         dataType: 'JSON',
         success: function(r){
          toastr[r.stat](r.message);
                  if(r.ok){
                      setTimeout(function(){   
                          window.location.assign("main.php?page=users");
                      }, 1000);
                  }
            }
      })
   });


   $(".userDel").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                icon : 'info',
                title: "Dikkat!",
                text: "Kullanıcıyı silmek üzeresiniz! Bu işlem geri alınamaz! Kullanıcıyı sildiğinizde onunla ilgili tüm veriler silinecek ve bir daha geri getirelemeyecektir. Bunu gerçekten istiyor musunuz?",

                 input: "password",
                 
                 inputPlaceholder: 'Yönetici Şifreniz',
                 footer: "<center><b>Bu işlemi yapabilmek için yönetici şifrenizi girmek zorundasınız!</b></center>",
                 showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Evet, Sil',
                  cancelButtonText: 'İptal'
            }).then( (r)=> {
                if (r.isConfirmed) {
                    let pass = $('input[placeholder="Yönetici Şifreniz"]').val();
                    $.ajax({
                        type : 'POST',
                        url  : 'core/userDel.php',
                        data : {pass:pass, id:id},
                        dataType: 'JSON',
                        success: function(result) {
                             Swal.fire(
                              result.title,
                              result.html,
                              result.icon
                            );
                             if(result.ok){
                                setTimeout(function(){   
                              window.location.reload();
                          }, 2000);
                                
                             }
                        }
                    })

                   
                  }
            } )
   });




   $(".silTakim").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"takim", id:id},
            dataType: 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.reload();
                            }, 1000);
                        }
            }

        })
    });



   $(".silRutbe").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"rutbe", id:id},
            dataType: 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.reload();
                            }, 1000);
                        }
            }

        })
    });
   $(".editRutbe").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                title: "Rütbe Adını Düzenle",
                input: "text",
                inputPlaceholder: "Yeni rütbe adı",
                confirmButtonText: "Güncelle",

                preConfirm:function(n){
                   
                   $.ajax({
                    type : 'POST',
                    url  : 'core/edit.php',
                    data : {"sec":"rutbe", id:id, n:n},
                    dataType : 'JSON',
                    success: function(r){
                        toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){
                                window.location.reload();
                            },1000);
                        }
                    }
                   })


                }
            })
    });




    $(".silRutbe2").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"rutbe2", id:id},
            dataType: 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.reload();
                            }, 1000);
                        }
            }

        })
    });
   $(".editRutbe2").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                title: "Rütbe Adını Düzenle",
                input: "text",
                inputPlaceholder: "Yeni rütbe adı",
                confirmButtonText: "Güncelle",

                preConfirm:function(n){
                   
                   $.ajax({
                    type : 'POST',
                    url  : 'core/edit.php',
                    data : {"sec":"rutbe2", id:id, n:n},
                    dataType : 'JSON',
                    success: function(r){
                        toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){
                                window.location.reload();
                            },1000);
                        }
                    }
                   })


                }
            })
    });
</script>