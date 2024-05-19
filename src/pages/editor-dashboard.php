<?php

// Affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
require_once(DOCUMENT_ROOT . '/src/utils/article.php');

require_once(DOCUMENT_ROOT . '/src/static/head.php');
require_once(DOCUMENT_ROOT . '/src/static/header.php');
require_once(DOCUMENT_ROOT . '/src/static/footer.php');
require_once(DOCUMENT_ROOT . '/src/static/nav.php');

require_once(DOCUMENT_ROOT . '/src/components/article-card.php');
require_once(DOCUMENT_ROOT . '/src/components/article-content.php');


?>
<!DOCTYPE html>

<html lang="fr">
    

    <?php


        includeHead('/src/styles/pages/editor-dashboard.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>
        <script src="../components/editor-dashboard.js"></script>

        <main>

        <div class="content-wrapper">

            <section class="title-section">
                <div class="title-container">
                    <img src="/assets/icons/edit.svg" alt="Icone éditer">
                    <h1 class="title">
                        Options d'édition
                    </h1>
                </div>
            </section>



            <section class="options-section">

                <div class="option-wrapper">
                    <a class="option-container unselected" onclick="optionSelected(this)">
                        <img class="option-icon" src="/assets/icons/game-creator.svg" alt="Manette de jeu vidéo">
                        <div class="option-title">
                            Ajouter un jeu
                        </div>
                        <div class="tick">
                            <img src="/assets/icons/tick.svg" alt="tick">
                        </div>
                        
                    </a>
                </div>

                <div class="option-wrapper">
                    <a class="option-container selected" onclick="optionSelected(this)">
                        <img class="option-icon" src="/assets/icons/article-creator.svg" alt="Manette de jeu vidéo">
                        <div class="option-title">
                            Ajouter un article
                        </div>
                        <div class="tick">
                            <img src="/assets/icons/tick.svg" alt="tick">
                        </div>
                    </a>
                </div>

                <div class="option-wrapper">
                    <a class="option-container unselected" onclick="optionSelected(this)">
                        <img class="option-icon" src="/assets/icons/article-editor.svg" alt="Manette de jeu vidéo">
                        <div class="option-title">
                            Modifier un article
                        </div>
                        <div class="tick">
                            <img src="/assets/icons/tick.svg" alt="tick">
                        </div>
                        
                    </a>
                </div>

            </section>


            <section class="form-section">
                <form id="article-creator-form" class="option-form" action="">
                    <label for="game">Ajouter un article sur :</label>
                    <input id="game" name="name" type="text" placeholder="Choix du jeu...">
                </form>
            </section>


        </div>


        </main>

        <?php includeFooter(); ?>

    </body>

    <?php
        closeDB($mysqli);
    ?>


</html>