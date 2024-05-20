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

        // Check that the user is an admin
        if (!getRole() || !isAdmin()){
            header('Location: ../../index.php');
            exit;
        }

        // Get games
        $games = readQuery($mysqli, "SELECT id, title from game");
        $games_with_article = readQuery($mysqli, "SELECT game.id as game_id, game.title as game_title, article.id as article_id, article.title as article_title
                                                  FROM game INNER JOIN article
                                                  WHERE game.id = article.gameID_article");
        

        // Preselect in case of error
        $article_creator_form_visibility = "unselected";
        $article_editor_form_visibility = "unselected";
        $game_creator_form_visibility = "unselected";
        $article_creator_option_selection = "unselected";
        $article_editor_option_selection = "unselected";
        $game_creator_option_selection = "unselected";
        $article_creator_error_visibility = "hidden";
        $article_editor_error_visibility = "hidden";

        if(isset($_GET["select"])) {
            $select = $_GET["select"];
            if ($select == "article-creator") {
                $article_creator_form_visibility = "selected";
                $article_creator_error_visibility = "visible";
                $article_creator_option_selection = "selected";
            } else if ($select == "article-editor") {
                $article_editor_form_visibility = "selected";
                $article_editor_error_visibility = "visible";
                $article_editor_option_selection = "selected";
            } else if ($select == "game-creator") {
                $game_creator_form_visibility = "selected";
                $game_creator_option_selection = "selected";
            }
        }


        includeHead('/src/styles/pages/dashboard.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>
        <script src="../components/editor-dashboard.js"></script>

        <main>

        <div class="content-wrapper">

            <section class="title-section">
                <div class="title-container">
                    <img src="/assets/icons/shield.png" alt="Icone éditer">
                    <h1 class="title">
                        Modération
                    </h1>
                </div>
                <?php
                    if(isset($_GET["msg"])) {
                        $msg_visibility = "visible";
                        $msg = $_GET["msg"];
                    } else {
                        $msg_visibility = "hidden";
                        $msg = "";
                    }

                    echo '
                        <div class="game-msg '.$msg_visibility.'">
                            '.$msg.'
                        </div>
                    ';
                ?>
            </section>



            <section class="options-section">

                <div class="option-wrapper">
                    <a id="game-creator-option" class="option-container <?php echo $game_creator_option_selection ?>" onclick="optionSelected(this)">
                        <img class="option-icon" src="/assets/icons/comments.svg" alt="Manette de jeu vidéo">
                        <div class="option-title">
                            Voir les derniers commentaires
                        </div>
                        <div class="tick">
                            <img src="/assets/icons/tick.svg" alt="tick">
                        </div>
                        
                    </a>
                </div>

                <div class="option-wrapper">
                    <a id="role-option" class="option-container <?php echo $article_creator_option_selection ?>" onclick="optionSelected(this)">
                        <img class="option-icon" src="/assets/icons/role.png" alt="Profil utilisateur role">
                        <div class="option-title">
                            Modifier un rôle
                        </div>
                        <div class="tick">
                            <img src="/assets/icons/tick.svg" alt="tick">
                        </div>
                    </a>
                </div>

                <div class="option-wrapper">
                    <a id="article-editor-option" class="option-container <?php echo $article_editor_option_selection ?>" onclick="optionSelected(this)">
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
                <form method="post" id="role-form" class="option-form <?php echo $article_creator_form_visibility ?>" action="<?php echo '../actions/edit-user.php'; ?>">
                    <label class="choice-label" for="role">Attribuer le rôle :</label>
                    <select class="select-input" name="role" id="role">
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Éditeur">Éditeur</option>
                        <option value="Administrateur">Administrateur</option>
                    </select>

                    <label class="choice-label" for="user">À l'utilisateur :</label>
                    <select class="select-input" name="user" id="user">
                        <?php
                            $all_users = readQuery($mysqli, "SELECT id, username FROM user");
                            foreach($all_users as $key => $value) {
                                $current_user_username = $value["username"];
                                echo '<option value="' .$current_user_username. '">'.$current_user_username.'</option>';
                            }
                        ?>
                    </select>

                    <div class="submit-container">
                        <input class="btn submit-btn" type="submit" value="Valider">
                    </div>
                    
                </form>

                <form method="post" id="article-editor-form" class="option-form <?php echo $article_editor_form_visibility ?>" action="<?php echo '../actions/editor-redirect.php?redirect=article-editor'; ?>">
                    <label class="choice-label" for="article-editor">Modifier l'article sur</label>
                    <input class="choice-input" id="game" name="article-editor" list="articles" required autocomplete="off" placeholder="Choix de l'article...">
                    <datalist id="articles">
                        <?php
                            foreach($games_with_article as $key => $value) {
                                $current_game_title = stripslashes($value["game_title"]);
                                $current_article_title = stripslashes($value["article_title"]);
                                $current_game_id = $value["game_id"];
                                echo '<option value="' .$current_game_title. ' - ' .$current_article_title. ' - ('.$current_game_id.')'.'"></option>';
                            }
                        ?>
                    </datalist>
                    <div class="error-msg <?php echo $article_editor_error_visibility ?>">
                        <?php
                            if(isset($_GET["error"])) {
                                echo $_GET["error"]; 
                            }   
                        ?>
                    </div>
                    <div class="submit-container">
                        <input class="btn submit-btn" type="submit" value="Continuer">
                    </div>
                </form>

                <form method="post" id="game-creator-form" class="option-form <?php echo $game_creator_form_visibility ?>" action="<?php echo '../actions/editor-redirect.php?redirect=game-creator'; ?>">
                    <div class="comments">
                        <?php
                            $all_comments_query = "SELECT * FROM comment";
                            $all_comments = readQuery($mysqli, $all_comments_query);
                            if (count($all_comments) > 0) {
                                for ($i = 0; $i < count($all_comments); $i++) {
                                    $comment = $all_comments[$i];
                                    echo '
                                    <div class="comment">
                                        <p class="comment-title">'.$comment['title'].'</p>
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