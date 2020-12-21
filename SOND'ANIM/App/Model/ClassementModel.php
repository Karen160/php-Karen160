<?php namespace App\Model;
use Core\Database;

class ClassementModel extends Database {
    function classement() {
        // Affiche les membres trier par leurs plus gros nombre de point
       return $membre = $this->query("SELECT pseudo, point FROM `membre` ORDER BY point DESC"); 
    }
}