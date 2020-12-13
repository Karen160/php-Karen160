<?php include('../inc/head.php');; ?>
<title>Connexion</title>
<meta name="description" content="Connexion">
<?php include('../inc/header.php'); ?>
<main>
        <!-- Formulaire de connexion -->
        <section class="col-sm-5 mx-auto mt-5 position-static">
            <div class="card ">
                <div class="card-body  position-static " id="connexion">
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
                            <button type="submit" class="btn btn-info btn-block active">Envoyez</button>
                            <?php echo $msgCo; ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</main>
<?php include('../inc/footer.php') ?>