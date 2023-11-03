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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#GAME1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Tüm Oyunlar</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#GAME2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Yeni Oyun</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#GAME3" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Kategoriler</span>   
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#GAME4" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Haritalar</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#GAME6" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Türler</span>    
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#GAME7" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Platformlar</span>    
                                    </a>
                                </li>
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>
<div class="tab-content p-3 text-muted">






    <div class="tab-pane" id="GAME2" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    

                            <div class="card-body">
            <h4 class="card-title mb-4">Yeni Oyun Ekle</h4>
           
            <form>
                <div class="row">
                 <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <select class="select2 form-select select2-multiple" id="oyunKategori"
                                                            multiple="multiple" style="width: 100%;">
                         
                                <?php
                                $query = $db->query("SELECT * FROM game_categories", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>" ><?=$row['categori_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Kategori Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>
                           <input type="hidden" id="kategoriler">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Platform</label>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <select class="select2 form-select select2-multiple" id="oyunPlatform"
                                                            multiple="multiple" style="width: 100%;">
                         
                                <?php
                                $query = $db->query("SELECT * FROM game_platforms", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>" ><?=$row['platform_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Platformu Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>

                            <input type="hidden" id="platformlar">
                            
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tür</label>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <select class="select2 form-select select2-multiple" id="oyunTuru"
                                                            multiple="multiple" style="width: 100%;">
                              
                                <?php
                                $query = $db->query("SELECT * FROM game_kinds", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>" ><?=$row['kind_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Tür Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>
                           <input type="hidden" id="turler">
                        </div>
                    </div>
                </div>

                </div>

                <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Oyun Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="oyunAdi" placeholder="Oyunun Adını Girin (Büyük/küçük duyarlı)">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                        
                        <textarea required class="form-control" rows="5" id="oyunAciklama" placeholder="Oyunun detay sayfasında görünecek yazıyı girin."></textarea>
                                       
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Resmi Site</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="oyunWeb" placeholder="Oyunun resmi websitesi">
                    </div>
                </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                            <label for="formFile" class="form-label">Kapak Görselini Seçin</label>
                        <div class="col-10">
                            <input class="form-control" type="file" id="game_cover">
                            <input class="form-control" type="hidden" id="game_cover_path">
                        </div>
                        <div class="col-2 game_cover_upload_btn_show" style="display:none">

                        <a class="btn btn-success w-md" id="game_cover_upload_btn"><i class="fas fa-cloud-upload-alt"></i> Yükle</a>
                    </div>
                       </div>
                    
                    
                </div>
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
                                <button  style="float:right" type="submit" class="btn btn-primary w-md" id="oyunEkleBtn">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>



</div>

<?php
    if(@$_GET['query'] == "del"){
        $id = $_GET['id'];

        $query = $db->query("SELECT * FROM games WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

        if($query){
            $t = $db->query("SELECT * FROM tournaments WHERE tournament_game = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            $tid =  $t['id'];

            $query = $db->prepare("DELETE FROM games WHERE id = :id");
                $delete = $query->execute(array(
                   'id' => $id
                ));


                $query = $db->prepare("DELETE FROM game_maps WHERE game_id = :id");
                $delete = $query->execute(array(
                   'id' => $id
                ));


             

$query = $db->prepare("DELETE FROM tournaments WHERE tournament_game = :id");
$delete = $query->execute(array(
   'id' => $id
));

   $query = $db->prepare("DELETE FROM tournament_recourses WHERE tournament_id = :id");
$delete = $query->execute(array(
   'id' => $tid
));

   $query = $db->prepare("DELETE FROM tournament_recourses WHERE tournament_id = :id");
$delete = $query->execute(array(
   'id' => $tid
));

   $query = $db->prepare("DELETE FROM tournament_tours WHERE tournament_id = :id");
$delete = $query->execute(array(
   'id' => $tid
));
   $query = $db->prepare("DELETE FROM tournament_user_list WHERE tournament_id = :id");
$delete = $query->execute(array(
   'id' => $tid
));


        }else{
            ?>
<div class="alert alert-danger" role="alert">
           Oyun bulunamadı! <i class="fas fa-spinner fa-spin"></i>
        </div>
            <?php
            header("refresh:2; url=main.php?page=games");
        }


    }
?>

<div class="tab-pane active" id="GAME1" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Oyun Adı</th>
                                                <th>Kategori</th>
                                                <th>Platformlar</th>
                                                <th>Oyun Türü</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $cat = $db->query("SELECT * FROM game_categories WHERE id = '{$row['game_categori']}'")->fetch(PDO::FETCH_ASSOC);
                $p = $db->query("SELECT * FROM game_platforms WHERE id = '{$row['game_platform']}'")->fetch(PDO::FETCH_ASSOC);
                $str = $row['game_kind'];
                $s = explode(",", $str);
  
                $u = count($s);


                $str2 = $row['game_platform'];
                $s2 = explode(",", $str2);
  
                $u2 = count($s2);


                $str3 = $row['game_categori'];
                $s3 = explode(",", $str3);
  
                $u3 = count($s3);

                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['game_name'];?></td>
                    <td style="max-width: 100px;"><?php
                    for($i3 = 0; $i3 < $u3; $i3++){
                        $k3 = $db->query("SELECT * FROM game_categories WHERE id = '{$s3[$i3]}'")->fetch(PDO::FETCH_ASSOC);
                        echo '<span style="float:left;margin:2px"  class="badge bg-primary">'.$k3['categori_name'].'</span> ';
                    }
                    ?></span></td>
                    <td style="max-width: 100px;"><?php
                    for($i2 = 0; $i2 < $u2; $i2++){
                        $k2 = $db->query("SELECT * FROM game_platforms WHERE id = '{$s2[$i2]}'")->fetch(PDO::FETCH_ASSOC);
                        echo '<span style="float:left;margin:2px"  class="badge bg-info">'.$k2['platform_name'].'</span> ';
                    }
                    ?></span></td>
                    <td style="max-width: 100px;"><?php
                    for($i = 0; $i < $u; $i++){
                        $k = $db->query("SELECT * FROM game_kinds WHERE id = '{$s[$i]}'")->fetch(PDO::FETCH_ASSOC);
                        echo '<span style="float:left;margin:2px"  class="badge bg-warning">'.$k['kind_name'].'</span> ';
                    }
                    ?></span></td>
                    <td>
                        <a class="btn btn-info" href="main.php?page=game-edit&id=<?=$row['id']?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="main.php?page=games&query=del&id=<?=$row['id']?>"><i class="fas fa-trash-alt"></i></a>
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



<div class="tab-pane" id="GAME3" role="tabpanel">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Kategori Adı</th>
                                                <th>Açıklama</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM game_categories", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['categori_name'];?></td>
                    <td><?=$row['categori_desc'];?></td>
                    <td id="<?=$row['id']?>"><a href="javascript:void(0)" class="btn btn-info editKategori"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" class="btn btn-danger silKategori"><i class="fas fa-trash"></i></a></td>
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
<div class="col-6">
    <div class="card">
                    <div class="card-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="kategoriAdi" placeholder="Kategori Adını Girin">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                        
                        <textarea required class="form-control" rows="5" placeholder="Kategori açıklamasını girin. (Zorunlu değil)" id="kategoriDesc"></textarea>
                                       
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="kategoriEkleBtn">Kaydet</button>
                    </div>
                </div>

                </div>



                </div>

</div>
</div>
</div>                       


<div class="tab-pane" id="GAME6" role="tabpanel">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Tür Adı</th>
                                                <th>Açıklama</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM game_kinds", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['kind_name'];?></td>
                    <td><?=$row['kind_desc'];?></td>
                    <td id="<?=$row['id']?>"><a href="javascript:void(0)" class="btn btn-info editTur"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" class="btn btn-danger silTur"><i class="fas fa-trash"></i></a></td>
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
<div class="col-6">
    <div class="card">
                    <div class="card-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tür Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="turAdi" placeholder="Tür Adını Girin">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                        
                        <textarea required class="form-control" rows="5" placeholder="Tür açıklamasını girin. (Zorunlu değil)" id="turDesc"></textarea>
                                       
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="turEkleBtn">Kaydet</button>
                    </div>
                </div>

                </div>



                </div>

</div>
</div>
</div>
          

<div class="tab-pane" id="GAME7" role="tabpanel">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Platform Adı</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM game_platforms", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['platform_name'];?></td>
                    <td id="<?=$row['id']?>">
                        <a href="javascript:void(0)" class="btn btn-info editPlatform">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="javascript:void(0)" class="btn btn-danger silPlatform">
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
<div class="col-6">
    <div class="card">
                    <div class="card-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Platform Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="platformAdi" placeholder="Platform Adını Girin">
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="platformEkleBtn">Kaydet</button>
                    </div>
                </div>

                </div>



                </div>

</div>
</div>
</div>                  





<div class="tab-pane" id="GAME4" role="tabpanel">
        <div class="row">
            
<div class="col-6">
    <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Oyun</label>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="oyunsec">
                                <option value="0" selected>Oyun Seçin</option>
                                <?php
                                $query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>"><?=$row['game_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Oyun Ekleyin!</option>';
                                    }
                                ?>
                                
                                
                            </select>
                            <label for="floatingSelectGrid">Oyun Seçin</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="platformAdi" class="col-sm-3 col-form-label">Harita Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="mapAdi" placeholder="Harita Adını Girin">
                    </div>
                </div>

                <div class="row mb-4">
                            <label for="formFile" class="col-sm-3 col-form-label">Resim seç</label>
                        <div class="col-9">
                            <div class="input-group">
                            <input type="file" class="form-control" id="mapUpload" aria-label="Upload">
                            <button class="btn btn-success" type="button" id="map_upload_btn" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                                          </div> 
                            <input class="form-control" type="hidden" id="map_cover_path">
                        </div>
                       </div>
                
                <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="mapEkleBtn">Kaydet</button>
                    </div>
                </div>

                </div>



                </div>

</div>

<div class="col-6" id="onizleme">
            
</div>




</div>

<div class="row">
    
    <div class="col-6">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Oyun</th>
                                                <th>Harita Adı</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM game_maps", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?php 
$query = $db->query("SELECT * FROM games WHERE id = '{$row['game_id']}'")->fetch(PDO::FETCH_ASSOC);
echo $query['game_name']
            ?></td>
                    <td><?=$row['map_name'];?></td>
                    <td id="<?=$row['id']?>">
                         <a href="javascript:void(0)" class="btn btn-danger silMap">
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





















 

                          
                            
                            
                            
                </div>
            </div>
        </div>
        </div>
        </div>
        




    </div>
</div>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $("#kategoriEkleBtn").on("click", function(){
        var kategoriAdi = $("#kategoriAdi").val();
        var kategoriDesc = $("#kategoriDesc").val();

        $.ajax({
            type : 'POST',
            url  : 'core/games.php',
            data : {"islem":"kategoriEkle", kategoriAdi:kategoriAdi, kategoriDesc:kategoriDesc},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=games");
                            }, 1000);
                        }
            }
        });
    });
    $("#turEkleBtn").on("click", function(){
        var turAdi = $("#turAdi").val();
        var turDesc = $("#turDesc").val();

        $.ajax({
            type : 'POST',
            url  : 'core/games.php',
            data : {"islem":"turEkle", turAdi:turAdi, turDesc:turDesc},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=games");
                            }, 1000);
                        }
            }
        });
    });
    $("#platformEkleBtn").on("click", function(){
        var platformAdi = $("#platformAdi").val();
        var platformDesc = $("#platformDesc").val();

        $.ajax({
            type : 'POST',
            url  : 'core/games.php',
            data : {"islem":"platformEkle", platformAdi:platformAdi, platformDesc:platformDesc},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=games");
                            }, 1000);
                        }
            }
        });
    });
    $("#game_cover").on("change", function(){
        $(".game_cover_upload_btn_show").show();
    });
    $(function() {
        $('#oyunTuru').change(function(e) {
            var selected = $(e.target).val();
            $("#turler").val(selected);
        }); 
    });

    $(function() {
        $('#oyunPlatform').change(function(e) {
            var selected = $(e.target).val();
            $("#platformlar").val(selected);
        }); 
    });
    $(function() {
        $('#oyunKategori').change(function(e) {
            var selected = $(e.target).val();
            $("#kategoriler").val(selected);
        }); 
    });

    $("#game_cover_upload_btn").on("click", function(){
                var file_data = $('#game_cover').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-game-cover.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#game_cover_path").val(r.filename);
                    }
                 });                    
             });
    $("#oyunEkleBtn").on("click", function(){
        var oyunKategorisi = $("#kategoriler").val();
        var oyunPlatformu = $("#platformlar").val();
        var oyunTuru = $("#turler").val();  
        var oyunAdi = $("#oyunAdi").val();
        var oyunAciklama = $("#oyunAciklama").val();
        var oyunWeb = $("#oyunWeb").val();
        var game_cover_path = $("#game_cover_path").val();


        $.ajax({
            type : 'POST',
            url  : 'core/games.php',
            data : {"islem":"oyunEkle", oyunKategorisi:oyunKategorisi, oyunPlatformu:oyunPlatformu, oyunAdi:oyunAdi, oyunAciklama:oyunAciklama, oyunWeb:oyunWeb, game_cover_path:game_cover_path,  oyunTuru:oyunTuru,},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=games");
                            }, 1000);
                        }
            }
        });
    });

    $("#mapUpload").on("change", function(){
        $("#map_upload_btn").show();
    });

    $("#map_upload_btn").on("click", function(){
                var file_data = $('#mapUpload').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                                             
                $.ajax({
                    url: 'core/upload-map-cover.php', // <-- point to server-side PHP script 
                    dataType: 'JSON',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(r){
                        toastr[r.toast](r.text);
                        $("#map_cover_path").val(r.filename);
                        $("#onizleme").html('<img src="uploads/maps/'+r.filename+'" width="400px">')
                    }
                 });                    
             });
    $("#mapEkleBtn").on("click", function(){
        var mapAdi = $("#mapAdi").val();
        var mapimg = $("#map_cover_path").val();
        var oyun = $("#oyunsec").val();  

        $.ajax({
            type : 'POST',
            url  : 'core/games.php',
            data : {"islem":"mapEkle", mapAdi:mapAdi, mapimg:mapimg, oyun:oyun},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=games");
                            }, 1000);
                        }
            }
        });
    });


    $(".silKategori").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"oyunKategori", id:id},
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
    $(".editKategori").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                title: "Kategori Adını Düzenle",
                input: "text",
                inputPlaceholder: "Yeni kategori adı",
                confirmButtonText: "Güncelle",

                preConfirm:function(n){
                   
                   $.ajax({
                    type : 'POST',
                    url  : 'core/edit.php',
                    data : {"sec":"oyunKategori", id:id, n:n},
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



    $(".silTur").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"oyunTur", id:id},
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
    $(".editTur").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                title: "Tür Adını Düzenle",
                input: "text",
                inputPlaceholder: "Yeni tür adı",
                confirmButtonText: "Güncelle",

                preConfirm:function(n){
                   
                   $.ajax({
                    type : 'POST',
                    url  : 'core/edit.php',
                    data : {"sec":"oyunTur", id:id, n:n},
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


    $(".silPlatform").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"oyunPlatform", id:id},
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

    $(".editPlatform").on("click", function(){
        let id = $(this).parent("td").attr("id");

            swal.fire({
                title: "Platform Adını Düzenle",
                input: "text",
                inputPlaceholder: "Yeni kategori adı",
                confirmButtonText: "Güncelle",

                preConfirm:function(n){
                   
                   $.ajax({
                    type : 'POST',
                    url  : 'core/edit.php',
                    data : {"sec":"oyunPlatform", id:id, n:n},
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


    $(".silMap").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"oyunMap", id:id},
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
</script>