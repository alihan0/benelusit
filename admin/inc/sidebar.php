<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="index.php" class=" waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span class="badge rounded-pill bg-info float-end">04</span>
                                    <span key="t-dashboards">Anasayfa</span>
                                </a>
                            </li>

                            <li>
                                <a href="main.php?page=notifications" class="waves-effect">
                                    <i class="fas fa-bell"></i>
                                    <span class="badge rounded-pill bg-info float-end">04</span>
                                    <span key="t-dashboards">Bildirimler</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="main.php?page=orders" class="waves-effect">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="badge rounded-pill bg-info float-end">04</span>
                                    <span key="t-dashboards">Siparişler</span>
                                </a>
                            </li>

                            <li class="menu-title" key="t-apps">Yönetim</li>

                

                            <li class="<?php if($_GET['page'] == "games"){echo "active";}?>">
                                <a href="main.php?page=games" class="<?php if($_GET['page'] == "games"){echo "active";}?> waves-effect">
                                    <i class="fas fa-gamepad"></i>
                                    <span key="t-dashboards">Oyunlar</span>
                                </a>
                            </li>


                             <li>
                                <a href="main.php?page=users" class="waves-effect">
                                    <i class="fas fa-users"></i>
                                    
                                    <span key="t-dashboards">Kullanıcılar</span>
                                </a>
                            </li>


                             <li>
                                <a href="main.php?page=tournaments" class="waves-effect">
                                    <i class="fas fa-trophy"></i>
                                    
                                    <span key="t-dashboards">Turnuvalar</span>
                                </a>
                            </li>

                             <li>
                                <a href="main.php?page=shop" class="waves-effect">
                                    <i class="fas fa-store"></i>
                                    <span key="t-dashboards">Mağaza</span>
                                </a>
                            </li>
                            <li>
                                <a href="main.php?page=admins" class="waves-effect">
                                    <i class="fas fa-user-secret"></i>
                                    
                                    <span key="t-dashboards">Yöneticiler</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="main.php?page=blog" class="waves-effect">
                                    <i class="fas fa-align-center"></i>
                                    
                                    <span key="t-dashboards">Blog</span>
                                </a>
                            </li>

                            <li class="menu-title" key="t-pages">Ayarlar</li>

                            
                            <li>
                                <a href="main.php?page=settings" class="waves-effect">
                                    <i class="fas fa-cog"></i>
                                    <span key="t-dashboards">Site Ayarları</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>