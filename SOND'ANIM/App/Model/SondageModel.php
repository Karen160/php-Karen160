<?php namespace App\Model;
use Core\Database;

class SondageModel extends Database {
  function verif() {
    //recup info a return dans le controller pour une verification
    $sondage_id=$_GET['sondage'];
    return $id=$this->query("SELECT `question_id` FROM `sondage_question` where  `question_id` =  '$sondage_id'  ");
  }

  function sondage() {
    $sondage_id=$_GET['sondage'];

    //select tout les ids de sondage exitants
    //select info d'un sondage
    $sondage=$this->query("SELECT q.`question`, q.`question_id`, q.`auteur_membre_id`, a.`choix`, a.`reponse_id` FROM `sondage_question` as q INNER JOIN sondage_reponse as a WHERE `question_id` = `id_question_id` AND `question_id` = ' $sondage_id' ");

    //select tout les ids de sondage exitants
    //select info d'un sondage
    date_default_timezone_set("Europe/Paris");
    $dtfin = $this->pdo->query("SELECT date_fin FROM sondage_question WHERE question_id = '$sondage_id'");
    $dtnow = date("Y-m-d H:i:s");
    $dtfin = $dtfin->fetchAll(\PDO::FETCH_ASSOC);

    //si l'heure actuelle est supérieur a celle de la fin du sondage
    if(strtotime($dtnow) > strtotime($dtfin[0]['date_fin'])){
      //on trouve la réponse qui a eu le plus de vote
     $max = $this->pdo->query("SELECT MAX(nombre) AS nombre FROM sondage_reponse WHERE id_question_id = '$sondage_id'");
     $max = $max->fetchAll(\PDO::FETCH_ASSOC);
     $max = $max[0]['nombre'];
     // la valeur 1 dans la BDD est la réponse la plus votée, 0 sont les questions les moins votées
     $pushresultT = $this->pdo->prepare("UPDATE sondage_reponse SET resultat = 1 WHERE id_question_id = '$sondage_id' AND nombre = '$max'");
     $pushresultT->execute();
     $pushresultF = $this->pdo->prepare("UPDATE sondage_reponse SET resultat = 0 WHERE id_question_id = '$sondage_id' AND nombre <> '$max'");
     $pushresultF->execute();
    }
    return $sondage; 
  }

  function addAnswer() {
    //permet de Hash les réponses dans l'url pour ainsi pallier les requetes de l'utilisateur via l'url
    $sondage_id=$_GET['sondage'];
    $idUser=$_SESSION['membre']['membre_id'];
    $verif=$this->pdo->query("SELECT * FROM membre_reponse WHERE `id_membre` = '$idUser' AND id_question = '$sondage_id'");
      if(isset($_GET['answer'])){
        //hash des valeurs des réponses
        $idAnswerHash = $_GET['answer'];
        $idAnswer = 0;
        //tant que idanswer n'est pas égal à la valeur hash de la réponse on lui rajoute +1
        while(password_verify($idAnswer, $idAnswerHash) == false){
          $idAnswer++;  
        }
        if($verif->rowCount() == 0){
          $addAnswer = $this->pdo->prepare("INSERT INTO membre_reponse (`id_membre`, id_reponse, id_question) VALUES ('$idUser','$idAnswer',' $sondage_id')");
          $addAnswer->execute();  
          $countAnswer= $this->pdo->prepare("UPDATE sondage_reponse SET nombre = nombre+1 WHERE reponse_id = '$idAnswer'");
          $countAnswer->execute();
          header('location:index.php?page=sondage&sondage='.$sondage_id); 
        }else{
        header('location:index.php?page=sondage&sondage='.$sondage_id); 
        }
      
      }//verifion que nous ne retournons auccune ligne, si c'est le cas l'utilisateur n'a pas voté
      if($verif->rowCount() == 0){
        $vote = false;
      }else{//sinon il a déjà voté
        $vote = true;
      }//return de la variable pour l'utiliser dans la vue et 
      //savoir s'il faut lui afficher les résultats ou les proposition de réponse
      return $vote;
  }

