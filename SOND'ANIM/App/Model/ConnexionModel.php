<?php namespace App\Model;
use Core\Database;

class ConnexionModel extends Database {
  function connexion() {
    $msgCo="";

    if(!empty($_POST['pseudoCo']) && !empty($_POST['mdpCo'])) {

      $pseudoCo=$_POST['pseudoCo'];
      $mdpCo=$_POST['mdpCo'];

      // on interroge la BDD pour récupérer les informations de l'utilisateur sur la base de son pseudo
      $recup_infosCo=$this->pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudoCo' ");

      // on vérifie si on a récupéré une ligne.
      if($recup_infosCo->rowCount() > 0) {
        // le pseudo est bon

        // on vérifie le mdp avec un fetch
        $infos_membre=$recup_infosCo->fetch(\PDO::FETCH_ASSOC);

        if(password_verify($mdpCo, $infos_membre['mdp'])) {
          $date=date('d-m-Y', strtotime($infos_membre['date']));
          // le mdp est bon
          // Pour la connexion, on place les informations de l'utilisateur sauf son mdp dans la session ($_SESSION) pour pouvoir interroger la session par la suite.
          $_SESSION['membre']['membre_id']=$infos_membre['membre_id'];
          $_SESSION['membre']['nom']=$infos_membre['nom'];
          $_SESSION['membre']['prenom']=$infos_membre['prenom'];
          $_SESSION['membre']['email']=$infos_membre['email'];
          $_SESSION['membre']['pseudo']=$infos_membre['pseudo'];
          $_SESSION['membre']['date']=$date;

          $_SESSION['connect']=true;
          //rediriger
          header("location:index.php?page=home");
        }

        else {
          //mdp incorrect
          return $msgCo="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; color: white; text-align: center;'>Mdp incorrect,<br>Veuillez recommencer</div>";
        }
      }

      else {
        // pseudo/email incorrect
        return $msgCo="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Pseudo incorrect,<br>Veuillez recommencer</div>";
      }
    }
  }
}