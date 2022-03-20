<?php

function quizDisplayer(string $titre, string $imgUrl, string $auteur, array $questions) : void {
    echo "<a href='?titre=$titre#' style='text-decoration: none; color: initial;'>
            <article id='' class='' style='padding: 15px; border: 2px solid magenta; margin: 10px 0'>
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
            </article>
          </a>";
}