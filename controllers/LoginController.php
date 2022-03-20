<?php
class LoginController{

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    public function run(){

        /*
         # Si un distrait écrit ?action=login en étant déjà authentifié
		if (!empty($_SESSION['authentifie'])) {
			header("Location: index.php?action=admin"); # redirection HTTP vers l'action login
			die();
        }
        */

        # Variables HTML dans la vue
        $notification='';

        # L'utilisateur s'est-il bien authentifié ?
        if (empty($_POST['username']) || empty($_POST['password'])) {
            # L'utilisateur doit remplir le formulaire
            $notification='Veuillez remplir tous les champs';
        } elseif (isset($_POST['username']) && isset($_POST['password'])){
            # L'utilisateur est bien authentifié
            # Une variable de session $_SESSION['authenticated'] est créée
            $user = $_POST['username'];
            $pwd = $_POST['password'];
            $auth = $this->_db->login($user, $pwd);
            if ($auth == 1){
                header('Location: index.php?action=admin');
            } else {
                $notification = "Utilisateur et/ou mot de passe incorrect(s)";
            }
        }

        # Un contrôleur se termine en écrivant une vue
        require_once(CHEMIN_VUES . 'header.php');

    }

}
?>
