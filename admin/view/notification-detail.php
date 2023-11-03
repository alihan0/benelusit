 <?php 
 $d = $db->query("SELECT * FROM tickets WHERE id = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);


 $u = $db->query("SELECT * FROM users WHERE id = '{$d['user']}'")->fetch(PDO::FETCH_ASSOC);
;


 ?>
 <style type="text/css">
     .staf{
        color: red;
        text-align: center;
        width: 100% !important;
     } 
 </style>
 <div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Destek Talebi Detayları</h4> 

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="d-lg-flex">
        <div class="chat-leftsidebar me-lg-4">
            <div class="">
                <div class="chat-leftsidebar-nav">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link active" id="kapat">
                                <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block">Talebi Kapat</span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
                <div class="py-4 border-bottom">
                    <div class="d-flex">
                        
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><?=$u['user_firstname'].' '. $u['user_lastname']?></h5>
                            <p class="text-muted mb-0"> @<?=$u['username']?></p>
                        </div>

                        <div>
                            
                        </div>
                    </div>
                </div>

            

                


            </div>
        </div>
        <div class="w-100 user-chat">
            <div class="card">
                <div class="p-4 border-bottom ">
                    <div class="row">
                        
                        
                    </div>
                </div>


                <div>
                    <div class="chat-conversation p-3">
                        <ul class="list-unstyled mb-0" data-simplebar style="max-height: 486px;">

<?php

$query = $db->query("SELECT * FROM ticket_chat WHERE ticket_id = '{$_GET['id']}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          ?>
<li class="<?php if($row['sender'] == 2){echo "right";}elseif($row['sender'] == 0){echo "staf";}?>">
            <div class="conversation-list">
                
                <div class="ctext-wrap">
                    <div class="conversation-name"><?php if($row['sender'] == 0){echo "Sistem";}elseif($row['sender'] == 1){echo "Kullanıcı";}else{echo "Siz";}?></div>
                    <p>
                      <?=$row['message']?>
                    </p>
                </div>
            </div>
        </li>
          <?php
     }
}
?>


                              




                        </ul>
                    </div>
                    

<?php 
if($d['status'] != 0){
    ?>
<div class="p-3 chat-input-section">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control chat-input" placeholder="Yanıtınız..." id="yanit">
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <button id="yanitla" type="submit" class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2" >Gönder</span> <i class="mdi mdi-send"></i></button>
                            </div>
                        </div>
                    </div>
    <?php
}

?>

                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
    
</div> <!-- container-fluid -->
</div>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $("#yanitla").on("click", function(){
        let yanit = $("#yanit").val();
        let ticket = "<?=$_GET['id']?>";
        $.ajax({
            type : 'POST',
            url  : 'core/ticket.php',
            data : {"islem":"yanitla", yanit:yanit, ticket:ticket},
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
    });

    $("#kapat").on("click", function(){
         let ticket = "<?=$_GET['id']?>";

         $.ajax({
            type : 'POST',
            url  : 'core/ticket.php',
            data : {"islem":"kapat", ticket:ticket},
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