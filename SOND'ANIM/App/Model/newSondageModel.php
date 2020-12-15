<?php namespace App\Model;
use Core\Database;

class newSondageModel extends Database {
  function newsondage() {

    $msg="";
    // Enregistrement des éléments du sondages
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['proposition1']) && isset($_POST['date']) && isset($_POST['categorie']) && isset($_POST['point'])) {
      $question=trim($_POST['question']);
      $image=trim($_POST['image']);
      $date=trim($_POST['date']);
      $categorie=trim($_POST['categorie']);
      $point=trim($_POST['point']);

      var_dump($categorie);
      // Défini id_membre de l'internaute connecté = membre_id de la table article en bdd
      $membre_id=$_SESSION['membre']['membre_id'];

      // Enregistrement de la question dans la bdd
      $enregistrementQuestion=$this->pdo->prepare("INSERT INTO sondage_question (auteur_membre_id, type, question, image_question, date_fin, point) VALUES ( $membre_id, :categorie, :question, :image, :date, :point)");
      $enregistrementQuestion->bindParam(':question', $question, \PDO::PARAM_STR);
      $enregistrementQuestion->bindParam(':categorie', $categorie, \PDO::PARAM_STR);
      $enregistrementQuestion->bindParam(':image', $image, \PDO::PARAM_STR);
      $enregistrementQuestion->bindParam(':date', $date, \PDO::PARAM_STR);
      $enregistrementQuestion->bindParam(':point', $point, \PDO::PARAM_STR);
      $enregistrementQuestion->execute();

      // Défini id de la question
      $recup_question=$this->pdo->query("SELECT max(`question_id`) as question_id FROM sondage_question");
      $recupQ=$recup_question->fetch(\PDO::FETCH_ASSOC);
      $question_id = $recupQ['question_id'];
        $i=0;
        while(isset($_POST['proposition'.($i+1)])) {
          $i++;
        }
        for($k=1; $k<=$i; $k++) {
          $proposition=trim($_POST['proposition'.$k]);
          // Enregistrement des proposition de réponse dans la bdd
          $enregistrementAnswer=$this->pdo->prepare("INSERT INTO sondage_reponse (id_question_id, choix) VALUES ( '$question_id' , '$proposition')");
          $enregistrementAnswer->execute();
          
        }
        return $msg="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; text-transform: uppercase; color: white; text-align: center;'>Merci ! Votre sondage a bien été enregistré !</div>";
      }
    }
  }
