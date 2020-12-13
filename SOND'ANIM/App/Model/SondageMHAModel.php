<?php
namespace App\Model;
use Core\Database;

class SondageMHAModel extends Database{
    function sondMHA(){
        $_SESSION['connect'] == true;
        return $allSondageMHA = $this->query(" SELECT `question`, `image_question`, `date_fin`, `point` FROM `sondage_question` WHERE `type` = 1 AND date_fin >= NOW() ORDER BY date_fin ASC");
      }
}