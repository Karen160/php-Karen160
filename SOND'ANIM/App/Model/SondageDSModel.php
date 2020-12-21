<?php
namespace App\Model;
use Core\Database;

class SondageDSModel extends Database{
    function sondDS(){
      // Selection de tous les sondages du type 3 : demon slayer
        $_SESSION['connect'] == true;
        return $allSondageDS = $this->query(" SELECT question_id, `question`, `image_question`, `point`, `date_fin` FROM `sondage_question` WHERE `type` = 3 AND date_fin >= NOW() ORDER BY date_fin ASC");
      }
}