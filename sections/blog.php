<section class="blog-area pt-115 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title home-four-title black-title text-center mb-65">
                                <h2>Blog'dan <span>Haberler</span></h2>
                                <p>Benelusit Dünyası'nda neler olup bittiğini biliyor musun? İşte sana güncel kalmanı sağlayacak birkaç önemli haber.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                        <?php

$query = $db->query("SELECT * FROM blog_posts", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          ?>
<div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog-post home-four-blog-post mb-50">
                                <div class="blog-thumb mb-30">
                                    <a href="blog-detail.php?id=<?=$row['id']?>"><img src="admin/uploads/blog/<?=$row['blog_cover']?>" alt=""></a>
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><i class="far fa-user"></i><a href="#">Admin</a></li>
                                            <li><i class="far fa-calendar-alt"></i><?=$row['created_at']?></li>
                                        </ul>
                                    </div>
                                    <h4><a href="blog-detail.php?id=<?=$row['id']?>"><?=$row['blog_title']?></a></h4>
                                    <p><?=substr($row['blog_desc'], 0,100)?></p>
                                    <a href="blog-detail.php?id=<?=$row['id']?>" class="read-more">Devamını Oku<i class="fas fa-caret-right"></i></a>
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