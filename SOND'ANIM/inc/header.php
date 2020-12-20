<head>
<body>
    <header>
        <h1>Sond'Anim</h1>
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
        session_destroy();
        header('location:index.php?page=home');
        }
        ?>
        <nav>
            <ul>
                <a href="../public/index.php?page=home"><li>Accueil</li></a>
                <a href="../public/index.php?page=sondageTheme"><li>Sondage</li></a>
                <a href="../public/index.php?page=classement"><li>Classement</li></a>

                <!-- Si l'internaute est connecté, on affiche ce menu  -->
                <?php if($_SESSION['connect'] == true) { ?>
                    <a href="../public/index.php?page=resultat"><li>Résultat</li></a>
                    <a href="../public/index.php?page=newSondage"><li>Créer un sondage</li></a>
                    <a href="../public/index.php?page=profil"><li>Profil</li></a>
                    <a href="index.php?page=home&action=deconnexion">Deconnexion</a>
                
                <!-- Sinon si il n'est pas connecté on affiche ce menu -->
                <?php }else{ ?>
                    <a href="../public/index.php?page=connexion"><li>Connexion</li></a>
                    <a href="../public/index.php?page=inscription"><li>Inscription</li></a>
                <?php } ?>
            </ul>
        </nav>
</header>