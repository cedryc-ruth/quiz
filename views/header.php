<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <title>Accueil</title>
</head>
<body>
<header>
    <p id="header_container">
        <div id="logo_container">
            <img src="images/quiz-logo.png" alt="logo" id="logo">
        </div>
        <div id="header_main">
            <a href="index.php"><h1>Titre du site</h1></a>
        </div>
        <?php
        if(isset($_SESSION['auth'])){ ?>
            <p>Bonjour <?= $_SESSION['username'] ?></p>
            <button><a href="index.php?action=log_off">Déconnexion</a></button>

        <?php }
        else {
            ?>

            <div id="login_form">
                <form action="index.php?action=login" method="post">
                    <input type="text" name="username" placeholder="Nom d'utilisateur">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input type="submit" name="submit_login" value="Connexion">
                </form>
                <button><a href="index.php?action=sign_in">Créer un compte</a></button>
            </div>

        <?php } ?>

    </div>
</header>
<div>
    <?php
    if(isset($_SESSION['type'])){
        switch($_SESSION['type']){
            case 0:
                //Ne rien afficher
                break;
            case 1:
                ?><a href="user.php">Mon compte</a><?php
                break;
            case 2:
                ?><a href="admin.php">Administration</a><?php
                break;
        }
    }
    ?>

</div>
<hr>
<div>
    <form action="#" method="get">
        <label>
            Filtre :
            <input name="filtre" type="text" placeholder="<?= $filtre ?? 'Recherche' ?>">
        </label>
    </form>
    <a href="index.php" style="color: darkmagenta">Effacer filtre</a>
</div>
<hr>


