<?php include('../inc/head.php'); ?>
<title>Sond'Anim</title>
<meta name="description" content="Répondez aux différents sondages concernant vos animés préférés et gagnez des points pour devenir premier au classement !">
<?php include('../inc/header.php'); ?>
    <main>
        <section nouvSondage>
            <h2>Les animés de nos sondages</h2>
            <div class="menuSondage">
                <div>
                    <a href="../public/index.php?page=sondageMHA">
                        <img src="../public/Asset/img/MHA/midoryia.gif" alt="Midoryia en mode one for all intégral">
                        <h2>My Hero Academia</h2>
                    </a>
                </div>

                <div>
                    <a href="../public/index.php?page=sondageOP">
                        <img src="../public/Asset/img/onePiece/onepiece.gif" alt="Luffy en mode gear 5">
                        <h2>One Piece</h2>
                    </a>
                </div>

                <div>
                    <a href="../public/index.php?page=sondageDS">
                        <img src="../public/Asset/img/demonSlayer/tanjiro.gif" alt="Tanjiro coupant avec son katana">
                        <h2>Demon Slayer</h2>
                    </a>
                </div>

                <div>
                    <a href="../public/index.php?page=sondageHxH">
                        <img src="../public/Asset/img/HxH/hxh.gif" alt="Killua avec son yoyo">
                        <h2>Hunter x Hunter</h2>
                    </a>
                </div>
            </div>

            <h2>Nouveaux sondages</h2>
            <div class="conteneur">
                <?php foreach($allNewSondage as $sondage) :?>
                <!-- Affichage des sondages -->
                <div class="boxsondage">
                    <a href="index.php?page=sondage&sondage=<?=$sondage->question_id?>">
                        <img src="<?= $sondage->image_question ?>" alt="Image de la question <?= $sondage->question ?> ">
                        <p>
                            <span>
                                Date de fin : <?= $sondage->date_fin ?>
                            </span>
                            <br>
                            <span>
                                Points : <?= $sondage->point?> pts
                            </span>
                            <br><br>
                            <?= $sondage->question ?>
                            <br>
                            <i class="fas fa-arrow-right"></i>
                        </p>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
<?php include('../inc/footer.php') ?>