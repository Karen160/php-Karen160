<?php namespace App\Model;
use Core\Database;

class ClassementModel extends Database {
    function classement() {
       return $membre = $this->query("SELECT pseudo, point FROM `membre` ORDER BY point DESC"); 
    }
}