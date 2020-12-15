<?php
namespace App\Controller;

use App\Model\SondageHxHModel;


class SondageHxHController{
    public function __construct()
    {
        $this->model = new SondageHxHModel();
    }
    public function render()
    {   
        $allSondageHxH =  $this->model->sondHxH();
        //on require la vue    
        require ROOT."/App/View/sondageHxHView.php";
    }
}