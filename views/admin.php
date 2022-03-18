<?php

/*
 * Implémentez un formulaire d'upload permettant à l'administrateur de changer le logo du site.
 * Limitez aux fichiers images png de maximum 300 ko
 * Nommez le fichier quiz-logo.png
 * Après exécution, le nouveau logo est directement visible dans l'en-tête du site.
 */
if(isset($_POST['submit'])) {
    $folder = 'images'; // dossier contenant l'image
    $img = $_FILES["logo"];
    $imgName = $_FILES["logo"]["name"];
    $imgTmpName = $_FILES["logo"]["tmp_name"];
    $imgError = $_FILES["logo"]["error"];
    $imgSize = $_FILES["logo"]["size"];

    if (isset($img) && $imgError == 0) { // upload de l'image

        $errorUploadProcess = 1;

        if ($imgSize <= 300000) {

            $infosImg = pathinfo($imgName);
            $extensionImg = $infosImg["extension"];
            $extensionsOk = array("png");

            if (in_array($extensionImg, $extensionsOk)) {
                $locationFile = $folder . '/quiz-logo.png';
                move_uploaded_file($imgTmpName, $locationFile);
                $errorUploadProcess = 0;
            } else {
                echo 'Seuls les PNG sont acceptés.'; // erreur mauvaise extension
                exit();
            }
        } else {
            echo 'Les fichiers sont limités à 300ko'; // erreur taille
            exit();
        }

    } else if (isset($img) && $imgError != 0) { // erreur dès le début
        echo 'Impossible d\'envoyer le fichier';
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <Label>Logo du site :</Label>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="file" name="logo" accept="image/png">
        <input type="submit" value="Envoyer" name="submit">
    </form>
</body>
</html>

