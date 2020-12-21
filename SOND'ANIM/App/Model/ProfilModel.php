<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){
        //Delete toutes les informations d'un USER, le profil, les commentaires, les questions.
        if(isset($_POST['delete'])){
            $iduser = $_SESSION['membre']['membre_id'];
            $userD = $this->pdo->prepare("DELETE FROM membre WHERE membre_id = '$iduser'");
            $friendD = $this->pdo->prepare("DELETE FROM ami WHERE membre1_id = '$iduser' || membre2_id = '$iduser'");
            $idquestionid = $this->pdo->query("SELECT question_id FROM sondage_question WHERE membre_id = '$iduser' ");
            $answerD = $this->pdo->prepare("DELETE FROM sondage_reponse WHERE id_question_id = '$idquestionid'");
            $questionD = $this->pdo->prepare("DELETE FROM sondage_question WHERE auteur_membre_id = '$iduser'");
            $userAD = $this->pdo->prepare("DELETE FROM membre_reponse WHERE id_membre = '$iduser'");
            $userCD = $this->pdo->prepare("DELETE FROM commentaire WHERE id_membre = '$iduser'");
            
            $userD->execute();
            $friendD->execute();
            $questionD->execute();
            $answerD->execute();
            $userAD->execute();
            $userCD->execute();
            session_destroy();
            header("location:index.php?page=home");
        }
        
    }

    function recup(){ 
        //recuperer des information afin de les utiliser dans la view
    $id = $_SESSION['membre']['membre_id'];
    $user =  $this->query("SELECT * FROM `membre` WHERE membre_id = '$id'");
    $friend =  $this->query("SELECT count(ami_id) as nb_ami from ami where membre1_id ='$id' OR membre2_id = '$id'");
    $sondage = $this->query("SELECT count(question_id) as nb_sond from sondage_question where auteur_membre_id = '$id'");
    return array($user,$friend,$sondage);
    }

    function mesSondage(){
        $id=$_SESSION['membre']['membre_id']; //récup id 
        return $allSondage = $this->query("SELECT question_id, `question`, `image_question`, `point`, `date_fin` FROM `sondage_question` WHERE date_fin >= NOW() AND auteur_membre_id = '$id' ORDER BY date_fin ASC");
    }
}