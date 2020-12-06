<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        $_SESSION['connect'] == true;
      return $allSondage = $this->query(" SELECT q.`question`, m.`pseudo`, q.`image_question`, q.`date_fin` FROM `sondage_question` as q INNER JOIN `membre` as m on q.`auteur_membre_id` = m.`membre_id` WHERE date_fin >= NOW() ORDER BY date_fin ASC limit 6");
    }
    function homeConnect(){
        //quand l'utilisateur est connecté on récupère ses sondages et on les affiches
        $this->pdo->exec('SET time_zone = "+01:00"');
        $membre_id = $_SESSION['membre']['membre_id'];
        $sond = $this->query(" SELECT q.`question_id`, q.`question`, m.`pseudo`, q.`image_question`, q.`date_fin` FROM `sondage_question` as q INNER JOIN `membre` as m on q.`auteur_membre_id` = m.`membre_id` WHERE date_fin >= NOW() AND q.`auteur_membre_id` <> ' $membre_id'  ORDER BY date_fin ASC");
        
        $sondPerso = $this->query("SELECT question_id, question, `image`, date_fin FROM sondage_question WHERE date_fin >= NOW() and `auteur_membre_id` = '$membre_id' "); 
        
        return $requete = array($sond, $sondPerso);
    }

    function statut(){
        //Permets d'attribuer une valeur au statut pour savoir quand l'utilisateur est connecté ou non
        if($_SESSION['connect'])
        {
            $co =$this->pdo->prepare("UPDATE membre SET statut= 1 WHERE id =" . $_SESSION['membre']['membre_id']);
            $co->execute();
        } 
        //si l'utilisateur appuie sur le bouton déconnexion alors on push un 0 dans la table membre statut
        if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
            $co =$this->pdo->prepare("UPDATE membre SET statut= 0 WHERE id =" . $_SESSION['membre']['membre_id']);
            $co->execute();
        }
    }
}   