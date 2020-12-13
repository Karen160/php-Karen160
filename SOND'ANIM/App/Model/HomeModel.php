<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        $_SESSION['connect'] == true;
      return $allNewSondage = $this->query(" SELECT `question`, `image_question`, `point`, `date_fin` FROM `sondage_question` WHERE date_fin >= NOW() ORDER BY date_fin ASC limit 6");
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