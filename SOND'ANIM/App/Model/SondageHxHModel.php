<?php
namespace App\Model;
use Core\Database;

class SondageHxHModel extends Database{
    function sondHxH(){
      // Selection de tous les sondages du type 4 : hunter x hunter
        $_SESSION['connect'] == true;
        return $allSondageHxH = $this->query(" SELECT question_id, `question`, `image_question`, `date_fin`, `point` FROM `sondage_question` WHERE `type` = 4 AND date_fin >= NOW() ORDER BY date_fin ASC");
      }
}