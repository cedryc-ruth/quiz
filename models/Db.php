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

    public function insert_user($username, $email, $pwd, $sexe){
        $hash_pwd = password_hash($pwd, CRYPT_BLOWFISH);
        $query = "INSERT INTO `user` (`username`, `password`, `type`, `activated`) values(:username, :password, 1, 1)";
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':password', $hash_pwd, PDO::PARAM_STR);
        $ps->bindValue(':username', $username, PDO::PARAM_STR);

        if($ps->execute()){
            //fetch freshly created ID
            $query = $this->_db->prepare('SELECT id FROM user WHERE username = :username');
            $query->bindValue(':username', $username);
            $query->execute();

            $id = $query->fetch()[0];
            //insert in user_meta table
            $query = "INSERT INTO `user_meta` (`id`, `email`, `sexe`, `dateInscription`) values(:id, :email, :sexe, DATE(NOW()))";
            $ps = $this->_db->prepare($query);
            $ps->bindValue(':id', $id, PDO::PARAM_INT);
            $ps->bindValue(':email', $email, PDO::PARAM_STR);
            $ps->bindValue(':sexe', $sexe, PDO::PARAM_STR_CHAR);

            if($ps->execute()){
                return 1;
            }
        }
        return 0;
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