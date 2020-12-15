<?php
namespace App\Controller;

use App\Model\newSondageModel;

class newSondageController{

    public function __construct()
    {
        $this->model = new newSondageModel();
    }

    public function render()
    {
        $msg = $this->model->newsondage();
        require ROOT."/App/View/newSondageView.php";
        
    }
}
