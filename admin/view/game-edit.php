 <div class="page-content">
    <div class="container-fluid">


<?php

$g = $db->query("SELECT * FROM games WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

?>


<div class="tab-pane" id="GAME2" role="tabpanel">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    

                            <div class="card-body">
            <h4 class="card-title mb-4">Oyunu Düzenle</h4>
           
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
                                <option

<?php
        $c = $g['game_categori'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            
            if($id == $row['id']){
                echo "selected";
            }
        }

    ?>


                                 value="<?=$row['id'];?>" ><?=$row['categori_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Kategori Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>
                           <input type="hidden" id="kategoriler" value="<?=$g['game_categori']?>">
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
                                <option

<?php
        $c = $g['game_platform'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            
            if($id == $row['id']){
                echo "selected";
            }
        }

    ?>


                                value="<?=$row['id'];?>" ><?=$row['platform_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Platformu Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>

                            <input type="hidden" id="platformlar" value="<?=$g['game_platform']?>">
                            
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
                                <option 


<?php
        $c = $g['game_kind'];

        

        $exp = explode(",",$c);
         $say = count($exp);
    
        for($i=0;$i<$say;$i++){
            
            $id = $exp[$i];
            
            if($id == $row['id']){
                echo "selected";
            }
        }

    ?>


                                value="<?=$row['id'];?>" ><?=$row['kind_name'];?></option>
                                            <?php
                                         }
                                    }else{
                                        echo ' <option value="0">Önce Tür Ekleyin!</option>';
                                    }
                                ?>
                                
                            </select>
                           <input type="hidden" id="turler" value="<?=$g['game_kind']?>">
                        </div>
                    </div>
                </div>

                </div>

                <div class="col-6">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Oyun Adı</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="oyunAdi" value="<?=$g['game_name']?>" >
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                    <div class="col-md-9">
                        
                        <textarea required class="form-control" rows="5" id="oyunAciklama"><?=$g['game_desc']?></textarea>
                                       
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Resmi Site</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="oyunWeb" value="<?=$g['game_official_web']?>">
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
                            <input class="form-control" type="hidden" id="game_cover_path" value="<?=$g['game_cover']?>" >
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
                                <button  style="float:right" type="submit" class="btn btn-primary w-md" id="oyunGuncelleBtn">Güncelle</button>
                            </div>
                        </div>
                    </div>
                </div>
<div class="row">
    <div class="col-12">
        <img src="uploads/games/<?=$g['game_cover']?>">
    </div>
</div>

               



</div>
</div>
</div>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
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
    
     $("#oyunGuncelleBtn").on("click", function(){
        var oyunKategorisi = $("#kategoriler").val();
        var oyunPlatformu = $("#platformlar").val();
        var oyunTuru = $("#turler").val();  
        var oyunAdi = $("#oyunAdi").val();
        var oyunAciklama = $("#oyunAciklama").val();
        var oyunWeb = $("#oyunWeb").val();
        var game_cover_path = $("#game_cover_path").val();
        var id = "<?=$_GET['id']?>";

        $.ajax({
            type : 'POST',
            url  : 'core/gameedit.php',
            data : {id:id, oyunKategorisi:oyunKategorisi, oyunPlatformu:oyunPlatformu, oyunAdi:oyunAdi, oyunAciklama:oyunAciklama, oyunWeb:oyunWeb, game_cover_path:game_cover_path,  oyunTuru:oyunTuru,},
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
</script>