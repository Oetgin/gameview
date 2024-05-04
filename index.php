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


?>
<!DOCTYPE html>

<html lang="fr">
    

    <?php
        $mysqli = connectionDB();
        includeHead('/src/styles/pages/index.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <div class="main-logo">
                <img src="/assets/icons/logo/full/logo-text-black-blue.svg" alt="logo">
            </div>

            <div class="section-title">
                <h2>Nouveaux articles</h2>
            </div>
            
            <?php
            /* TODO */
            ?>

            <!-- CARD TEST -->
            <div class="article-card">
                <div class="article-card-image">
                    <img src="assets/images/covers/cyberpunk-cover.jpg" alt="CP2077">
                    <div class="article-card-image-title">
                        <h3>Minecraft</h3>
                    </div>
                </div>
                    <div class="article-card-content">
                    <div class="article-card-title">
                        <h3>“THE classic everyone has to play”</h3>
                    </div>
                    [Scorebar]
                    <div class="article-card-description">
                        <p>Exploring the most sold game of all time in detail, from it's creation to now.</p>
                    </div>
                    <div class="article-card-author">
                        <div class="article-card-author-info">
                            <p>John Smith</p>
                            <p>Reviewer</p>
                        </div>
                        <div class="article-card-author-image">
                            <img src="" alt="John Smith">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD TEST -->

        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>