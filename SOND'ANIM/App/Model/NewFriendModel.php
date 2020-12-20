<?php namespace App\Model;
use Core\Database;

class NewFriendModel extends Database {
    function NewFriend() {
        $idUser=$_SESSION['membre']['membre_id'];
        $Result=$this->query("SELECT * FROM membre as m WHERE membre_id <> ALL ( SELECT membre1_id FROM ami where membre1_id = '$idUser' OR membre2_id = '$idUser') AND membre_id <> ALL ( SELECT membre2_id FROM ami where membre1_id = '$idUser' OR membre2_id = '$idUser') AND membre_id <> '$idUser'");
        $msg="";
        
        //Barre de reherche
        if(isset($_POST['button'])) {
            if( !empty($_POST['recherche'])) {
                $recherche=htmlspecialchars(trim($_POST['recherche']));
                $Result=$this->query("SELECT * FROM membre WHERE pseudo LIKE '$recherche%' ORDER BY membre_id DESC ");
                $rowCount=$this->pdo->query("SELECT * FROM membre WHERE pseudo LIKE '$recherche%' ORDER BY membre_id DESC ");

                if($rowCount->rowCount() < 1) {
                    $msg='Aucun membre ne correspond à votre recherche';
                }
            }
        }

        if(isset($_GET['id'])) {
            $idFriendHash=$_GET['id'];
            $idFriend = 0;

            while(password_verify($idFriend, $idFriendHash) == false){
                $idFriend++;
            }
            
            //verif présence amis dans col A 
            $colA=$this->pdo->query("SELECT membre1_id FROM ami where membre1_id = '$idFriend'  AND membre2_id = '$idUser' ");
            $colB=$this->pdo->query("SELECT membre2_id FROM ami where membre1_id = '$idUser'  AND membre2_id = '$idFriend' ");

            if($colA->rowCount()==0 && $colB->rowCount()==0) {
                $FriendAdd=$this->pdo->prepare("INSERT INTO ami (membre1_id, membre2_id) VALUES ('$idUser', '$idFriend')");
                $FriendAdd->execute();
                header('location:index.php?page=NewFriend', true, 303);
            } else {
            }
        }
        return $var=array($Result, $msg);
    }

}