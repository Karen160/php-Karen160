<?php include('../inc/head.php'); ?>
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
    <!-- Fond changeant en fonction du type de sondage -->
    <?php 
    if($sondage[0]->type == 1){
        echo '<img class="fond" src="Asset/img/MHA/todoroki.gif" alt="Feu et glace de todoroki">';
        echo '<button class="btn btn-info pop droite">Partager ce sondage</button>';
        echo '<h2 class="fondDev">Sondage My Hero Academia</h2>';
    }else if($sondage[0]->type == 2){
        echo '<img class="fond" src="Asset/img/onePiece/luffy.gif" alt="Luffy évite les balles">';
        echo '<button class="btn btn-info pop droite">Partager ce sondage</button>';
        echo '<h2 class="fondDev">Sondage One Piece</h2>';
    }else if($sondage[0]->type == 3){
        echo '<img class="fond" src="Asset/img/demonSlayer/clan.gif" alt="Les pourfendeurs de démon en train de courir">';
        echo '<button class="btn btn-info pop droite">Partager ce sondage</button>';
        echo '<h2 class="fondDev">Sondage Demon Slayer</h2>';
    }else if($sondage[0]->type == 4){
        echo '<img class="fond" src="Asset/img/HxH/gonkirua.gif" alt="Gon et kirua">';
        echo '<button class="btn btn-info pop droite">Partager ce sondage</button>'; 
        echo '<h2 class="fondDev">Sondage Hunter x Hunter</h2>';
    }
    
    if($past == false && $_SESSION['membre']['membre_id'] != $sondage[0]->auteur_membre_id && $vote == false){
    ?>

    <!-- Affichage des choix du sondage si il n'est pas répondu -->
    <section sondage>

        <div class="form">
            <h3><?=$sondage[0]->question?><span><?=$sondage[0]->point?> points</span></h3>
            <br><br>
            <div class="sond">
                <?php foreach($sondage as $choix): ?>
                <button class="btn sondagebtn" name="addAnswer">
                    <?php $idHash = password_hash($choix->reponse_id, PASSWORD_DEFAULT); ?>
                    <a href="index.php?page=sondage&sondage=<?= $choix->question_id?>&answer=<?=$idHash?>">
                        <h5><?=$choix->choix?></h5>
                    </a>
                </button>
                <br><br>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Affichage des résultats de ce sondage -->
    <?php }else{ ?>
    <section sondage>
        <?php  
        if($past){
            $statut = "Le sondage est terminé depuis ".$temps."Voici les résultats finaux";

        }else{
            $statut =  "Le sondage se termine dans ".$temps."Voici les résultats actuels";
        }
        $total = $resultat[1][0]['total'];
        ?>

        <h4 class="fondDev"><?= $statut ?></h4>
        <div class="form">
            <h3><?=$resultat[0][0]["question"]?><span><?=$resultat[0][0]["point"]?> points</span></h3>
            <br><br>
            <div class="sond result">
                <?php foreach($resultat[0] as $result): ?>
                <h5><?= $result['choix'] ?></h5>
                <div class="reload">
                    <div class="bar">
                        <?php $nb = round(($result['nombre']/$total) * 100, 1)?>
                        <div class="percentage" style="width:<?= $nb?>%">
                            <p><?=$nb?>%</p>
                        </div>
                    </div>
                    <p><?= $result['nombre'] ?> votes</p>
                    <br>
                    <?php endforeach ?>
                </div>
            </div>
    </section>
    <?php  } ?>
    <br><br><br>

    <!-- Les commentaires du sondage -->
    <section id="commentaire">
        <h2>Commentaire</h2>
        <br><br>
        <div id="com">
            <?php foreach($commentaire as $com): ?>
            <div class="msg">
                <div>
                    <p><?= $com->pseudo ?></p>
                    <p><?= $com->date_msg ?></p>
                </div>
                <div>
                    <p><?= $com->msg ?></p>
                </div>
                <br>
            </div>
            <?php endforeach;?>
            <br>
        </div>

        <!-- Ajouter un commentaire au sondage -->
        <button type="submit" class="btn combutton" style="margin:0 auto; display:block">Ajouter un
            commentaire</button>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="monCom">
            <textarea name="commentaire" id="commentaire" placeholder="Mon commentaire..."
                style="margin:0 auto; display:block"></textarea>
            <br>
            <button name="sendcom" id="com2" class="btn btn-info com2 active" type="submit"
                style="margin:0 auto; display:block">Envoyez</button>
            <br>
        </form>
    </section>

    <!-- Pop up du formulaire pour partager le sondage via les emails -->
    <section class="col-sm-7 mx-auto" id="shareSondage">
        <div class="card position-static">
            <form method="post" enctype="multipart/form-data" id="partage">
                <i class="fas fa-times"></i>
                <div class="card-body">
                    <h2 class="card-title">Partager le sondage : <br><?=$sondage[0]->question?></h2>
                    <div class="row ">
                        <div class="col-sm-12 mt-4">
                            <label for="nbPerson">Nombre de personne</label>
                            <select id="formNbPerson" type="text" name="nbpersonne" class="form-control"
                                placeholder="Choisissez le nombre de personne à qui partager" required="required"
                                data-error="Le nombre de personne est requis.">
                                <option value="0" selected>Veuillez selectionner un nombre</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div id="email">

                        </div>
                        <div class="col-sm-12 mt-4">
                            <label for="message">Message</label>
                            <textarea form="partage" for="textarea" name="textarea"
                                class="form-control">Salut c'est <?= $_SESSION['membre']['pseudo']?>,<?="\n"?>Je te recommande ce sondage de 2Choose dont la question est : <?=$sondage[0]->question?><?="\n"?>Répond y vite et donne moi ton avis ! <?="\n"?>Ton ami(e) <?= $_SESSION['membre']['pseudo']?></textarea>
                        </div>
                        <div class="col-sm-12 mt-4 offset-ms-4">
                            <button type="submit" name="send" class="btn btn-info btn-block active">Envoyez</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<?php include('../inc/footer.php'); ?>