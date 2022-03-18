<?php

function quizDisplayer(string $titre, string $imgUrl, string $auteur, array $questions) : void {
    echo "<article id='' class=''>
                        <div>
                            <img src='$imgUrl'>
                            <h3>Quiz \"$titre\" de <span>$auteur</span></h3>
                        </div>
                        <div>
                            <h4>Questions du quiz :</h4>
                            <ul>";
                                foreach ($questions as $question) {
                                    echo "<li>$question</li>";
                                }
                            echo "</ul>
                        </div>
                    </article>";
}