<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <title>Accueil</title>
</head>
<body>
<header>
    <div id="header_container">
        <div id="logo_container">
            <img src="images/quiz-logo.png" alt="logo" id="logo">
        </div>
        <div id="header_main">
            <a href="index.php"><h1>Titre du site</h1></a>
        </div>
        <div id="login_form">
            <form action="index.php?action=login" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="submit" name="submit_login" value="Connexion">
            </form>
            <a href="signin.php"></a><button>Créer un compte</button>
        </div>

    </div>

</header>
<div>
    <a href="admin.php">Administration</a>
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


