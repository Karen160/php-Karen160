<?php include('inc/head.php'); ?>
    <title>Tanjiro un futur démon ?</title>
    <meta name="description" content="Répondez à ce sondage pour gagner des points">
<head>
<body>
    <header>
        <h1>Sond'Anim</h1>
        <?php include('inc/nav.php'); ?>
    </header>
    <main>
        <section demonTanjiro>
            <img class="fond" src="img/demonSlayer/clan.gif" alt="Les pourfendeurs de démon en train de courir">
            <h2 class="fondDev">Sondage Demon Slayer</h2>
            <h4 class="fondDev">Répondez correctement à ce sondage et gagnez des points pour augmenter votre score !</h4>
                
            <form>
                <h3>Est-ce que Tanjiro va devenir un démon ? <span>10 points</span></h3><br><br>
                <label>Choix de réponses possibles :</label><br><br>
                <p>
                    <input type="radio" name="reponse" value="oui"> Oui, il va forcement devenir un démon <br><br><br>
                    <input type="radio" name="reponse" value="non"> Non, c'est impossible qu'il devienne un démon         

                </p>
                <input type="submit" name="bouton" value="Envoyer">
            </form>
        </section>
        
        <section sondSim>
            <h2>Sondages similaires</h2>
            
            <div class="conteneur">
                    <div class="boxsondage">
                        <a href="#">
                            <img src="img/demonSlayer/demonNezuko.png" alt="Demon Tanjiro">
                            <p>
                                <span>15 points</span>
                                <br><br>
                                Nezuko va-t-elle perdre le contrôle et manger des humains ? 
                                <br>
                                <i class="fas fa-arrow-right"></i>
                            </p>
                        </a>
                    </div>
                    <div class="boxsondage">
                        <a href="#">
                            <img src="img/demonSlayer/combat.png" alt="Combat entre Tanjiro et Inosuke">
                            <p>
                                <span>10 points</span>
                                <br><br>
                                Est-ce que Tanjiro va se battre contre ses coéquipiers ?
                                <br>
                                <i class="fas fa-arrow-right"></i>
                            </p>
                        </a>
                    </div>
                    <div class="boxsondage">
                        <a href="#">
                            <img src="img/demonSlayer/couple.png" alt="Zenitsu et Nezuko">
                            <p>
                                <span>10 points</span>
                                <br><br>
                                Est-ce que Zenitsu et Nezuko vont sortir ensemble ? 
                                <br>
                                <i class="fas fa-arrow-right"></i>
                            </p>
                        </a>
                    </div>
            </section>
        </main>
    <footer>
        <p>Site web crée par Karen Azoulay dans le cadre d'un projet scolaire</p>
        <br>
        <div>
            <img src="img/logo/iim.png" alt="Logo IIM">
            <img src="img/logo/pole.png" alt="Logo Pole léonard de vinci">
        </div> 
    </footer>
</body>
</html>