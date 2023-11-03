<input type="hidden" id="sess" value="<?=session_id()?>" >
<section class="shop-area home-four-shop-area pt-115 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title home-four-title text-center mb-35">
                                <h2>Dijital <span>mağaza</span></h2>
                                <p>Hey Oyuncu, aradığın herşeyi bu mağazada kolaylıkla bulabilirsin. Oyun deneyimini artıracak donanımları ya da keyfini sürebileceğin dekoratif eşyaları Benelusit Mağazası'nda kolayca satın alabilirsin.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active">
                        <?php 

$query = $db->query("SELECT * FROM shop_product", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
$query = $db->query("SELECT * FROM shop_categories WHERE id = '{$row['p_cat']}'")->fetch(PDO::FETCH_ASSOC);



          ?><div class="col-3">
                            <div class="shop-item">
                                <div class="product-thumb">
                                    <a href="#"><img width="295" height="258" src="admin/uploads/products/<?=$row['p_pic']?>" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <div class="product-tag"><a href="#"><?=$query['cat_name']?></a></div>
                                    <h4><a href="#"><?=$row['p_name']?></a></h4>
                                    <div class="product-meta">
                                        <div class="product-price">
                                            <h5><?=$row['p_price']?><img src="assets/img/gem.png" style="width:25px;"></h5>
                                        </div>
                                        <div class="product-cart-action" id="<?=$row['id']?>">
                                            <a href="javascript:void(0)" class="addBasket"><i class="fas fa-shopping-basket"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

        }
     }

                        ?>
                        
                        
                        
                        
                        
                    </div>
                </div>
            </section>



            <script type="text/javascript">
               $(".addBasket").on("click", function(){
                let urun = $(this).parent("div").attr("id");
                let sessid = $("#sess").val();

                 $.ajax({
                    type : 'POST',
                    url  : 'core/addBasket.php',
                    data : {urun:urun, sessid:sessid},
                    dataType: 'JSON',
                    success: function(r){
                        toastr[r.t](r.m);
                    }
                 })
               })
            </script>