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
        $mysqli = connectionDB();
        require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

        // __________Get article id__________
        // if there is no GET param
        if (isset($_GET["id"])) {
            $article_id = $_GET["id"];
        } else {
            header('Location: ../../index.php');
            exit;
        }


        // __________Get all useful info__________
        $article = readQuery($mysqli, "SELECT * FROM article WHERE id = $article_id");

        // if the article isnt in the db
        if (empty($article)) {
            header('Location: ../../index.php');
            exit;
        }

        $game = readQuery($mysqli, 'SELECT * FROM game WHERE id = '. $article[0]["gameID_article"]);
        $game_category = readQuery($mysqli, 'SELECT category FROM gamecategories WHERE gameID_category = ' . $game[0]["id"]);
        $game_platforms = readQuery($mysqli, 'SELECT platform FROM gameplatforms WHERE gameID_platform = ' . $game[0]["id"]);

        $platforms = array();
        foreach($game_platforms as $row) {
            $platforms[] = $row["platform"];
        }

        $categories = array();
        foreach ($game_category as $row) {
            $categories[] = $row['category'];
        }
        $author = readQuery($mysqli, 'SELECT * FROM user WHERE id = ' .$article[0]["authorID_article"]);
        
        $game[0] = array_merge($game[0], array("cover-path" => COVERS_FOLDER_PATH . 'cover-' . $game[0]["id"] . '.png'));
        $game[0] = array_merge($game[0], array("categories" => $categories));
        $article[0]["content"] = json_decode($article[0]["content"]);
        $article[0]["points"] = json_decode($article[0]["points"]);


        // __________Temp tests__________

        includeHead('/src/styles/pages/article.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <?php 
                includeArticleHeader($game[0]["id"], $game[0]["title"], $article[0]["title"], $author[0]["username"]);

                includeArticleRecap($game[0]["title"], $game[0]["releaseDate"], $game[0]["categories"], $game[0]["price"], $game[0]["synopsis"], $game[0]["cover-path"], $article[0]["rating"], 95, $platforms);
            ?>


            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-white.svg" alt="divider">


            <?php
                includeArticleContent($article_id, $game[0]["title"], $article[0]["title"], $article[0]["content"], $article[0]["rating"], $article[0]["points"])
            ?>


            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-black.svg" alt="divider">


            <section class="review-section">
                
                <div class="review-section-title">
                    Avis des internautes
                </div>

                <div class="review-list-container">

                <?php
                    includeReview("Nagui", "/assets/images/pp/nagui.jpg", "12 janvier 2024", "11", "09", "Nul.", "Cyberpunk 2077 ? Plus un foutu désastre qu'un jeu. Ces enfoirés de chez CD Projekt Red ont réussi à nous balancer un tas de merde mal finie au visage et à appeler ça un chef d\'oeuvre. Des putains de bugs à chaque putain de coin de rue, des graphismes qui ressemblent à du vomi numérique, et une histoire aussi plate qu\'une vieille bière laissée au soleil. Sur console ? C\'est comme essayer de jouer sur une console en carton. J\'ai plus perdu mon temps avec ce jeu qu'à essayer de trouver du PQ pendant le confinement. Évitez cette bouse comme la peste, sérieux.")
                ?>

                </div>
            
            </section>

        </main>

        <?php includeFooter(); ?>

    </body>

    <?php
        closeDB($mysqli);
    ?>


</html>