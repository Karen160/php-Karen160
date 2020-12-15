<?php namespace App\Model;
use Core\Database;

class InscriptionModel extends Database {
  function inscription() {
    $msg="";
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['image'])) {
      $pseudo=trim($_POST['pseudo']);
      $recup_pseudo=$this->pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
      // on vérifie si le pseudo n'existe pas dans la BDD
      $email=trim($_POST['email']);
      $recup_email=$this->pdo->query("SELECT * FROM membre WHERE email = '$email'");

      // // on vérifie si l'email n'existe pas dans la BDD
      if($recup_email->rowCount() < 1 && $recup_pseudo->rowCount() < 1) {
        $mdp=trim($_POST['mdp']);
        $mdp=password_hash($mdp, PASSWORD_DEFAULT);
        $prenom=trim($_POST['prenom']);
        $nom=trim($_POST['nom']);
        $image=trim($_POST['image']);

        $enregistrement=$this->pdo->prepare("INSERT INTO membre (nom, prenom, pseudo, email, mdp, date_membre, image) VALUES (:nom, :prenom, :pseudo, :email, :mdp, NOW(), :image )");
        // on fourni les valeurs des marqueurs nominatifs
        $enregistrement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
        $enregistrement->bindParam(':email', $email, \PDO::PARAM_STR);
        $enregistrement->bindParam(':mdp', $mdp, \PDO::PARAM_STR);
        $enregistrement->bindParam(':image', $image, \PDO::PARAM_STR);
        $enregistrement->execute();
      
        $recup_infos=$this->pdo->query("SELECT * FROM membre where pseudo = '$pseudo' ");
        $infos_membre=$recup_infos->fetch(\PDO::FETCH_ASSOC);
        $date=date('d-m-Y', strtotime($infos_membre['date_membre']));
        //Stock les informations dans la bdd afin de les réutiliser plus tard
        $_SESSION['membre']['membre_id']=$infos_membre['membre_id'];
        $_SESSION['membre']['nom']=$infos_membre['nom'];
        $_SESSION['membre']['prenom']=$infos_membre['prenom'];
        $_SESSION['membre']['email']=$infos_membre['email'];
        $_SESSION['membre']['pseudo']=$infos_membre['pseudo'];
        $_SESSION['membre']['date_membre']=$date;
        $_SESSION['membre']['image']=$image;

        $_SESSION['connect']=true;
        header("location:index.php?page=home");
      }

      else {
        return $msg="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Le pseudo/email existe déjà<br>Veuillez recommencer</div>";
      }

    }
  }
}