<?php namespace App\Model;
use Core\Database;

class FriendModel extends Database {
    function friend() {
        $msg="";//création du var message
        $idUser=$_SESSION['membre']['membre_id']; //stcokage de l'id de l'utilisateur en le récupérant de la session

        //On récupère dans la bdd les informations des amis A et B
        $colA=$this->pdo->query("SELECT m.`pseudo` as pseudo, m.`statut` as statut, a.`membre1_id` as id FROM ami as a INNER JOIN membre as m  on a.`membre1_id` = m.`membre_id` WHERE a.`membre2_id` = '$idUser'");
        $colB=$this->pdo->query("SELECT m.`pseudo` as pseudo, m.`statut` as statut, a.`membre2_id` as id FROM ami as a INNER JOIN membre as m  on a.`membre2_id` = m.`membre_id` WHERE a.`membre1_id` = '$idUser'");

        if(isset($_POST['button'])) {
            if( !empty($_POST['recherche'])) {
                $recherche=htmlspecialchars(trim($_POST['recherche']));
                $colA=$this->pdo->query("SELECT m.`pseudo` as pseudo, a.`membre1_id` as id FROM ami as a INNER JOIN membre as m  on a.`membre1_id` = m.`membre_id` WHERE a.`membre2_id` = '$idUser' AND m.`pseudo` LIKE '$recherche%' ORDER BY membre_id DESC ");
                $colB=$this->pdo->query("SELECT m.`pseudo` as pseudo, a.`membre2_id` as id FROM ami as a INNER JOIN membre as m  on a.`membre2_id` = m.`membre_id` WHERE a.`membre1_id` = '$idUser' AND m.`pseudo` LIKE '$recherche%' ORDER BY membre_id DESC ");
            }
        }

        //Permet de récuperer la liste des amis
        if($colA->rowCount()==1 || $colB->rowCount()==1) {
            $colA=$colA->fetchAll(\PDO::FETCH_ASSOC);
            $colB=$colB->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            $msg="vous n'avez aucun amis";
        }

        if(isset($_GET['id'])) {
            $idFriend=$_GET['id'];
            $idUser=$_SESSION['membre']['membre_id'];
            //verif présence amis dans col A 
            $colA=$this->pdo->query("SELECT membre1_id FROM ami where membre1_id = '$idFriend'  AND membre2_id = '$idUser' ");
            //verif présence amis dans col B 
            $colB=$this->pdo->query("SELECT membre2_id FROM ami where membre1_id = '$idUser'  AND membre2_id = '$idFriend' ");
            //Vérifier si l'amis n'est pas déjà présent dans les amis
            if($colA->rowCount()==1 || $colB->rowCount()==1) {
                $colA=$this->pdo->prepare("DELETE FROM ami where membre1_id = '$idFriend'  AND membre2_id = '$idUser' ");
                $colB=$this->pdo->prepare("DELETE FROM ami where membre1_id = '$idUser'  AND membre2_id = '$idFriend' ");
                $colA->execute();
                $colB->execute();
                header("location:index.php?page=friend");
            }
            //si l'amis est déjà dans la liste d'amis alors on affiche
            else {
                $msg2='vous êtes déjà amis';
            }
        }
        return $var=array($msg, $colA, $colB);
    }
}