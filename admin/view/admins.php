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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#ADMIN1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Tüm Yöneticiler</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#ADMIN2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Yeni Yönetici</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#ADMIN3" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Yönetici Grupları</span>   
                                    </a>
                                </li>
                                
                                
                                
                            </ul>

                        <!-- Tab panes -->
                        

                    </div>
                </div>
            </div>
        </div>
<div class="tab-content p-3 text-muted">

<div class="tab-pane active" id="ADMIN1" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>İsim</th>
                                                <th>E-posta</th>
                                                <th>Grup</th>
                                                <th>Durum</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM admins", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $g = $db->query("SELECT * FROM admin_groups WHERE id = '{$row['admin_group']}'")->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['first_name']. ' '. $row['last_name'] ;?></td>
                    <td><?=$row['email'];?></td>
                    <td><span class="badge bg-primary"><?=$g['group_name'];?></span></td>
                    <td><?php if($row['status'] == 1) { print'<span class="badge bg-success">Aktif</span>';}else{ print'<span class="badge bg-warning">Pasif</span>'; }?></td>
                    <td id="<?=$row['id']?>">
                        <a class="btn btn-danger silAdmin"><i  class="fas fa-trash"></i></a>
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
<div class="tab-pane" id="ADMIN2" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    

                            <div class="card-body">
            <h4 class="card-title mb-4">Yeni Yönetici Ekle</h4>
           
            <form>
                <div class="row">
                 <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Grup</label>
                    <div class="col-md-9">
                        <div class="form mb-3">
                            <select class="form-select" id="admingrup">
                                <option value="0" selected>Yönetici Grubu Seçin</option>
                                <?php
                                $query = $db->query("SELECT * FROM admin_groups", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                         foreach( $query as $row ){
                                            ?>
                                <option value="<?=$row['id'];?>"><?=$row['group_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce grup oluşturun!</option>';
                                    }
                                ?>
                                
                                
                            </select>
                           
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">İsim</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="ad" placeholder="Ad">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="soyad" placeholder="Soyad">
                    </div>
                </div>

                </div>

                <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">E-posta</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="eposta" placeholder="E-posta Adresi">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Şifre</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="sifre" placeholder="Şifre">
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
                                <button  style="float:right" type="submit" class="btn btn-primary w-md" id="adminEkleBtn">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>



</div>

<div class="tab-pane" id="ADMIN3" role="tabpanel">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Grup Adı</th>
                                                <th>Yetkiler</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
                                             <tbody>
<?php
    $query = $db->query("SELECT * FROM admin_groups", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
                $str = $row['group_auths'];
                $s = explode(",", $str);
  
                $u = count($s);
                $yetkiler = [
                    1 => "Oturum Açma",
                    2 => "Oyun Yön.",
                    3 => "Yönetici Yön.",
                    4 => "Kullanıcı Yön.",
                    5 => "Site Yön.",
                    6 => "SEO Yön.",
                    7 => "Turnuva Yön.",
                    8 => "Mağaza Yön.",
                    9 => "API Yön.",
                    10 => "Destek Yön.",
                    11 => "Sipariş Yön."
                ];
                ?>
                
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['group_name'];?></td>
                    <td style="max-width: 100px;"><?php
                    foreach ($s as $key => $value) {
                        echo '<span style="float:left;margin:2px"  class="badge bg-info">'.$yetkiler[$value].'</span>';
                    }
                    ?></span></td>
                    <td id="<?=$row['id']?>">
                        <a class="btn btn-danger silAdmingrup"><i  class="fas fa-trash"></i></a>
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
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Grup Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="grupAdi" placeholder="Grup Adını Girin">

                        <input type="hidden" value="1" class="form-control" id="grup_yetki">
                    </div>
                </div>
                <hr>

                <div class="row mb-4">
                	<div class="col-6">
                		<div class="form-check mb-3">
                            <input  disabled checked class="form-check-input" type="checkbox" id="y1">
                            <label class="form-check-label" for="y1">
                                Oturum açabilir
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y2" value="2">
                            <label class="form-check-label" for="y2">
                                Oyun Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y3" value="3">
                            <label class="form-check-label" for="y3">
                                Yönetici Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y4" value="4">
                            <label class="form-check-label" for="y4">
                                Kullanıcı Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y5" value="5">
                            <label class="form-check-label" for="y5">
                                Site Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y6" value="6">
                            <label class="form-check-label" for="y6">
                                SEO Yönetimi
                            </label>
                        </div>
                	</div>
                	<div class="col-6">
                		<div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y7" value="7">
                            <label class="form-check-label" for="y7">
                                Turnuva Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y8" value="8">
                            <label class="form-check-label" for="y8">
                                Mağaza Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y9" value="9">
                            <label class="form-check-label" for="y9">
                                API Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y10" value="10"> 
                            <label class="form-check-label" for="y10">
                                Destek  Yönetimi
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="y11" value="11">
                            <label class="form-check-label" for="y11">
                                Sipariş Yönetimi
                            </label>
                        </div>
                	</div>
                	
                </div>

                <div class="row ">
                    <div class="col-md-12">
                      <button  style="float:right" type="submit" class="btn btn-primary w-md " id="grupEkleBtn">Kaydet</button>
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
	
	var yetki = [1];
$("input[type=checkbox]").on("click", function(){
    var val = $(this).val();

    var d = jQuery.inArray(val, yetki) 
       if(d == -1){
        yetki.push(val);
       }else{
        for( var i = 0; i < yetki.length; i++){ 
            
                if ( yetki[i] === val) { 
            
                    yetki.splice(i, 1); 
                }
            
            }
       }
    $("#grup_yetki").val(yetki);
});
$("#grupEkleBtn").on("click", function(){
    var grupadi = $("#grupAdi").val();
    var grupyetki = $("#grup_yetki").val();

        $.ajax({
            type : 'POST',
            url  : 'core/admins.php',
            data : {"islem":"grupEkle", grupadi:grupadi, grupyetki:grupyetki},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=admins");
                            }, 1000);
                        }
            }
        });
});
$("#adminEkleBtn").on("click", function(){
    var ad = $("#ad").val();
    var soyad = $("#soyad").val();
    var grup = $("#admingrup").val();
    var email = $("#eposta").val();
    var sifre = $("#sifre").val();

        $.ajax({
            type : 'POST',
            url  : 'core/admins.php',
            data : {"islem":"adminEkle", ad:ad, soyad:soyad, grup:grup, email:email, sifre:sifre},
            dataType : 'JSON',
            success: function(r){
                toastr[r.stat](r.message);
                        if(r.ok){
                            setTimeout(function(){   
                                window.location.assign("main.php?page=admins");
                            }, 1000);
                        }
            }
        });
});

$(".silAdmin").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"admin", id:id},
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
$(".silAdmingrup").on("click", function(){
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type : 'POST',
            url  : 'core/sil.php',
            data : {"sec":"admingrup", id:id},
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