<?php

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

                $search_str = '%' . $search . '%'; // Permet de rechercher des articles contenant le terme de recherche (et non seulement ceux qui sont exactement égaux)

                mysqli_stmt_bind_param($article_search_prepared, 'ssssssssssss', $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str, $search_str);
                $article_search = readDB($article_search_prepared);

                mysqli_stmt_bind_param($user_search_prepared, 'sss', $search_str, $search_str, $search_str);
                $user_search = readDB($user_search_prepared);

                if (count($article_search) > 0 || count($user_search) > 0) {  
                    echo '<h2>Résultats de la recherche pour : ' . $search . '</h2>';
                    echo '<div class="search-results">';
                    if (count($article_search) > 0) {
                        echo '<h3>Articles</h3>';
                        echo '<div class="articles">';
                        for ($i = 0; $i < count($article_search); $i++) {
                            mysqli_stmt_bind_param($article_info_prepared, 'i', $article_search[$i]['id']);
                            $article_info = readDB($article_info_prepared)[0];
                            includeArticleCard(
                                $article_info['id'],
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
                    echo '</div>';
                    }
                    if (count($user_search) > 0) {
                        echo '<h3>Utilisateurs</h3>';
                        echo '<div class="users">';
                        for ($i = 0; $i < count($user_search); $i++) {
                            echo '<a href="/src/pages/profile.php?id='.$user_search[$i]['id'].'">';
                            echo '<div class="user">';
                            echo '<div class="user-image">';
                            echo profilePicture(false, $user_search[$i]['id']);
                            echo '</div>';
                            echo '<div class="user-info">';
                            echo '<p>'.$user_search[$i]['username'].'</p>';
                            echo '<p>'.$user_search[$i]['role'].'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<h2>Aucun résultat ne correspond à votre recherche.</h2>';
                }
            ?>
        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>