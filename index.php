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
            <div style="display: grid; grid-template-columns: auto auto; justify-content: center;">
            <?php
                includeArticleCard(
                    "Cyberpunk 2077",
                    "assets/images/covers/cyberpunk-cover.jpg",
                    "A masterpiece of the genre",
                    "Exploring the most anticipated game of the decade in detail, from it's creation to now.",
                    9,
                    "John Smith",
                    "Reviewer",
                    ""
                );
                includeArticleCard(
                    "The Witcher 3",
                    "",
                    "One of the best RPGs of all time",
                    "A deep dive into the world of The Witcher 3, exploring the game's mechanics and story.",
                    7,
                    "Jane Doe",
                    "Reviewer",
                    ""
                );
                includeArticleCard(
                    "The Elder Scrolls V: Skyrim",
                    "",
                    "A classic that never gets old",
                    "A retrospective on the game that has been released on every platform",
                    8,
                    "John Doe",
                    "Reviewer",
                    ""
                );
                includeArticleCard(
                    "Red Dead Redemption 2",
                    "",
                    "A masterpiece of storytelling",
                    "A deep dive into the world of Red Dead Redemption 2, exploring the game's mechanics and story.",
                    9,
                    "John Smith",
                    "Reviewer",
                    ""
                );
                includeArticleCard(
                    "The Last of Us Part II",
                    "",
                    "A controversial sequel",
                    "A review of the game that divided fans and critics alike",
                    4.5,
                    "Jane Doe",
                    "Reviewer",
                    ""
                );
            ?>
            </div>

        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>