  function result(){
    //function permettant de récupérer les informations des résultats d'un sondage
    $sondage_id=$_GET['sondage'];
    $total = $this->pdo->query("SELECT SUM(nombre) as total from sondage_reponse WHERE id_question_id = '$sondage_id'"); //le total est le nombre total pour les %
    $total = $total->fetchAll(\PDO::FETCH_ASSOC);
    //requete permettant de récupéré les info d'une réponse
    $resultat = $this->pdo->query("SELECT q.`date_fin` as date_fin, q.`question` as question, r.`choix` as choix, r.`nombre` as nombre, SUM(r.`nombre`) as total FROM sondage_question as q INNER JOIN sondage_reponse as r on q.`question_id` = r.`id_question_id` WHERE q.`question_id` = '$sondage_id' GROUP BY reponse_id ");
    $resultat = $resultat->fetchAll(\PDO::FETCH_ASSOC);
    return array($resultat, $total) ; //return un tableau de var a la vue
  }

  function comment() {
    $sondage_id=$_GET['sondage'];
    //function permettant de recup et afficher les commentaire et les info lié
    $commentaire =$this->query("SELECT m.`pseudo`, c.`msg`, c.`date_msg` FROM commentaire as c INNER JOIN membre as m on c.`id_membre` = m.`membre_id` WHERE id_question_id = '$sondage_id'");
    if(isset($_POST['sendcom'])) {
      if(!empty($_POST['commentaire'])) {
        $iduser=$_SESSION['membre']['membre_id'];
        $mess=$_POST['commentaire'];
        $enregistrementCom=$this->pdo->prepare("INSERT INTO commentaire (`id_membre`, id_question_id, msg) VALUES ('$iduser', '$sondage_id', '$mess')");
        $enregistrementCom->execute();
      }else {
  
      }
    }
    return $commentaire;
  }

  function share() {
    $membre_email=$_SESSION['membre']['email'];
    $msg="";
    //function de partage de sondage
    if(isset($_POST['send'])) { //si le bouton send est cliqué

      //Vérifier si le message fait plus de 20 caractères
      if(iconv_strlen(trim($_POST['textarea'])) >=20) { //si le stextarea sans espace au début et à la fin fait au moins 20 caractère
        
        $i=0; //on initialise i a 0

        while(isset($_POST['email'.($i+1)])) { //tant que l'élément au name email$i existe on fait i++(retourne le nombre choisit)
    
          $i++;

        }

        for($k=1; $k<=$i; $k++) { //tant que k est inférieur a i k++

          //Vérifie l'email
          if(filter_var($_POST['email'. $k], FILTER_VALIDATE_EMAIL)) {
            //envoi de l'email
            $to=$_POST['email'.$k]; //le destinataire c'est a dire le contenu de l'élément au name email$K
            $subject='Le sondage de SONDANIM';
            $mail=$_POST['textarea'];
            $link=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $content="Tu as recu une invitation à un sondage, clique sur le message pour y accéder: <br> <br><a href='".$link."'>".$mail." </a>";

            $headers[]='MIME-Version: 1.0';
            $headers[]='Content-type: text/html; charset=utf-8 ';

            $headers[]='From: '. $membre_email; //de qui proviens l'email
            $headers[]='Reply-To: '. $membre_email; //répondre à l'envoyeur
            $headers[]='X-Mailer: PHP/'. phpversion();

            if(isset($to, $subject, $content, $headers)) {
              if(mail($to, $subject, $content, implode("\r\n", $headers))) {
                //message d'envoi email
                unset($content);
                unset($_POST['email'.$k]);
              }

              else {
                //erreur envoi d'email
                $msg='<div class="alertGlobal">Problème lors de l\'envoi de l\'email. Merci de réessayer plus tard.</div>';
              }
            }

            else {
              //erreur si champs vide
              $msg='<div class="alert"><i class="fas fa-exclamation-circle"></i>Merci de remplir tous les champs. Le message doit avoir au moin 20 caractèregi</div>';
            }

          }
        }
      }

      return $msg;
    }
 }
}

?>