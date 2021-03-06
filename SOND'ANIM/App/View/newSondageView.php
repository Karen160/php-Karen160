<?php include('../inc/head.php'); ?>
<title>Sond'Anim</title>
<meta name="description"
    content="Répondez aux différents sondages concernant vos animés préférés et gagnez des points pour devenir premier au classement !">
<?php include('../inc/header.php'); ?>
<main>
    <!-- Formulaire de création d'un nouveau sondage -->
    <section class="col-sm-7 mx-auto" id="newSondage">
        <div class="card position-static">
            <form class="card-body" method="post" style="background-color: #1B6173">
                <h2 class="card-title">Créer un sondage</h2>
                <div class="  col-sm-12 mt-3">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" placeholder="Entrez votre question"
                        required="required" data-error="La question est requise.">
                </div>
                <div class="  col-sm-12 mt-3">
                    <label for="image">Lien de l'image</label>
                    <input type="text" name="image" class="form-control" placeholder="Entrez le lien de votre image"
                        required="required" data-error="L'image est requise.">
                </div>
                <div class="col-sm-12 mt-3">
                    <label for="categorie">Catégorie du sondage</label>
                    <select id="categorie" type="text" name="categorie" class="form-control"
                        placeholder="Catégorie de votre sondage" required="required"
                        data-error="La catégorie du sondage est requis">
                        <option value="" selected>Selectionnez un nombre</option>
                        <option value="1">My Hero Academia</option>
                        <option value="2">One Piece</option>
                        <option value="3">Demon Slayer</option>
                        <option value="4">Hunter x Hunter</option>
                    </select>
                </div>
                <!-- Choix des nombres des réponses proposées dans le sondage  -->
                <div class="  col-sm-12 mt-3">
                    <label for="reponseNb ">Nombre de réponse</label>
                    <select id="reponseNb" type="text" name="nbquestion" class="form-control"
                        placeholder="Nombre de vos proposition de réponse" required="required"
                        data-error="Le nombre de réponse est requis.">
                        <option value="" selected>Selectionnez un nombre</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <!-- Apparition des champs pour remplir les propositions de réponses lors du choix du nombre de celles-ci (voir main.js) -->
                <div id="proposition" required="required">
                </div>
                <div class="col-sm-12 mt-3">
                    <label for="date">Date d'expiration</label>
                    <input type="datetime-local" name="date" class="form-control"
                        placeholder="Choisissez la date d'expiration" required="required"
                        data-error="La date d'expiration est requise.">
                </div>
                <div class="  col-sm-12 mt-3">
                    <label for="point">Les points du sondage</label>
                    <input type="text" name="point" class="form-control" placeholder="Entrez les points"
                        required="required" data-error="Les points sont requis.">
                </div>
                <div class="  col-sm-12 mt-4 offset-ms-4">
                    <button name="boutton" id="boutonPropo" type="submit"
                        class="btn btn-info btn-block">Envoyez</button>
                </div>
            </form>
        </div>
        <?php echo $msg; ?>
    </section>
</main>
<?php include('../inc/footer.php') ?>