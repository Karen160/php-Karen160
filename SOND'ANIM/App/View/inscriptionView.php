<!-- Boostrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php include('../inc/head.php');; ?>
<title>Inscription</title>
<meta name="description" content="Inscrivez vous">
<?php include('../inc/header.php'); ?>
<main>
<section class="col-sm-5 position-static" id="inscription" style="margin: auto">
            <div class="card ">
                <div class="card-body" style="background-color: #1B6173">
                    <h2 class="card-title">Inscription</h2>
                    <form class="row " method="post">
                        <div class="col-sm-6">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom"
                                required="required" data-error="Le nom est requis.">
                        </div>
                        <div class="col-sm-6 position-static">
                            <label for="prenom ">Prénom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom"
                                required="required" data-error="Le prénom est requis.">
                        </div>
                        <div class="col-sm-12 mt-4 position-static">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" placeholder="Choisissez un pseudo"
                                required="required" data-error="Le pseudo est requis.">
                        </div>
                        <div class="col-sm-12 mt-4 position-static">
                            <label for="image">Image</label>
                            <input type="text" name="image" class="form-control" placeholder="Choisissez une image"
                                required="required" data-error="L'image est requise.">
                        </div>
                        <div class="col-sm-12 mt-4 position-static">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Entrez votre email"
                                required="required" data-error="Le mail est requis.">
                        </div>
                        <div class="col-sm-12 mt-4 position-static">
                            <label for="mdp">Password</label>
                            <input type="password" name="mdp" class="form-control"
                                placeholder="Entrez votre mot de passe" required="required"
                                data-error="Le mot de passe est requis.">
                        </div>
                        <div class="col-sm-12 mt-4 position-static offset-ms-4">
                            <button type="submit" class="btn btn-info btn-block" name="bouton">Envoyez</button>
                        </div>
                        <?php echo $msg;?>
                    </form>
                </div>
            </div>
        </section>
</main>
<?php include('../inc/footer.php') ?>