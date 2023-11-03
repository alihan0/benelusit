<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#T1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Aktif Turnuvalar</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#T2" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Biten Turnuvalar</span>
                                </a>
                            </li>

                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#T3" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Yeni Turnuva</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#T4" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Ödüller</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#T5" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Kurallar</span>
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->


                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content p-3 text-muted">



            <div class="tab-pane" id="T5" role="tabpanel">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kural</th>
                                            <th>Detay</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $db->query("SELECT * FROM tournament_rules", PDO::FETCH_ASSOC);
                                        if ($query->rowCount()) {
                                            foreach ($query as $row) {
                                        ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['rule_name']; ?></td>
                                                    <td><?= $row['rule_desc']; ?></td>
                                                    <td id="<?= $row['id'] ?>">
                                                        <a class="btn btn-info editKural" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger silKural"><i class="fas fa-trash"></i></a>
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
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kural</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="kuralAdi" placeholder="Kural başlığını girin">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                                    <div class="col-md-9">

                                        <textarea required class="form-control" rows="5" placeholder="Kural açıklamasını girin" id="kuralDesc"></textarea>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <button style="float:right" type="submit" class="btn btn-primary w-md " id="kuralEkleBtn">Kaydet</button>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </div>
                </div>
            </div>


            <div class="tab-pane" id="T4" role="tabpanel">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>İkon</th>
                                            <th>Ödül</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $db->query("SELECT * FROM tournament_rewards", PDO::FETCH_ASSOC);
                                        if ($query->rowCount()) {
                                            foreach ($query as $row) {
                                        ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><img width="50" src="uploads/rewards/<?= $row['reward_pic']; ?>"></td>
                                                    <td><?= $row['reward_name']; ?></td>
                                                    <td id="<?= $row['id'] ?>">
                                                        <a class="btn btn-info editOdul" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger silOdul"><i class="fas fa-trash"></i></a>
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
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ödül</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="odulAdi" placeholder="Ödül başlığını girin">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Açıklama</label>
                                    <div class="col-md-9">

                                        <textarea required class="form-control" rows="5" placeholder="Ödül açıklamasını girin" id="odulDesc"></textarea>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kod</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="kod" placeholder="E-pin vb. olarak teslim edilecekse">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="formFile" class="col-sm-3 col-form-label">Resim seç</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="odulUpload" aria-label="Upload">
                                            <button class="btn btn-success" type="button" id="odul_upload_btn" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Yükle</button>
                                        </div>
                                        <input class="form-control" type="hidden" id="odul_icon_path">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <button style="float:right" type="submit" class="btn btn-primary w-md " id="odulEkleBtn">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-pane " id="T2" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Turnuva Adı</th>
                                            <th>Oyun</th>
                                            <th>Harita</th>
                                            <th>Katılım</th>
                                            <th>Mod</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $db->query("SELECT * FROM tournaments WHERE status = 5", PDO::FETCH_ASSOC);
                                        if ($query->rowCount()) {
                                            foreach ($query as $row) {
                                                $o = $db->query("SELECT * FROM games WHERE id = '{$row['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
                                                $m = $db->query("SELECT * FROM game_maps WHERE id = '{$row['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);
                                                $t = $row['tournament_type'];
                                        ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['tournament_name']; ?></td>
                                                    <td><?= $o['game_name']; ?></td>
                                                    <td><?= $m['map_name']; ?></td>

                                                    <td><?= ($row['tournament_match_type'] == 1) ? "Takımca" : "Bireysel"; ?></td>
                                                    <td><?php
                                                        if ($t == 1) {
                                                            echo "Herkes Tek";
                                                        } elseif ($t == 2) {
                                                            echo "1v1";
                                                        } elseif ($t == 3) {
                                                            echo "2v2";
                                                        } elseif ($t == 4) {
                                                            echo "3v3";
                                                        } elseif ($t == 5) {
                                                            echo "4v4";
                                                        } elseif ($t == 6) {
                                                            echo "5v5";
                                                        }
                                                        ?></td>

                                                    <td class="text-center">

                                                        <?php

                                                        $s = $row['status'];

                                                        if ($s == 0) {
                                                            echo '<span class="btn btn-danger">İptal Edildi</span>';
                                                        } elseif ($s == 1) {
                                                            echo '<span class="btn btn-success">Aktif</span>';
                                                        } elseif ($s == 2) {
                                                            echo '<span class="btn btn-warning">Başlatma Bekleniyor</span>';
                                                        } elseif ($s == 3) {
                                                            echo '<span class="btn btn-info">Oynanıyor</span>';
                                                        } elseif ($s == 4) {
                                                            echo '<span class="btn btn-primary">Onay Bekliyor</span>';
                                                        } elseif ($s == 6) {
                                                            echo '<span class="btn btn-secondary">Tamamlandı</span>';
                                                        }
                                                        ?>

                                                    <td>
                                                        <a class="btn btn-info" href="?page=turnuva-detay&id=<?= $row['id']; ?>"><i class="fas fa-search"></i></a>
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


            <div class="tab-pane active" id="T1" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Turnuva Adı</th>
                                            <th>Oyun</th>
                                            <th>Harita</th>
                                            <th>Katılım</th>
                                            <th>Mod</th>
                                            <th>Başlama Tarihi</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $db->query("SELECT * FROM tournaments WHERE NOT status = 5", PDO::FETCH_ASSOC);
                                        if ($query->rowCount()) {
                                            foreach ($query as $row) {
                                                $o = $db->query("SELECT * FROM games WHERE id = '{$row['tournament_game']}'")->fetch(PDO::FETCH_ASSOC);
                                                $m = $db->query("SELECT * FROM game_maps WHERE id = '{$row['tournament_map']}'")->fetch(PDO::FETCH_ASSOC);
                                                $t = $row['tournament_type'];
                                        ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['tournament_name']; ?></td>
                                                    <td><?= $o['game_name']; ?></td>
                                                    <td><?= $m['map_name']; ?></td>

                                                    <td><?= ($row['tournament_match_type'] == 1) ? "Takımca" : "Bireysel"; ?></td>
                                                    <td><?php
                                                        if ($t == 1) {
                                                            echo "Herkes Tek";
                                                        } elseif ($t == 2) {
                                                            echo "1v1";
                                                        } elseif ($t == 3) {
                                                            echo "2v2";
                                                        } elseif ($t == 4) {
                                                            echo "3v3";
                                                        } elseif ($t == 5) {
                                                            echo "4v4";
                                                        } elseif ($t == 6) {
                                                            echo "5v5";
                                                        }
                                                        ?></td>
                                                    <td class="text-center"><?php

                                                                            $s = $row['status'];
                                                                            $r = $row['tournament_start_time'] .  $row['tournament_start_date'];
                                                                            $n = date("Y-m-d");
                                                                            $id = $row['id'];

                                                                            $bugun = time();
                                                                            $gecmis = strtotime($r);
                                                                            $fark = $gecmis -  $bugun;


                                                                            $dakika = $fark / 60;
                                                                            $saniye_farki = floor($fark - (floor($dakika) * 60));

                                                                            $saat = $dakika / 60;
                                                                            $dakika_farki = floor($dakika - (floor($saat) * 60));

                                                                            $gun = $saat / 24;
                                                                            $saat_farki = floor($saat - (floor($gun) * 24));

                                                                            $yil = floor($gun / 365);
                                                                            $gun_farki = floor($gun - (floor($yil) * 365));



                                                                            if (($gun_farki > 1) && ($saat_farki > 2)) {

                                                                                $kalanzaman = $gun_farki . ' Gün ' . $saat_farki . ' Saat Sonra Başlayacak';
                                                                            } else {
                                                                                if ($s == 1) {
                                                                                    $query = $db->prepare("UPDATE tournaments SET
            status = :ss
            WHERE id = :id");
                                                                                    $update = $query->execute(array(
                                                                                        "id" => $id,
                                                                                        "ss" => 2
                                                                                    ));
                                                                                    if ($update) {
                                                                                        header("location:main.php?page=tournaments");
                                                                                    }
                                                                                }

                                                                                $kalanzaman = "Turnuva başlatılmalı";
                                                                            }
                                                                            if (($gun_farki < 1) && ($saat_farki < 2)) {
                                                                                echo $gun_farki;
                                                                            }
                                                                            echo $row['tournament_start_date'];
                                                                            echo '<br>';
                                                                            echo '<sub style="font-size:8px">' . $kalanzaman . '</sub>';



                                                                            ?></td>
                                                    <td class="text-center">

                                                        <?php




                                                        if ($s == 0) {
                                                            echo '<span class="btn btn-danger">İptal Edildi!</span>';
                                                        } elseif ($s == 1) {
                                                            echo "<button class='btn btn-success' id='baslatma_bekleniyor' data-id='" . $row["id"] . "'>Aktif</span>";
                                                        } elseif ($s == 2) {
                                                            echo "<span class='btn btn-dark'>Başlatma Bekleniyor</span>";
                                                        } elseif ($s == 3) {
                                                            echo '<span class="btn btn-info">Oynanıyor</span>';
                                                        } elseif ($s == 4) {
                                                            echo '<span class="btn btn-primary">Onay Bekliyor</span>';
                                                        } elseif ($s == 5) {
                                                            echo '<span class="btn btn-secondary">Tamamlandı</span>';
                                                        }
                                                        ?>

                                                    <td id="<?= $row['id'] ?>">
                                                        <?php
                                                        if ($s == 0) {
                                                            echo '<a class="turnuvasil btn btn-danger" href="javascript:void(0)"><i class="fas fa-trash"></i></a>';
                                                        } else {
                                                            echo '<a class="btn btn-info" href="?page=turnuva-detay&id=' . $row['id'] . '"><i class="fas fa-search"></i></a>';
                                                        }
                                                        ?>

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

            <div class="tab-pane" id="T3" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Seller Details -->
                                <h3>Turnuva Bilgileri</h3>
                                <section>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="turnuva_adi">Turnuva Başlığı</label>
                                                        <input type="text" class="form-control" id="turnuva_adi" placeholder="Turnuva Başlığını Girin">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="turnuva_desc">Detay</label>
                                                            <textarea style="height:350px" id="turnuva_desc" class="form-control" rows="10" placeholder="Turnuva hakkında detayları girin"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Eşleşme Tipi</label>
                                                            <select class="form-select" id="eslesme_tipi">
                                                                <option value="0" selected>Seçin</option>
                                                                <option value="1">Takım</option>
                                                                <option value="2">Bireysel</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Turnuva Tipi</label>
                                                            <select class="form-select" id="turnuva_tipi">
                                                                <option value="0" selected>Seçin</option>
                                                                <option value="HerkesTek">Herkes Tek</option>
                                                                <option value="1v1">1v1</option>
                                                                <option value="2v2">2v2</option>
                                                                <option value="3v3">3v3</option>
                                                                <option value="4v4">4v4</option>
                                                                <option value="5v5">5v5</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="katilimci">Katılımcı Sayısı</label>
                                                            <input type="text" class="form-control" id="katilimci" placeholder="Turnuvaya kaç kişi/takım katılabilir?">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="tur_sayisi">Oynanacak Tur Sayısı</label>
                                                            <input type="text" class="form-control" id="tur_sayisi" placeholder="Turnuva kaç tur oynanacak?">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="kazanan_sayisi">Kazanan Sayısı</label>
                                                            <input type="text" class="form-control" id="kazanan_sayisi" placeholder="Turnuvayı kaç kişi/takım kazanacak?">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="ucret">Turnuva Ücreti</label>
                                                            <input type="text" class="form-control" id="ucret" placeholder="Kişi/Takım başına katılım ücreti">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Company Document -->
                                <h3>Oyun Bilgieri</h3>
                                <section>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Oyun Seçin</label>
                                                    <select class="form-select" id="turnuva_oyun">
                                                        <option value="0" selected>Seçin</option>
                                                        <?php
                                                        $query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
                                                        if ($query->rowCount()) {
                                                            foreach ($query as $row) {
                                                        ?>
                                                                <option value="<?= $row['id']; ?>"> <?= $row['game_name']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Harita Seçin</label>
                                                    <div id="haritasecici"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Bank Details -->
                                <h3>Tarih Bilgileri</h3>
                                <section>
                                    <div>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="reg_date" class="col-md-6 col-form-label">Kayıtların Açılma Tarihi</label>
                                                        <input class="form-control" type="date" id="reg_date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="start_date" class="col-md-6 col-form-label">Turnuva Başlama Tarihi</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input class="form-control" type="date" id="start_date">
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control" type="time" id="start_time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Confirm Details -->
                                <h3>Turnuva Kuralları</h3>
                                <p>Turnuva boyunca uygulanacak kuralları belirleyin. Bu kuralların ihali halinde otomatik olarak belirlenen cezalandırma uygulanacaktır.</p>
                                <section>
                                    <div>
                                        <form>
                                            <div class="row">
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Uygulanacak kurallar</label>
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3">
                                                            <textarea name="kurallar" id="kurallar" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Confirm Details -->
                                <h3>Turnuva Ödülleri</h3>
                                <p>Turnuvanın kazananlara verilecek ödülleri seçin. Bu ödüller turnuva sonrasında, turnuva yönetim panelinden dağıtılacaktır.</p>
                                <section>
                                    <div>
                                        <form>
                                            <div class="row">
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Verilecek Ödüller</label>
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3">
                                                            <textarea name="oduller" id="oduller" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Tamamla</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                </div>
                                                <div>
                                                    <h5>Turnuva Özeti</h5>
                                                    <ul class="message-list" id="ozet"></ul>
                                                </div>
                                                <a class="btn btn-primary" id="turnuva_olustur">Turnuvayı Oluştur</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>


<script src="assets/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $("#kuralEkleBtn").on("click", function() {
        var kuraladi = $("#kuralAdi").val();
        var kuraldesc = $("#kuralDesc").val();

        $.ajax({
            type: 'POST',
            url: 'core/tournaments.php',
            data: {
                "islem": "kuralEkle",
                kuraladi: kuraladi,
                kuraldesc: kuraldesc
            },
            dataType: 'JSON',
            success: function(r) {
                toastr[r.stat](r.message);
                if (r.ok) {
                    setTimeout(function() {
                        window.location.assign("main.php?page=tournaments");
                    }, 1000);
                }
            }
        });
    });
    $("#odulUpload").on("change", function() {
        $("#odul_upload_btn").show();
    });

    $("#odul_upload_btn").on("click", function() {
        var file_data = $('#odulUpload').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);

        $.ajax({
            url: 'core/upload-odul_icon.php', // <-- point to server-side PHP script 
            dataType: 'JSON', // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(r) {
                toastr[r.toast](r.text);
                $("#odul_icon_path").val(r.filename);
            }
        });
    });
    $("#odulEkleBtn").on("click", function() {
        var odulname = $("#odulAdi").val();
        var oduldesc = $("#odulDesc").val();
        var kod = $("#kod").val();
        var pic = $("#odul_icon_path").val();

        $.ajax({
            type: 'POST',
            url: 'core/tournaments.php',
            data: {
                "islem": "odulEkle",
                odulname: odulname,
                oduldesc: oduldesc,
                kod: kod,
                pic: pic
            },
            dataType: 'JSON',
            success: function(r) {
                toastr[r.stat](r.message);
                if (r.ok) {
                    setTimeout(function() {
                        window.location.assign("main.php?page=tournaments");
                    }, 1000);
                }
            }
        });
    });
    $("#turnuva_oyun").on("change", function() {

        var map = $(this).val();

        $.ajax({
            type: 'GET',
            url: 'core/map.php',
            data: {
                map: map
            },
            dataType: 'JSON',
            success: function(r) {

            }
        });

        $("#haritasecici").load("core/map.php?map=" + map);
    });

    $(function() {
        $('#turnuva_kurallari').change(function(e) {
            var selected = $(e.target).val();
            $("#kurallar").val(selected);
        });
    });
    $(function() {
        $('#turnuva_odulleri').change(function(e) {
            var selected = $(e.target).val();
            $("#oduller").val(selected);
        });
    });


    $("#turnuva_adi").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Turnuva Adı:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });
    $("#eslesme_tipi").on("change", function() {
        var tip = $(this).val();
        if (tip == 1) {
            var t = "Takımla";
        } else {
            var t = "Bireysel";
        }
        $("#ozet").append('<li><div class="col-mail col-mail-0">Katılım Tipi:</div><div class="col-mail col-mail-2 text-danger">' + t + '</div></li>');
    });

    $("#turnuva_tipi").on("change", function() {
        var tip = $(this).val();
        if (tip == 1) {
            var t = "Herkes Tek";
        } else if (tip == 2) {
            var t = "1v1";
        } else if (tip == 3) {
            var t = "2v2";
        } else if (tip == 4) {
            var t = "3v3";
        } else if (tip == 5) {
            var t = "4v4";
        } else if (tip == 6) {
            var t = "5v5";
        }
        $("#ozet").append('<li><div class="col-mail col-mail-0">Eşleşme Tipi:</div><div class="col-mail col-mail-2 text-danger">' + t + '</div></li>');
    });
    $("#katilimci").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Katılımcı Sayısı:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });
    $("#tur_sayisi").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Oynanacak Tur Sayısı:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });
    $("#kazanan_sayisi").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Kazanan Sayısı:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });
    $("#ucret").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Katılım Ücreti:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });

    $("#reg_date").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Kayıt Tarihi:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });
    $("#start_date").on("change", function() {
        $("#ozet").append('<li><div class="col-mail col-mail-0">Başlama Tarihi:</div><div class="col-mail col-mail-2 text-danger">' + $(this).val() + '</div></li>');
    });


    $("#turnuva_olustur").on("click", function() {
        var turnuva_adi = $("#turnuva_adi").val();
        var turnuva_desc = $("#turnuva_desc").val();
        var eslesme_tipi = $("#eslesme_tipi").val();
        var turnuva_tipi = $("#turnuva_tipi").val();
        var katilimci = $("#katilimci").val();
        var tur_sayisi = $("#tur_sayisi").val();
        var kazanan_sayisi = $("#kazanan_sayisi").val();
        var ucret = $("#ucret").val();
        var turnuva_oyun = $("#turnuva_oyun").val();
        var turnuva_harita = $("#turnuva_harita").val();
        var reg_date = $("#reg_date").val();
        var start_date = $("#start_date").val();
        var start_time = $("#start_time").val();
        var kurallar = $("#kurallar").val();
        var oduller = $("#oduller").val();


        $.ajax({
            type: 'POST',
            url: 'core/tournaments.php',
            data: {
                islem: "turnuva-ekle",
                turnuva_adi: turnuva_adi,
                turnuva_desc: turnuva_desc,
                eslesme_tipi: eslesme_tipi,
                turnuva_tipi: turnuva_tipi,
                katilimci: katilimci,
                tur_sayisi: tur_sayisi,
                kazanan_sayisi: kazanan_sayisi,
                ucret: ucret,
                turnuva_oyun: turnuva_oyun,
                turnuva_harita: turnuva_harita,
                reg_date: reg_date,
                start_date: start_date,
                start_time: start_time,
                kurallar: kurallar,
                oduller: oduller
            },
            dataType: 'JSON',
            success: function(r) {
                toastr[r.stat](r.message);
                if (r.ok) {
                    setTimeout(function() {
                        window.location.assign("main.php?page=tournaments");
                    }, 1000);
                }
            }
        });
    });
    $(".silKural").on("click", function() {
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type: 'POST',
            url: 'core/sil.php',
            data: {
                "sec": "kural",
                id: id
            },
            dataType: 'JSON',
            success: function(r) {
                toastr[r.stat](r.message);
                if (r.ok) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            }

        })
    });
    $(".editKural").on("click", function() {
        let id = $(this).parent("td").attr("id");

        swal.fire({
            title: "Kural Adını Düzenle",
            input: "text",
            inputPlaceholder: "Yeni kural adı",
            confirmButtonText: "Güncelle",

            preConfirm: function(n) {

                $.ajax({
                    type: 'POST',
                    url: 'core/edit.php',
                    data: {
                        "sec": "kural",
                        id: id,
                        n: n
                    },
                    dataType: 'JSON',
                    success: function(r) {
                        toastr[r.stat](r.message);
                        if (r.ok) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })


            }
        })
    });
    $(".silOdul").on("click", function() {
        let id = $(this).parent("td").attr("id");

        $.ajax({
            type: 'POST',
            url: 'core/sil.php',
            data: {
                "sec": "odul",
                id: id
            },
            dataType: 'JSON',
            success: function(r) {
                toastr[r.stat](r.message);
                if (r.ok) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            }

        })
    });

    $(".editOdul").on("click", function() {
        let id = $(this).parent("td").attr("id");

        swal.fire({
            title: "Ödül Adını Düzenle",
            input: "text",
            inputPlaceholder: "Yeni ödül adı",
            confirmButtonText: "Güncelle",

            preConfirm: function(n) {

                $.ajax({
                    type: 'POST',
                    url: 'core/edit.php',
                    data: {
                        "sec": "odul",
                        id: id,
                        n: n
                    },
                    dataType: 'JSON',
                    success: function(r) {
                        toastr[r.stat](r.message);
                        if (r.ok) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })


            }
        })
    });
    $(".turnuvasil").on("click", function() {
        let id = $(this).parent("td").attr("id");

        swal.fire({
            title: "İşlemi Onayla",
            text: "Turnuvayı silme işlemi geri alınamaz. Silmek istiyor musunuz?",
            confirmButtonText: "Sil",

            preConfirm: function(n) {

                $.ajax({
                    type: 'POST',
                    url: 'core/tournaments.php',
                    data: {
                        "islem": "sil",
                        id: id,
                        n: n
                    },
                    dataType: 'JSON',
                    success: function(r) {
                        location.reload();
                    }
                })
            }
        })
    });

    $("#baslatma_bekleniyor").on("click", function() {
        var tournament_id = $(this).attr("data-id");
        const islem = $(this).attr("id")
        $.ajax({
            type: 'POST',
            url: 'core/tournaments.php',
            data: {
                islem: islem,
                tournament_id: tournament_id,
            },
            dataType: 'JSON',
            success: function(r) {
                location.reload();
            }
        })
    });
</script>