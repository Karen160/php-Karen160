<?php

use App\Controller\HomeController;
use App\Controller\SondageThemeController;
use App\Controller\FriendController;
use App\Controller\ProfilController;
use App\Controller\ResultController;
use App\Controller\SondageController;
use App\Controller\NewFriendController;
use App\Controller\newSondageController;
use App\Controller\ProfilmodifController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'home':
            $controller = new HomeController();
            $controller->render();
        break;
        case 'sondageTheme':
            $controller = new SondageThemeController();
            $controller->render();
        break;
        case 'classement':
            $controller = new ProfilController();
            $controller->profil();
        break; 
        case 'resultat':
            $controller = new ProfilModifController();
            $controller->modifier();
        break;
        case 'profil':
            $controller = new ProfilModifController();
            $controller->modifier();
        break;
        case 'profilModif':
            $controller = new ProfilModifController();
            $controller->modifier();
        break;
        case 'newSondage':
            $controller = new newSondageController();
            $controller->render();
        break;
        case 'sondage':
            $controller = new SondageController();
            $controller->render();
        break;
        case 'friend':
            $controller = new FriendController();
            $controller->render();
        break;
        case 'NewFriend':
            $controller = new NewFriendController();
            $controller->render();
        break;
        case 'connexion':
            $controller = new ResultController();
            $controller->render();
        break;
        case 'inscription':
            $controller = new ResultController();
            $controller->render();
        break;
        default:
            $controller = new HomeController();
            $controller->render();
        break;
    }
}else{
    $controller = new HomeController();
    $controller->render();
}
