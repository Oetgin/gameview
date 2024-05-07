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

require_once(DOCUMENT_ROOT . '/src/static/head.php');
require_once(DOCUMENT_ROOT . '/src/static/header.php');
require_once(DOCUMENT_ROOT . '/src/static/footer.php');
require_once(DOCUMENT_ROOT . '/src/static/nav.php');

require_once(DOCUMENT_ROOT . '/src/components/article-card.php');


?>
<!DOCTYPE html>

<html lang="fr">
    

    <?php
        $mysqli = connectionDB();
        includeHead('/src/styles/pages/article.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <section class="title-section">
                <div class="title-content">
                    <h2 class="game">Cyberpunk 2077</h2>
                    <p class="title">"A masterpiece of the genre"</p>
                    <p class="reviewer">A review by John Doe</p>
                </div>
                <div class="background-video">
                    <video class="boomerang" id="background-video" autoplay loop muted plays-inline>
                        <source src="/assets/videos/cyberpunk.webm" type="video/webm">
                    </video>
                    <div class="gradient"></div>
                </div>
            </section>


            <section class="recap-section">
                <div class="game-container">
                    <img class="cover" src="/assets/images/covers/cyberpunk-cover.jpg" alt="Cyberpunk Cover">
                    <div class="game-info-container">
                        <p class="game-title">Cyberpunk 2077</p>
                        <p class="release-date"><span class="underline">Date de sortie :</span> 10 décembre 2020</p>
                        <p class="devs"><span class="underline">Développeurs :</span> CD Projekt RED</p>
                        <p class="game-type"><span class="underline">Genre :</span> RPG, FPS</p>
                        <p class="-game-description">Cyberpunk 2077 est un jeu vidéo d'action-RPG en vue à la première personne développé par CD Projekt RED et édité par CD Projekt, inspiré du jeu de rôle sur table Cyberpunk 2020 conçu par Mike Pondsmith.</p>
                    </div>
                </div>

                <div class="reviews-container">
                        <div class="grade-container">
                            <div class="grade global-grade average">
                                86
                            </div>
                            <div class="grades-info-container">
                                <p class="grade-info-title">Note moyenne</p>
                                <p class="grade-info-more">Généralement favorable</p>
                            </div>
                        </div>
                        <div class="grade-container">
                            <div class="grade global-grade good">
                                95
                            </div>
                            <div class="grades-info-container">
                                <p class="grade-info-title">Votre note</p>
                                <p class="grade-info-more">Très favorable</p>
                            </div>
                        </div>
                </div>
            </section>

            <img class="divider triangle" src="/assets/images/utils/triangle-divider.svg" alt="divider">

            <section class="article-section">

            </section>
        </main>
    <script src="front.js"></script>
    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>