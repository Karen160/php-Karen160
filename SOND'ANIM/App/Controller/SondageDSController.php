<?php
namespace App\Controller;

use App\Model\SondageDSModel;


class SondageDSController{
    public function __construct()
    {
        $this->model = new SondageDSModel();
    }
    public function render()
    {   
        //on require la vue    
        require ROOT."/App/View/homeView.php";
    }
}