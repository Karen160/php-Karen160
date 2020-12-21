<?php include('../inc/head.php'); ?>
<title>Les sondages</title>
<meta name="description"
    content="Répondez aux différents sondages concernant vos animés préférés proposez ici ! Les sondages de Demon Slayer, Hunter x Hunter, My hero academia et One piece vont vous plaire !">
<?php include('../inc/header.php'); ?>

<main>
    <!-- Affichage des différents types de sondage -->
    <section sondageTheme>
        <h2>Catégories des sondages</h2>
        <div class="menuSondage">
            <div>
                <a href="../public/index.php?page=sondageMHA">
                    <img src="../public/Asset/img/MHA/midoryia.gif" alt="Regard de Midoryia">
                    <h2>My hero academia</h2>
                </a>
            </div>

            <div>
                <a href="../public/index.php?page=sondageOP">
                    <img src="../public/Asset/img/onePiece/regard.gif" alt="Regard de Luffy">
                    <h2>One Piece</h2>
                </a>
            </div>

            <div>
                <a href="../public/index.php?page=sondageDS">
                    <img src="../public/Asset/img/demonSlayer/regard.gif" alt="Regard de Tanjiro">
                    <h2>Demon Slayer</h2>
                </a>
            </div>

            <div>
                <a href="../public/index.php?page=sondageHxH">
                    <img src="../public/Asset/img/HxH/regard.gif" alt="Regard de Killua">
                    <h2>Hunter x Hunter</h2>
                </a>
            </div>
        </div>
    </section>
</main>
<?php include('../inc/footer.php') ?>