<?php

/*
 * Implémentez un formulaire d'upload permettant à l'administrateur de changer le logo du site.
 * Limitez aux fichiers images png de maximum 300 ko
 * Nommez le fichier quiz-logo.png
 * Après exécution, le nouveau logo est directement visible dans l'en-tête du site.
 */
if(isset($_POST['submit'])) {
    require '../controller/uploader.inc.php';
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>
<header>
    <img src="./images/quiz-logo.png" alt="logo">
    <a href="index.php"><h1>Titre du site</h1></a>
</header>
<div>
    <a href="index.php">Accueil</a>
</div>
    <form action="#" method="post" enctype="multipart/form-data">
        <Label>Logo du site :</Label>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="file" name="logo" accept="image/png">
        <input type="submit" value="Envoyer" name="submit">
    </form>
</body>
</html>

