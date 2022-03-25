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
<?php
    //Idéalement cette variable est définie dans le contrôleur donc la vue ne doit pas vérifier son existence
    $type = $_SESSION['type'] ?? 0;
?>
<nav>
    <ul>
    <?php if($type==1) { ?>    
        <li><a href="user.php">Mon compte</a></li>
    <?php } elseif($type==2) { ?>
        <li><a href="admin.php">Administration</a></li>
    <?php } ?>
    </ul>
</nav>
<hr>
<div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <label>
            Filtre :
            <input name="filtre" type="text" placeholder="<?= $filtre ?? 'Recherche' ?>">
        </label>
    </form>
    <a href="index.php" style="color: darkmagenta">Effacer filtre</a>
</div>
<hr>


