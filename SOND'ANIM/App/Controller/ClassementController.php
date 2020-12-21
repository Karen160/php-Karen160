<?php
namespace App\Controller;

use App\Model\ClassementModel;


class ClassementController{
    public function __construct()
    {
        $this->model = new ClassementModel();
    }
    public function render()
    { 
        $membre = $this->model->classement();
        
        //on require la vue    
        require ROOT."/App/View/classementView.php";
    }
}