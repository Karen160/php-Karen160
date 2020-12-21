<?php
namespace App\Model;
use Core\Database;

class SondageMHAModel extends Database{
    function sondMHA(){
      // Selection de tous les sondages du type 1 : My hero academia
        $_SESSION['connect'] == true;
        return $allSondageMHA = $this->query(" SELECT question_id, `question`, `image_question`, `date_fin`, `point` FROM `sondage_question` WHERE `type` = 1 AND date_fin >= NOW() ORDER BY date_fin ASC");
      }
}