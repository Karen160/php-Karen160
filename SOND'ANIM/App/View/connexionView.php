<!-- Boostrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php include('../inc/head.php');; ?>
<title>Connexion</title>
<meta name="description" content="Connexion">
<?php include('../inc/header.php'); ?>
<main>
        <!-- Formulaire de connexion -->
        <section class="col-sm-5 mx-auto mt-5 position-static">
            <div class="card ">
                <div class="card-body  position-static " id="connexion" style="background-color: #1B6173;">
                    <h2 class="card-title ">Connexion</h2>
                    <form class="row" method="post">
                        <div class="col-sm-12">
                            <label for="pseudoCo">Pseudo</label>
                            <input type="text" name="pseudoCo" class="form-control" placeholder="Entrez votre pseudo"
                                required="required" data-error="Le Pseudo est requis.">
                        </div>
                        <div class="col-sm-12 mt-4">
                            <label for="mdpCo">Password</label>
                            <input type="password" name="mdpCo" class="form-control"
                                placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="col-sm-12 mt-4 offset-ms-4">
                            <button type="submit" class="btn btn-info btn-block">Envoyez</button>
                            <?php echo $msgCo; ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</main>
<?php include('../inc/footer.php') ?>