<?php include('../inc/head.php'); ?>
<title>Les résultats des sondages</title>
<meta name="description" content="Les résultats des sondages">
<?php include('../inc/header.php'); ?>
<main>
    <!-- Affichage des résultats des sondages  -->
    <section id="mesSond">
        <h2>Résultat global</h2>
        <div class="conteneur">
            <?php foreach( $requete[0] as $sondageResult) : ?>
            <div class="boxsondage">
            <a href="index.php?page=sondage&sondage=<?=$sondageResult->question_id?>">
                        <img src="<?= $sondageResult->image_question ?>" alt="Image de la question <?= $sondageResult->question ?>">
                        <p>
                            <span>
                                Points : <?= $sondageResult->point?> pts
                            </span>
                            <br><br>
                            <?= $sondageResult->question ?>
                            <br>
                            <i class="fas fa-arrow-right"></i>
                        </p>
                    </a>
                <br>
            </div>
            <?php endforeach;?>
        </div>
    </section>

    <!-- Affichage des résultats de mes sondages fini -->
    <section id="mesSond">
        <h2>Les résultat de mes sondages</h2>
        <div class="conteneur">
            <?php foreach( $requete[1] as $sondageResultPerso) : ?>
            <div class="boxsondage">
            <a href="index.php?page=sondage&sondage=<?=$sondageResultPerso->question_id?>">
                        <img src="<?= $sondageResultPerso->image_question ?>" alt="Image de la question <?= $sondageResultPerso->question ?>">
                        <p>
                            <span>
                                Points : <?= $sondageResultPerso->point?> pts
                            </span>
                            <br><br>
                            <?= $sondageResultPerso->question ?>
                            <br>
                            <i class="fas fa-arrow-right"></i>
                        </p>
                    </a>
                <br>
            </div>
            <?php endforeach;?>
        </div>
    </section>
</main>
<?php include('../inc/footer.php'); ?>