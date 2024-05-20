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
require_once(DOCUMENT_ROOT . '/src/utils/login.php');
require_once(DOCUMENT_ROOT . '/src/utils/user.php');

require_once(DOCUMENT_ROOT . '/src/static/head.php');
require_once(DOCUMENT_ROOT . '/src/static/header.php');
require_once(DOCUMENT_ROOT . '/src/static/footer.php');
require_once(DOCUMENT_ROOT . '/src/static/nav.php');

require_once(DOCUMENT_ROOT . '/src/components/article-card.php');
require_once(DOCUMENT_ROOT . '/src/components/article-content.php');
require_once(DOCUMENT_ROOT . '/src/components/review.php');

?>
<!DOCTYPE html>

<html lang="fr">
    
    
    <?php
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

        mysqli_stmt_bind_param($get_average_rating_prepared, 'i', $article_id);
        $average_rating = readDB($get_average_rating_prepared)[0];

        if (!is_null($average_rating) && isset($average_rating["average"])) {
            $average_rating = $average_rating["average"];
        }
        else {
            $average_rating = null;
        }

        // __________Temp tests__________

        includeHead('/src/styles/pages/article.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <?php 
                includeArticleHeader($game[0]["id"], $game[0]["title"], $article[0]["title"], $author[0]["username"]);

                includeArticleRecap($game[0]["title"], $game[0]["releaseDate"], $game[0]["categories"], $game[0]["price"], $game[0]["synopsis"], $game[0]["cover-path"], $article[0]["rating"], $average_rating, $platforms);
            ?>


            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-white.svg" alt="divider">


            <?php
                includeArticleContent($article_id, $game[0]["title"], $article[0]["title"], $article[0]["date"], $article[0]["content"], $article[0]["rating"], $article[0]["points"])
            ?>


            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-black.svg" alt="divider">


            <section class="review-section">

                <div class="add-review-container">
                    <div class="add-review-title">
                        Vous avez joué à ce jeu ? <br/> Donnez votre avis !
                    </div>

                    <?php 
                        if (!loggedIn()) {
                            echo '<div class="add-review-login">Vous devez être connecté pour poster un avis</div>';
                            echo '<a href="src/pages/login.php" class="button">Se connecter</a>';
                        }
                        else {
                    ?>
                    <form action="/src/actions/addReview.php?id=<?php echo $article_id ?>" method="post" class="add-review-form">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" placeholder="Titre de votre avis">
                        </div>
                        <div class="form-group">
                            <label for="rating">Note</label>
                            <input type="number" name="rating" placeholder="Note sur 10" min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label for="content">Avis</label>
                            <textarea name="content" placeholder="Votre avis"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="played-time">Temps de jeu</label>
                            <input type="number" name="played-time" placeholder="Temps de jeu en heures" min="0">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button">Publier</button>
                        </div>
                    </form>
                    <?php
                        }
                    ?>
                </div>
                
                <div class="review-section-title">
                    Avis des internautes
                </div>

                <div class="review-list-container">

                <?php
                    mysqli_stmt_bind_param($get_comments_prepared, 'i', $article_id);
                    $comments = readDB($get_comments_prepared);

                    for ($i = 0; $i < count($comments); $i++) {
                        $comment = $comments[$i];
                        mysqli_stmt_bind_param($user_info_prepared, 'i', $comment["authorID_comment"]);
                        $user = readDB($user_info_prepared)[0];
                        includeReview($user["username"], profilePicture($user["id"]), $comment["creationDate"], $comment["hoursPlayed"], $comment["rating"], $comment["title"], $comment["content"], $game[0]["title"]);
                    }

                    if (count($comments) == 0) {
                        echo '<div class="no-review">Aucun avis pour le moment...</div>';
                    }
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