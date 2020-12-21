<?php include('../inc/head.php');; ?>
<title>Classement</title>
<meta name="description" content="Regardez quel place vous occupez dans le classement">
<?php include('../inc/header.php'); ?>
<main>
    <main>
        <section classement>
            <img class="fond" src="Asset/img/logo/sondanime.png" alt="Midoryia, Luffy, Tanjiro et Killua">
            <h2 class="fondDev">Le classement</h2>
            <h4 class="fondDev">Regardez votre place dans le classement grâce à vos points gagnés ! <br> Qui sera le
                meilleur parieur d'animé ?</h4>

            <table>
                <tr class="titre">
                    <td>Rang</td>
                    <td>Pseudo</td>
                    <td>Points</td>
                </tr>
                <!-- Afficher le classement -->
                <?php 
                $n = 1;                
                foreach($membre as $mem): ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $mem->pseudo ?></td>
                    <td><?= $mem->point ?></td>
                </tr>
                <?php               
                endforeach ?>
            </table>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>