<?php
include '../config.php';
$turnuvaid = $_POST['turnuva'];
$query = $db->query("SELECT * FROM tournaments WHERE id = '" . $turnuvaid . "'")->fetch(PDO::FETCH_ASSOC);
$tournament_winner_number = $query['tournament_winner_number'];

$katilimci = $query['tournament_participants']; //9
$tt = $query['tournament_tour'];
$tct = $query['current_tour'];

$qryT = $db->prepare("SELECT * FROM tournament_tours WHERE tournament_id = '" . $turnuvaid . "' AND tournament_current_tour = '" . $tct . "'");
$qryT->execute();
$güncel_katilimci_sayisi = $qryT->rowCount();

$secim = $güncel_katilimci_sayisi / $tt;
?>

<div class="modal-header">
    <h5 class="modal-title">Turu Tamamla<br><sup>
            <em>Tunuva ID: #<?= $turnuvaid ?></em></sup></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-6">
            <h5>Karşılaşamanın Galibi</h5>
        </div>
        <form id="form_winner">
            <div class="col-6">
                <?php
                if ($tt === $tct) {
                    for ($x = 0; $x < $tournament_winner_number; $x++) { ?>
                        <select class="form-select" id="winner" name="winner">
                            <?php
                            $qry = $db->prepare("SELECT tt.user_id,u.username FROM tournament_tours tt
                            INNER JOIN users u  ON tt.user_id = u.id
                            WHERE tournament_id = '" . $turnuvaid . "' AND tournament_current_tour = '" . $tt . "'");
                            $qry->execute();
                            $qryData = $qry->fetchAll();
                            foreach ($qryData as $row) {
                            ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
                            <?php }
                            ?>
                        </select>
                    <?php }
                } else if ($tt === "4") {
                    $tt = $tt / 2;
                    $secim = $güncel_katilimci_sayisi / $tt;
                    for ($x = 0; $x < $secim; $x++) { ?>
                        <select class="form-select" id="winner" name="winner">
                            <?php
                            $qry = $db->prepare("SELECT tt.user_id,u.username FROM tournament_tours tt
                            INNER JOIN users u  ON tt.user_id = u.id
                            WHERE tournament_id = '" . $turnuvaid . "'");
                            $qry->execute();
                            $qryData = $qry->fetchAll();
                            foreach ($qryData as $row) {
                            ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
                            <?php }
                            ?>
                        </select>
                    <?php }
                } else {
                    for ($x = 0; $x < $secim; $x++) { ?>
                        <select class="form-select" id="winner" name="winner">
                            <?php
                            $qry = $db->prepare("SELECT tt.user_id,u.username FROM tournament_tours tt
                            INNER JOIN users u  ON tt.user_id = u.id
                            WHERE tournament_id = '" . $turnuvaid . "'");
                            $qry->execute();
                            $qryData = $qry->fetchAll();
                            foreach ($qryData as $row) {
                            ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
                            <?php }
                            ?>
                        </select>
                <?php }
                } ?>

            </div>
        </form>
    </div>
    <hr>

    <input type="hidden" id="turnuva_id" value="<?= $turnuvaid ?>">
    <button class="btn btn-success" id="turnuva_bitir">Turu Tamamla</button>
</div>

<script type="text/javascript">
    $("#turnuva_bitir").on("click", function() {
        var winner = $('#form_winner').serialize();
        const turnuva_id = $("#turnuva_id").val();
        $.ajax({
            type: 'POST',
            url: './core/tournaments.php',
            data: {
                islem: "kazanani_belirle",
                winner: winner,
                turnuva_id: turnuva_id,
            },
            dataType: 'JSON',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı.',
                    text: response.message
                });
                if (response) {
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 2000);
                }
            }
        })
    })
</script>