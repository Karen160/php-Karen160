<?php include('../inc/head.php');; ?>
<title>Sondage</title>
<meta name="description" content="Le sondage">
<?php include('../inc/header.php');

//Convertir la date au bon format et nous sert a recuperer le type du mois restant 
function Date_Convert($date) {
    $jour = substr($date, 8, 2);
    $mois = substr($date, 5, 2);
    $annee = substr($date, 0, 4);
    $heure = substr($date, 11, 2);
    $minute = substr($date, 14, 2);
    $seconde = substr($date, 17, 2);
    
    $key = array('annee', 'mois', 'jour', 'heure', 'minute', 'seconde');
    $value = array($annee, $mois, $jour, $heure, $minute, $seconde);
    
    $tab_retour = array_combine($key, $value);
    
    return $tab_retour;
}

//Mettre un 's' quand c'est au pluriel
function Pluriel($chiffre) {
    if($chiffre>1) {
        return 's';
    };
}

//Calcul du temps restant
function TimeToFin($date) {
    $tab_date = Date_Convert($date);
    $mkt_jourj = mktime($tab_date['heure'],
                    $tab_date['minute'],
                    $tab_date['seconde'],
                    $tab_date['mois'],
                    $tab_date['jour'],
                    $tab_date['annee']);

    $mkt_now = time();
    
    $diff = $mkt_jourj - $mkt_now;
    
    $unjour = 3600 * 24;
    $past = false;
    if($diff>=$unjour) {
        // EN JOUR
        $past = false;
        $calcul = $diff / $unjour;
        return array (ceil($calcul).' jour'.Pluriel($calcul).'</strong>.', $past);

    } elseif($diff<$unjour && $diff>=0 && $diff>=3600) {
        // EN HEURE
        $past = false;
        $calcul = $diff / 3600;
        return array (ceil($calcul).' heure'.Pluriel($calcul).'</strong>.', $past);

    } elseif($diff<$unjour && $diff>=0 && $diff<3600) {
        // EN MINUTES
        $past = false;
        $calcul = $diff / 60;
        return array (ceil($calcul).' minute'.Pluriel($calcul).'</strong>.', $past);'</strong>.';
    } elseif($diff<0 && abs($diff)<3600) {
        // DEPUIS EN MINUTES
        $past = true;
        $calcul = abs($diff/ 60);
        return array (ceil($calcul).' minute'.Pluriel($calcul).'</strong>.', $past);'</strong>.';
    } elseif($diff<0 && abs($diff)<=3600) {
        // DEPUIS EN HEURES
        $past = true;
        $calcul = abs($diff / 3600);
        return array (ceil($calcul).'heure'.Pluriel($calcul).'</strong>.', $past);       
    } else {
        // DEPUIS EN JOUR
        $past = true;
        $calcul = abs($diff) / $unjour;
        return  array(ceil($calcul).' jour'.Pluriel($calcul).'</strong>.',$past) ;
    };
}
$dateFin = $resultat[0][0]["date_fin"];

list ($temps, $past) = TimeToFin($dateFin);
?>
    <main>
        <section sondage>
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