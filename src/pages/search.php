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
        require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
        includeHead('/src/styles/pages/search.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <?php
                $search = $_GET['search'];

                if (empty($search)) {
                    echo '<p>Veuillez entrer un terme de recherche.</p>';
                    exit();
                }

                mysqli_stmt_bind_param($article_search_prepared, 'ssss', $search, $search, $search, $search);
                $article_search = readDB($article_search_prepared);

                if (count($article_search) > 0) {
                    echo '<h2>Résultats de la recherche pour : ' . $search . '</h2>';
                    for ($i = 0; $i < count($article_search); $i++) {
                        mysqli_stmt_bind_param($article_info_prepared, 'i', $article_search[$i]['id']);
                        $article_info = readDB($article_info_prepared);
                        includeArticleCard(
                            $article['id'],
                            $article_info['gameTitle'],
                            $article_info['cover'],
                            $article_info['title'],
                            $article_info['description'],
                            $article_info['rating'],
                            $article_info['username'],
                            $article_info['role'],
                            $article_info['pp']
                    );
                    }
                } else {
                    echo '<p>Aucun article ne correspond à votre recherche.</p>';
                }
            ?>
        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>