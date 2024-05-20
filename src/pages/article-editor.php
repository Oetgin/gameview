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
require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
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

        // Check that the user is logged in and that he is an editor or an admin
        if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || ($_SESSION['role'] != 'Éditeur' && $_SESSION['role'] != 'Administrateur')){
            header('Location: ../../index.php');
            exit;
        }

        // __________Get concerned game id__________
        // if there is no GET param
        if (isset($_GET["id"])) {
            $game_id = $_GET["id"];
        } else {
            header('Location: ../../index.php');
            exit;
        }


        // __________Get all useful info__________
        $game_title = readQuery($mysqli, "SELECT title FROM game WHERE id = $game_id");
        $game_cover_path = COVERS_FOLDER_PATH . 'cover-' . $game_id . '.png';

        $author_id = getId();
        echo $author_id;

        // if the article isnt in the db
        if (empty($game_title)) {
            header('Location: ../../index.php');
            exit;
        } else {
            $game_title = $game_title[0]["title"];
        }

        
        // __________If the game already has an article__________
        $article_id = readQuery($mysqli, "SELECT id FROM article WHERE gameID_article = $game_id");
        if (empty($article_id)) {
            $article_id = -1;                       // It means it's a new article
        } else {
            $article_id = $article_id[0]["id"];     // already exists

            $article = readQuery($mysqli, "SELECT * FROM article WHERE id = $article_id");

            $article[0]["content"] = json_decode($article[0]["content"]);
            $article[0]["points"] = json_decode($article[0]["points"]);
        }
        


        // __________Temp tests__________
        includeHead('/src/styles/pages/article-editor.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>
        <script src="../components/article-editor.js"></script>

        <main>

            <div class="content-wrapper">

                <section class="title-section">
                    <div class="title-container">
                        <img src="/assets/icons/edit.svg" alt="Icone éditer">
                        <h1 class="title">
                            Éditeur d'article
                        </h1>
                    </div>

                    <p class="description">
                        Vous rédigez un article à propos du jeu <?php echo $game_title; ?>
                    </p>

                    <img class="cover" src="<?php echo $game_cover_path ?>" alt="Cover du jeu <?php echo $game_title; ?>">

                </section>


                <section class="editor-section">

                    <div class="editor-title">
                        Contenu de l'article
                    </div>

                    <form id="article-editor-form" method="post" action="<?php echo '../actions/post-article.php?game_id=' .$game_id. '&author_id=' .$author_id. '&article_id=' .$article_id ?>" enctype="multipart/form-data">
                        
                        <div id="all-inputs-container" class="all-inputs-container">
                            <div class="input-container">
                                <label for="title-0">Titre</label>
                                <input class="input" id="title-0" name="title-0" type="text" maxlength="199" value="" required>
                            </div>

                            <div class="input-container">
                                <label for="description-0">Description</label>
                                <input class="input" id="description-0" name="description-0" type="text" maxlength="100" value="" required>
                            </div>

                            <div class="input-container">
                                <label for="intro-0">Introduction</label>
                                <textarea class="input" id="intro-0" name="intro-0" rows="5" value="" required></textarea>
                            </div>
                        </div>

                        <div class="add-container">
                            <a id="add-part-title" class="btn add-btn" onclick="addPartTitleInput()">
                                <img class="add-icon" src="/assets/icons/add.svg" alt="Icone ajouter">
                                <div class="add-btn-content">
                                    Titre de partie
                                </div>
                            </a>

                            <a id="add-corpus" class="btn add-btn" onclick="addCorpusInput()">
                                <img class="add-icon" src="/assets/icons/add.svg" alt="Icone ajouter">
                                <div class="add-btn-content">
                                    Contenu texte
                                </div>
                            </a>

                            <a id="add-image" class="btn add-btn" onclick="addImageInput()">
                                <img class="add-icon" src="/assets/icons/add.svg" alt="Icone ajouter">
                                <div class="add-btn-content">
                                    Image
                                </div>
                            </a>
                        </div>

                        <div class="points-container">

                            <div class="points-title-container">
                                <div class="points-title">
                                    Points positifs/négatifs
                                </div>
                                <div class="points-info-msg">
                                    Entez au moins un point positif et un point négatif
                                </div>
                            </div>

                            <div class="all-points-container">
                                    
                                <div class="input-container">
                                    <label for="positive[]">
                                        Points positifs
                                    </label>

                                    <div class="input all-points">
                                    
                                        <div class="point-container">
                                            <div class="point-name">
                                                Point positif 1
                                            </div>
                                            <input class="input positive" id="positive-point-1" name="positive[]" type="text" maxlength="199" value="" required>
                                        </div>
                                        
                                        <div class="point-container">
                                            <div class="point-name">
                                                Point positif 2
                                            </div>
                                            <input class="input positive" id="positive-point-2" name="positive[]" type="text" maxlength="199" value="">
                                        </div>

                                        <div class="point-container">
                                            <div class="point-name">
                                                Point positif 3
                                            </div>
                                            <input class="input positive" id="positive-point-3" name="positive[]" type="text" maxlength="199" value="">
                                        </div>

                                        <div class="point-container">
                                            <div class="point-name">
                                                Point positif 4
                                            </div>
                                            <input class="input positive" id="positive-point-4" name="positive[]" type="text" maxlength="199" value="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="all-points-container">
                                    
                                <div class="input-container">
                                    <label for="negative[]">
                                        Points négatifs
                                    </label>
                                    
                                    <div class="input all-points">
                                    
                                        <div class="point-container">
                                            <div class="point-name">
                                                Point négatif 1
                                            </div>
                                            <input class="input negative" id="negative-point-1" name="negative[]" type="text" maxlength="199" value="" requiered>
                                        </div>
                                        
                                        <div class="point-container">
                                            <div class="point-name">
                                                Point négatif 2
                                            </div>
                                            <input class="input negative" id="negative-point-2" name="negative[]" type="text" maxlength="199" value="">
                                        </div>

                                        <div class="point-container">
                                            <div class="point-name">
                                                Point négatif 3
                                            </div>
                                            <input class="input negative" id="negative-point-3" name="negative[]" type="text" maxlength="199" value="">
                                        </div>

                                        <div class="point-container">
                                            <div class="point-name">
                                                Point négatif 4
                                            </div>
                                            <input class="input negative" id="negative-point-4" name="negative[]" type="text" maxlength="199" value="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="grade-container">

                            <div class="all-inputs-container">
                                <div class="input-container">
                                    <label for="rating">Note finale (/100)</label>
                                    <input class="input" id="rating-0" name="rating" type="number" value="" min="0" max="100" required>
                                </div>
                            </div>
                            
                        </div>

                        <div class="submit-container">
                            <input class="btn submit-btn" type="submit" value="Poster l'article">
                        </div>

                    </form>

                <?php

                // To fill the inputs if the article already exists
                if ($article_id != -1) {
                    $part_title_number = 0;
                    $corpus_number = 0;
                    $image_number = 0;

                    // Fill the title
                    echo '<script type="text/javascript">fillInput("title", 0, "'.$article[0]["title"].'");</script>';

                    // Fill the rating
                    echo '<script type="text/javascript">fillInput("rating", 0, "'.$article[0]["rating"].'");</script>';

                    // Display the requiered text areas so that the article is pre filled
                    foreach ($article[0]["content"] as $key => $value){
                        $current_type = $value[0];
                        $current_content = json_encode($value[1]);

                        if ($current_type == "intro") {

                            echo '<script type="text/javascript">fillInput("intro", 0, '.$current_content.');</script>';

                        } else if ($current_type == "part-title") {

                            echo '
                            <script type="text/javascript">
                                addPartTitleInput();
                                fillInput("part-title", '.$part_title_number.', '.$current_content.');
                            </script>
                            ';

                            $part_title_number ++;

                        } else if ($current_type == "corpus") {
                            
                            echo '
                            <script type="text/javascript">
                                addCorpusInput();
                                fillInput("corpus", '.$corpus_number.', '.$current_content.');
                            </script>
                            ';

                            $corpus_number ++;

                        } else if ($current_type == "image") {
                            $current_content = array($value[1][0], $value[1][2], $value[1][1]);
                            $current_content = json_encode($current_content);
                            $img_path = '/assets/images/articles/article-'.$article_id.'/img-'.$image_number.'.png';

                            echo '
                            <script type="text/javascript">
                                addImageInput("'.$img_path.'");
                                fillInput("image", '.$image_number.', '.$current_content.', "yes");
                            </script>
                            ';

                            $image_number ++;
                        }
                    }

                    // Fill the descrpition
                    echo '
                    <script type="text/javascript">
                        fillInput("description", 0, "'.$article[0]["description"].'");
                    </script>
                    ';
                    
                    // Fill the positive points
                    foreach ($article[0]["points"][0] as $key => $point) {

                        echo '<script type="text/javascript">fillInput("positive-point", '.($key+1).', "'.$point.'");</script>';

                    }

                    // Fill the negative points
                    foreach ($article[0]["points"][1] as $key => $point) {

                        echo '<script type="text/javascript">fillInput("negative-point", '.($key+1).', "'.$point.'");</script>';

                    }
                }
            
                ?>

                </section>


                <section class="points-section">

                </section>

            </div>

        </main>

        <?php includeFooter(); ?>

    </body>

    <?php
        closeDB($mysqli);
    ?>


</html>