<?php
namespace App\Controller;

use App\Model\SondageMHAModel;


class SondageMHAController{
    public function __construct()
    {
        $this->model = new SondageMHAModel();
    }
    public function render()
    {   
        $allSondageMHA =  $this->model->sondMHA();
        //on require la vue    
        require ROOT."/App/View/sondageMHAView.php";
    }
}