<?php include('../inc/head.php');; ?>
<title>Sondages Demon Slayer</title>
<meta name="description" content="Les sondages sur Demon Slayer">
<?php include('../inc/header.php'); ?>
    <main>
        <section sond>
            <h2>Sondages Demon Slayer</h2>      
            <div class="conteneur">
                <?php foreach($allSondageDS as $sondage) :?>
                <!-- Affichage des sondages -->
                <div class="boxsondage">
                    <a href="index.php?page=sondage&sondage=<?=$sondage->question_id?>">
                        <img src="<?= $sondage->image_question ?>" alt="Image de la question ' + <?= $sondage->question ?> + '">
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