<?php
class LogOffController
{
    private $_db;

    public function __construct($db){
        $this->_db =$db;
    }

    public function run()
    {


        if (!isset($_SESSION['auth'])) {
            header('Location: index.php?action=accueil');
        }

        $_SESSION = array();
        header('Location: index.php?action=accueil');

    } //End of run

} //End of Class
?>
