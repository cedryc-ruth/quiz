<?php
class AccueilController{
    private $_db;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function run(){
        //TODO
        require_once(CHEMIN_VUES . 'accueil.php');
    }
}
