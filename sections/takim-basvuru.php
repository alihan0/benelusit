<?php 
session_start();
include '../config.php';

if($_POST){

    $basvuru = $_POST['basvuru'];

    ?>
    <table class="table" style="width:100%">
       <thead>
            <tr>
                <th>Logo</th>
               <th>Takım Adı</th>
               <th>Lider</th>
               <th>Slogan</th>
               <th>Puan</th>
               <th>Başvur</th>
            </tr>
       </thead>
       <tbody>
        <?php 
        $query = $db->query("SELECT * FROM teams WHERE team_name LIKE '%$basvuru%' ", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $u = $db->query("SELECT * FROM users WHERE id = '{$row['team_captain']}'")->fetch(PDO::FETCH_ASSOC);

          ?>
          <tr>
               <td><img width="50" src="admin/uploads/teams/<?=$row['team_logo'];?>"></td>
               <td><?= '['.$row['team_tag'] .'] '. $row['team_name'];?></td>
               <td><?=$u['user_firstname'] .' "'.$u['username'].'" '.$u['user_lastname'];?></td>
               <td><?=$row['team_slogan'];?></td>
               <td><?=$row['team_point'];?></td>
               <td>
                <input type="hidden" id="team_id" value="<?=$row['id']?>">
                <input type="hidden" id="user_id" value="<?=$_SESSION['uid']?>">
               <a href="javascript:void(0)" id="basvurBtn<?=$row['id']?>"><i class="fas fa-sign-in-alt"></i></a></td>
           </tr>




           <script type="text/javascript">
     $("#basvurBtn<?=$row['id']?>").on("click", function(){

                var team_id = <?=$row['id']?>;
                var user_id = $("#user_id").val();

                $.ajax({
                    type : 'POST',
                    url  : 'core/join-team.php',
                    data : {team_id:team_id, user_id:user_id},
                    dataType : 'JSON',
                    success: function(r){
                        toastr[r.t](r.m);
                        if(r.ok){
                            $("#basvuru-modal").modal("hide");
                             setTimeout(function(){
                                 window.location.reload(1);
                                }, 2000);
                        }
                    }
                })
            });
</script>
          <?php
     }
}

        ?>


           
       </tbody>
   </table><?php
}else{
    echo "yetkisiz erişim.";
}
?>

