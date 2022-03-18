<?php

// list of quiz
require '../controller/quizList.inc.php';

// functions
require '../controller/quiz.func.php';

    if (isset($_GET['titre'])) {
        $quizToDisplay = $_GET['titre'];
    } elseif (isset($_GET['filtre'])) {
        $filtre = $_GET['filtre'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <header>
        <img src="./images/quiz-logo.png" alt="logo">
        <a href="index.php"><h1>Titre du site</h1></a>
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
    <div id="quiz-display" style="max-width: 500px; margin: auto">
    <?php
            $cpt = 0;
            foreach ($list as $quiz) {
                $titre = $quiz['Titre'];

                if(isset($quizToDisplay)) {

                    if ($quiz['Titre'] == $quizToDisplay) {
                        quizDisplayer($quiz['Titre'], $quiz['Illustration'], $quiz['Auteur'], $quiz['Questions']);
                    }
                } else {
                    if (isset($filtre)) {
                        if (str_contains($titre, $filtre) || str_contains(strtolower($titre), $filtre)) {
                            quizDisplayer($quiz['Titre'], $quiz['Illustration'], $quiz['Auteur'], $quiz['Questions']);
                            $cpt++;
                        }
                    } elseif (!isset($filtre)) {
                        quizDisplayer($quiz['Titre'], $quiz['Illustration'], $quiz['Auteur'], $quiz['Questions']);
                    }
                }
            }

            if (isset($filtre) && $cpt == 0) { ?>
                <h3>Pas de résultat !</h3>
            <?php } ?>
    </div>
    <footer>
        MON FOOTER, PAS LE TIEN &copy;
    </footer>
</body>
</html>