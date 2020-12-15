<?php
namespace App\Controller;

use App\Model\SondageOPModel;


class SondageOPController{
    public function __construct()
    {
        $this->model = new SondageOPModel();
    }
    public function render()
    {   
        $allSondageOP =  $this->model->sondOP();
        //on require la vue    
        require ROOT."/App/View/sondageOPView.php";
    }
}