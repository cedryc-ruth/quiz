<?php
class Db
{

    private static $instance = null;
    private $_db;

    private function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBLOGIN, DBPASS);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    # Pattern Singleton
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function login($user, $pwd)
    {
        $query = 'SELECT password FROM user WHERE username = :username';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':username', $user, PDO::PARAM_STR);
        $ps->execute();

        $pass = $ps->fetch()[0];
        if($pass === $pwd){
            return 1;
        }
        else return 0;
    }

} //End of class

/*
    public function display_users() {
        # Solution d'INSERT avec prepared statement
        $query = 'SELECT id_member, username, email, is_admin, activate FROM members';
        $ps = $this->_db->prepare($query);
        $ps->execute();

        $tab_users = $ps->fetchAll(PDO::FETCH_OBJ);

        return $tab_users;
    }
*/
?>