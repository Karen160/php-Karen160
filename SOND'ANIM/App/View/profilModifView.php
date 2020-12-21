<?php include('../inc/head.php'); ?>
<title>Modifer profil</title>
<meta name="description" content="Modifer votre profil">
<?php include('../inc/header.php'); ?>
<main id="profil">
    <section>
        <!-- Formulaire de modification du profil -->
        <form method="post">
            <!-- Récupération des infos dans la bdd -->
            <?php 
            foreach($user_infos[0] as $userdata):
            foreach($user_infos[1] as $frienddata):
            foreach($user_infos[2] as $sondagedata):
            ?>
            <label for="image">Image du profil :</label>
            <input type="text" name="image" class="form-control" value="<?= $userdata->image?>">
            <div class="info">


                <div>
                    <label for="nom">Nom :</label>
                    <!-- Met dans la valeur des boutons les informations actuelles du profil -->
                    <input type="text" name="nom" class="form-control" value="<?= $userdata->nom ?>">

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" class="form-control" value="<?= $userdata->prenom?>">

                    <label for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" class="form-control" value="<?= $userdata->pseudo?>">

                    <label for="Nmdp">Nouveau Mot de passe :</label>
                    <input type="password" name="Nmdp" class="form-control">
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control" value="<?= $userdata->email ?>">
                    <p style="margin-top: 10% ">Nombre d'amis : <?= $frienddata->nb_ami ?></p>
                    <p>Nombre de mes sondages : <?= $sondagedata->nb_sond ?></p>
                    <p style="margin-top: 6%;">Date d'inscription : <?= $userdata->date_membre ?></p>
                    <label style="margin-top: 1%;" for="mdp">Mdp actuel :</label>
                    <input type="password" name="mdp" class="form-control" placeholder="veuillez remplir le champ"
                        required>
                </div>

            </div>
            <input type="submit" class="btn btn-info btn-block active" value="Envoyez" name="bouton">
            <?php 
            
        endforeach;
        endforeach;
        endforeach; 
        
            if($message[0] == true){
                echo $message[1];
            }
            ?>
        </form>
    </section>
</main>
<?php include('../inc/footer.php'); ?>