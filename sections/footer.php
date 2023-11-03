<footer>
    <div class="footer-top footer-bg s-footer-bg">
        <!-- newsletter-area -->
        <!-- newsletter-area-end -->
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-6 mt-5">
                    <div class="footer-widget mb-50">
                        <div class="footer-logo mb-35">
                            <a href="#"><img width="250" src="assets/img/logo/benelusit-logo.png" alt=""></a>
                        </div>
                        <div class="footer-text">
                            <p>Türkiye’nin en güvenilir turnuva platformu.</p>
                            <div class="footer-contact">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i> <span>Adres : </span>Türkiye/Ankara</li>                                
                                    <li><i class="fas fa-envelope-open"></i><span>E-posta : </span>info@benelusit.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 mt-5">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>Oyunlar</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <?php
                                $query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
                                if ($query->rowCount()) {
                                    foreach ($query as $row) {
                                ?><li><a href="<?= $row['game_url'] ?>"><?= $row['game_name'] ?></a></li><?php
                                                                                                        }
                                                                                                    }
                                                                                                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 mt-5">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>Kurumsal</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">Hakkımızda</a></li>
                                <li><a href="#">Sık Sorulan Sorular</a></li>
                                <li><a href="#">Kariyer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mt-5">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>Bizi Takip Et</h5>
                        </div>
                        <div class="footer-social">
                            <ul>

                                <li><a href="https://twitter.com/benelusit" target="blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/benelusitgame/?igshid=YmMyMTA2M2Y=" target="blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCwoSLvbk4lFoPDbp8O0snfA/featured" target="blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://discord.com/invite/G9XBWY4P" target="blank"><i class="fab fa-discord"></i></a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-fire"><img src="img/images/footer_fire.png" alt=""></div>
        <div class="footer-fire footer-fire-right"><img src="assets/img/images/footer_fire.png" alt=""></div>
    </div>
    <div class="copyright-wrap s-copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p>Copyright © 2022 - <a href="#">Benelusit</a> | Tüm hakları saklıdır. <br><sup><a href="https://metatige.com" target="_blank">Metatige</a> tarafından sunulmaktadır.<sup></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <div class="payment-method-img text-right">
                        <img src="assets/img/images/card_img.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="//code.tidio.co/p9ian19gfdsz1d4rilxkedvatlby7cae.js" async></script>