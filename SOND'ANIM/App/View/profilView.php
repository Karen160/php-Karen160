<?php include('../inc/head.php'); ?>
<title>Votre profil</title>
<meta name="description" content="Votre profil">
<?php include('../inc/header.php'); ?>
<main id="profil">

    <!-- Bouton de modification du profil -->
    <button onclick="window.location.href = 'index.php?page=profilModif'" class="btn btn-info active"
        style="float:right; margin-right:40px">Modifier mon profil</button>
    <br><br><br>

    <!-- Bouton de la page d'ami -->
    <button onclick="window.location.href = 'index.php?page=friend'" class="btn btn-info active"
        style="float:right; margin-right:70px">Mes amis</button>

    <!-- Information du profil -->
    <section>
        <?php 
            foreach($user_infos[0] as $userdata):
            foreach($user_infos[1] as $frienddata):
            foreach($user_infos[2] as $sondagedata):
            ?>
        <img src="<?= $userdata->image ?>" alt="Image du profil">
        <div class="info">
            <!-- Récupérations des infos dans la bdd -->

            <div>
                <p>Nom : <?= $userdata->nom  ?></p>
                <p>Prénom : <?= $userdata->prenom  ?></p>
                <p>Pseudo : <?= $userdata->pseudo  ?></p>
                <p>Mot de passe : *******</p>
            </div>
            <div>
                <p>Nombre d'amis : <?= $frienddata->nb_ami  ?></p>
                <p>Nombre de mes sondages : <?= $sondagedata->nb_sond ?></p>
                <p>Email : <?= $userdata->email  ?></p>
                <p>Date d'inscription : <?= $userdata->date_membre  ?></p>
            </div>

        </div>
        <?php
            endforeach;
            endforeach;
            endforeach;
            ?>
    </section>
    
    <!-- Bouton de suppression du compte -->
    <form method="POST">
        <button type="submit" class="btn btn-info active" name="delete" style="float:right; margin-right:20px">Supprimer
            Mon Compte</button>
    </form>
    <br><br><br>
    
    <!-- Affichage des sondages du membre -->
    <h2>Mes sondages</h2>
    <div class="conteneur">
        <?php foreach( $allSondage as $sondagePerso) : ?>
        <div class="boxsondage">
            <a href="index.php?page=sondage&sondage=<?=$sondagePerso->question_id?>">
                <img src="<?= $sondagePerso->image_question ?>"
                    alt="Image de la question <?= $sondagePerso->question ?> ">
                <p>
                    <span>
                        Date de fin : <?= $sondagePerso->date_fin ?>
                    </span>
                    <br>
                    <span>
                        Points : <?= $sondagePerso->point?> pts
                    </span>
                    <br><br>
                    <?= $sondagePerso->question ?>
                    <br>
                    <i class="fas fa-arrow-right"></i>
                </p>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</main>
<?php include('../inc/footer.php'); ?>