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
        includeHead('/src/styles/pages/profile.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>

        <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

            require_once(DOCUMENT_ROOT . '/src/utils/login.php');
            
            if (!loggedIn()) {
                require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');
                redirect('/src/pages/login.php', 'error', 'You must log in');
            }
            
            else {
                require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
                $user_id = getId();
                
                mysqli_stmt_bind_param($user_info_prepared, 'i', $user_id);
                $user_info = readDB($user_info_prepared)[0];
        ?>
        <h2>Profil</h2>
        <div class="profile">
            <div class="profile-main">
                <div class="profile-user">
                    <div class="profile-picture">
                        <img src="/assets/images/pp/pp-<?php echo $user_id; ?>.png?<?php echo intval(microtime(true)) ?>" alt="<?php echo $user_info['username']; ?>">
                    </div>
                    <p class="username"><?php echo $user_info['username']; ?></p>
                </div>
                <div class="profile-info">
                    <p class="email"><?php echo $user_info['email']; ?></p>
                    <div class="name">
                        <p class="surname"><?php echo $user_info['surname']; ?></p>
                        <p class="name"><?php echo $user_info['name']; ?></p>
                    </div>
                    <p class="birthdate"><?php echo $user_info['birthdate']; ?></p>
                    <p class="role"><?php echo $user_info['role']; ?></p>
                </div>
            </div>
            <div class="bio">
                <h3>Bio</h3>
                <p><?php echo ($user_info['bio']==null?"Cet utilisateur n'a pas de bio":$user_info['bio']); ?></p>
            </div>
            <a href="/src/pages/updateProfile.php">
                <button type="submit" class="button">Modifier mon profil</button>
            </a> 
            <div class="profile-stats">
                <p class="last-connection">Dernière connexion : <?php echo $user_info['lastConnection']; ?></p>
                <p class="comment-count">Commentaires : <?php echo $user_info['commentCount']; ?></p>
                <p class="article-count">Articles : <?php echo $user_info['articleCount']; ?></p>
            </div>
            <a href="/src/utils/logout.php" class="logout">
                <button type="submit" class="button button-danger">Se déconnecter</button>
            </a>
            <div class="user-content">
                <h3>Articles</h3>
                <div class="articles">
                    <?php
                        mysqli_stmt_bind_param($user_articles_prepared, 'i', $user_id);
                        $user_articles = readDB($user_articles_prepared);
                        if (count($user_articles) > 0) {
                            for ($i = 0; $i < count($user_articles); $i++) {
                                $article = $user_articles[$i];
                                mysqli_stmt_bind_param($article_info_prepared, 'i', $article['id']);
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
                        }
                        else {
                            echo '<p>Aucun article</p>';
                        }
                    ?>
                </div>
                <h3>Commentaires</h3>
                <div class="comments">
                    <?php
                        mysqli_stmt_bind_param($user_comments_prepared, 'i', $user_id);
                        $user_comments = readDB($user_comments_prepared);
                        if (count($user_comments) > 0) {
                            for ($i = 0; $i < count($user_comments); $i++) {
                                $comment = $user_comments[$i];
                                echo '
                                <div class="comment">
                                    <p class="comment-content">'.$comment['content'].'</p>
                                    <p class="comment-date">'.$comment['creationDate'].'</p>
                                    <a href="/src/pages/article.php?id='.$comment['articleID_comment'].'">Voir l\'article</a>
                                </div>
                                ';
                            }
                        }
                        else {
                            echo '<p>Aucun commentaire</p>';
                        }
                    ?>
                </div>
            </div>
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