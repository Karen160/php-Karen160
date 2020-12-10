<?php
namespace App\Controller;

use App\Model\SondageThemeModel;

class SondageThemeController{

    public function __construct()
    {
        $this->model = new SondageThemeModel();
    }

    public function render()
    {
        require ROOT."/App/View/sondageThemeView.php";
    }
}