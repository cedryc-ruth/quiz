<?php

class AdminController{
    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }

    public function run(){

        if($_SESSION['auth'] != 1 && $_SESSION['admin'] != 1){
            header('Location: header.php');
        }

        if(isset($_POST['submit'])) {
            require 'uploader.inc.php';
        }


        require_once(CHEMIN_VUES . 'admin.php');

    } //End of RUN


} //End of class

