
<?php
include '../config.php';



$map = $_GET['map'];
?>
<select class="form-select" id="turnuva_harita">
                                       
                  <?php

$query = $db->query("SELECT * FROM game_maps WHERE game_id = '{$map}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $val = $row['id'];
        $str = $row['map_name'];
        ?> <option value="<?=$val?>"><?=$str?></option><?php
     }
}
?>
 </select>          
       

                         
