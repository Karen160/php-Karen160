<?php
namespace App\Controller;

use App\Model\ConnexionModel;

class ConnexionController{

    public function __construct()
    {
        $this->model = new ConnexionModel();
    }

    public function render()
    {
        $msgCo = $this->model->connexion();
        require ROOT."/App/View/ConnexionView.php";
    }
}
