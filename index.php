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

require_once(DOCUMENT_ROOT . '/src/utils/login.php');
require_once(DOCUMENT_ROOT . '/src/utils/user.php');


?>
<!DOCTYPE html>

<html lang="fr">
    
    
    <?php
        $mysqli = connectionDB();
        require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
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
            
            <div class="articles">
            <?php
            $page_length = 5;

            $get_articles = readQuery($mysqli, $get_articles_query);

            // Pas d'articles 
            if (count($get_articles) == 0) {
                echo '<div class="no-articles">Aucun article n\'a été publié pour le moment...</div>';
            }

            else {
                // Récupération de la page actuelle
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                for ($i = ($page-1)*$page_length; $i < ($page-1)*$page_length+$page_length; $i++) {
                    if ($i >= count($get_articles)) {
                        // Fin de la liste d'articles
                        break;
                    }
                    $article = $get_articles[$i];
                    
                    mysqli_stmt_bind_param($article_info_prepared, "i", $article['id']);
                    $article_info = readDB($article_info_prepared)[0];

                    mysqli_stmt_bind_param($game_platform_prepared, "i", $article_info['gameId']);
                    $game_platform = readDB($game_platform_prepared);

                    includeArticleCard(
                        $article['id'],
                        $article_info['gameTitle'],
                        $article_info['gameId'],
                        $article_info['title'],
                        $article_info['description'],
                        $article_info['rating'],
                        $article_info['username'],
                        $article_info['role'],
                        $article_info['authorId'],
                    );
                }
            }

            // Pagination
            ?>
                <div class="pagination">
                    <h3>Plus <br/> d'articles</h3>
                    <div class="pagination-nav">
                        <?php 
                        $pagecount = ceil(count($get_articles)/$page_length);
                        $lastpage = $page == $pagecount;

                        echo '<button type="button" class="page-button previous-page" onclick="window.location.href=\'/index.php?page=' . ($page-1) . '\'" '. ($page==1?'disabled':'') .'><img src="/assets/icons/previous.svg" alt="Previous"></button>';
                        echo '<h4 class="page-number">Page ' . $page . '/'. $pagecount . '</h4>';
                        echo '<button type="button" class="page-button next-page" onclick="window.location.href=\'/index.php?page=' . ($page+1) . '\'" '. ($lastpage?'disabled':'') .'><img src="/assets/icons/next.svg" alt="Next"></button>';
                        ?> 
                    </div>
                </div>
            </div>

            <?php 
                if (loggedIn() && isEditor()) {
            ?>    
            <div class="create-article">
                <a href="/src/pages/article-editor.php" class="button">
                        Créer un article
                </a>
            </div>
            <?php
                }
            ?>

        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>