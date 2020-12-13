<?php include('../inc/head.php');; ?>
<title>Sondages My Hero Academia</title>
<meta name="description" content="Les sondages sur My Hero Academia">
<?php include('../inc/header.php'); ?>
    <main>
        <section sond>
            <h2>Sondages Hunter x Hunter</h2>      
            <div class="conteneur">
                <?php foreach($allSondageMHA as $sondage) :?>
                <!-- Affichage des sondages -->
                <div class="boxsondage">
                    <a href="index.php?page=sondage&sondage=<?=$sondage->question_id?>">
                        <img src="<?= $sondage->image_question ?>" alt="Image de la question ' + <?= $sondage->question ?> + '">
                        <p>
                            <span>
                                Point : <?= $sondage->point?>
                                <br>
                                Date de fin : <?= $sondage->date_fin ?>
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