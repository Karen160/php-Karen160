<?php
namespace App\Model;
use Core\Database;

class SondageOPModel extends Database{
    function sondOP(){
      // Selection de tous les sondages du type 2 : one piece
        $_SESSION['connect'] == true;
        return $allSondageOP = $this->query(" SELECT question_id, `question`, `image_question`, `date_fin`, `point` FROM `sondage_question` WHERE `type` = 2 AND date_fin >= NOW() ORDER BY date_fin ASC");
      }
}