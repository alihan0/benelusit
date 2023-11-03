<?php 
session_start();
$sess = session_id();
include '../config.php';

?>
<ul class="minicart">

    <?php

    $Fiyat=$db->prepare("SELECT SUM(price) AS takma_ad FROM shop_basket WHERE sessid = '{$sess}'");
$Fiyat->execute();
$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);



$query = $db->query("SELECT * FROM shop_basket WHERE sessid = '{$sess}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
        $u = $db->query("SELECT * FROM shop_product WHERE id = '{$row['urun_id']}'")->fetch(PDO::FETCH_ASSOC);

          ?>
          <li class="d-flex align-items-start">
        <div class="cart-img">
            <a href="#">
                <img src="admin/uploads/products/<?=$u['p_pic']?>" alt="">
            </a>
        </div>
        <div class="cart-content">
            <h4>
                <a href="#"><?=$u['p_name']?></a>
            </h4>
            <div class="cart-price">
                <span class="new"><?=$u['p_price']?></span>
                <span>
                    <img src="assets/img/gem.png" style="width:25px;float:right">
                </span>
            </div>
        </div>
        <div class="del-icon" id="<?=$row['id']?>">
            <a href="#" class="delItem">
                <i class="far fa-trash-alt"></i>
            </a>
        </div>
    </li>
          <?php
     }
}
    ?>
    
    <li>
        <div class="total-price">
            <span class="f-left">Total:</span>
            <span class="f-right"><?=$FiyatYaz['takma_ad']?> <img src="assets/img/gem.png" style="width:25px;float:right"></span>
        </div>
    </li>
    <li>
        <div class="checkout-link">
            <a href="kasa.php">KASAYA GİT</a>
        </div>
    </li>
</ul>

<script type="text/javascript">
    $(".delItem").on("click", function(){
        let urun = $(this).parent("div").attr("id");
      

        $.ajax({
            type : 'POST',
            url :  'core/removeBasket.php',
            data : {urun:urun},
            success: function (r) {
                console.log(r);
            }
        })
    })
</script>