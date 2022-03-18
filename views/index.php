<?php

// list of quiz
require '../controller/quizList.inc.php';

// functions
require '../controller/quiz.func.php';

    if (isset($_GET['filtre'])) {
        $filtre = $_GET['filtre'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <div>
        <form action="#" method="get">
            <label>
                Filtre :
                <input name="filtre" type="text" placeholder="<?= $filtre ?? 'Recherche' ?>">
            </label>
        </form>
    </div>
    <div id="quiz-display">
    <?php
            $cpt = 0;
            foreach ($list as $quiz) {
                $titre = $quiz['Titre'];
                if (isset($filtre) && str_contains($titre, $filtre) || str_contains(strtolower($titre), $filtre)) {
                    quizDisplayer($quiz['Titre'], $quiz['Illustration'], $quiz['Auteur'], $quiz['Questions']);
                    $cpt++;
                } elseif (!isset($filtre)) {
                    quizDisplayer($quiz['Titre'], $quiz['Illustration'], $quiz['Auteur'], $quiz['Questions']);
                }
            }

            if ($cpt == 0) { ?>
                <h3>Pas de résultat !</h3>
            <?php } ?>
    </div>
</body>
</html>