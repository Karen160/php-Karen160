<?php namespace App\Model;
use Core\Database;

class ResultModel extends Database {
    function resultat(){
        //Permet d'afficher les résultats
        $this->pdo->exec('SET time_zone = "+01:00"');
        $membre_id = $_SESSION['membre']['membre_id'];
        $sondFin = $this->query(" SELECT q.`question_id`, q.`question`, m.`pseudo`, q.`image_question`, q.`date_fin`, q.`point` FROM `sondage_question` as q INNER JOIN `membre` as m on q.`auteur_membre_id` = m.`membre_id` WHERE date_fin < NOW() AND q.`auteur_membre_id` <> ' $membre_id'  ORDER BY date_fin ASC");
        
        $sondPersoFin = $this->query("SELECT question_id, question, `image_question`, date_fin, `point` FROM sondage_question WHERE date_fin < NOW() and `auteur_membre_id` = '$membre_id' ");   
        return array($sondFin, $sondPersoFin);
    }   
}