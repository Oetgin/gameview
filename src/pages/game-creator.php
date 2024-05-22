<?php

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

require_once(DOCUMENT_ROOT . '/src/utils/login.php');
require_once(DOCUMENT_ROOT . '/src/utils/user.php');


?>
<!DOCTYPE html>

<html lang="fr">
    

    <?php
        $mysqli = connectionDB();
        require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

        // Check that the user is logged in and that he is an editor or an admin
        if (!getRole() || (!isAdmin() && !isEditor())){
            header('Location: ../../index.php');
            exit;
        }

        $author_id = getId();

        // Prepare the redirection if the user comes from the article creation
        if(isset($_GET["redirect"])) {
            if ($_GET["redirect"] == "article-creator") {
                $header_location = "../actions/post-game.php?redirect=article-creator&author_id=".$author_id;
            } else{
                $header_location = "../actions/post-game.php";
            }
        } else{
            $header_location = "../actions/post-game.php";
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
                        <img src="/assets/icons/game-creator.svg" alt="Icone éditer">
                        <h1 class="title">
                            Ajout d'un jeu
                        </h1>
                    </div>
                    <p class="description">
                        Attention, la création d'un jeu est définitive. Veuillez vérifier les informations avant de valider. Vous ne pourrez pas les modifier par la suite.
                    </p>
                    <?php
                        if(isset($_GET["error"])) {
                            $error_visibility = "visible";
                            $error_msg = $_GET["error"];
                        } else {
                            $error_visibility = "hidden";
                            $error_msg = "";
                        }
                        echo'
                            <div class="game-error-msg '.$error_visibility.'">
                                '.$error_msg.'
                            </div>
                        ';
                    ?>
                </section>


                <section class="editor-section">

                    <div class="editor-title">
                        Ajouter un nouveau jeu à la base de données
                    </div>

                    <form id="article-editor-form" method="post" action="<?php echo $header_location ?>" enctype="multipart/form-data">
                        
                        <div id="all-inputs-container" class="all-inputs-container">
                            <div class="input-container">
                                <label for="title">Titre du jeu</label>
                                <input class="input" id="title" name="title" type="text" maxlength="199" value="" required>
                            </div>

                            <div class="input-container">
                                <label for="cover">Cover du jeu</label>
                                <input class="input" id="cover" name="cover" type="file" required>
                            </div>

                            <div class="input-container">
                                <label for="background-video">Background animé</label>
                                <input class="input" id="background-video" name="background-video" type="file">
                            </div>

                            <div class="input-container">
                                <label for="price">Prix (en euros)</label>
                                <input class="input" id="price" name="price" type="number" step="0.01" min="0" required>
                            </div>

                            <div class="input-container">
                                <label for="date">Date de sortie</label>
                                <input class="input" id="date" name="date" type="date" required>
                            </div>

                            <div class="input-container">
                                <label for="synopsis">Synopsis</label>
                                <textarea class="input" id="synopsis" name="synopsis" rows="5" value="" required></textarea>
                            </div>

                            <div class="input-container">
                                <label for="plateforms[]">Plateformes</label>
                                <div class="checkboxes-container">
                                    <?php
                                        $platforms = readQuery($mysqli, "SELECT * FROM platform");
                                        $counter = 0;
                                        foreach($platforms as $key => $value) {
                                            $plateform_name = $value["name"];
                                            echo '
                                                <div class="checkbox-container">
                                                    <input class="checkbox-input" id="plateform-'.$counter.'" name="platforms['.$plateform_name.']" type="checkbox">
                                                    <label class="checkbox-name" for="plateform-'.$counter.'">'.$plateform_name.'</label>
                                                </div>
                                            ';
                                            $counter++;
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="input-container">
                            <label for="categories[]">Genres</label>
                                <div class="checkboxes-container">
                                    <?php
                                        $categories = readQuery($mysqli, "SELECT * FROM category");
                                        foreach($categories as $key => $value) {
                                            $categorie_name = $value["name"];
                                            echo '
                                                <div class="checkbox-container">
                                                    <input class="checkbox-input" id="category-'.$categorie_name.'" name="categories['.$categorie_name.']" type="checkbox">
                                                    <label class="checkbox-name" for="category-'.$categorie_name.'">'.$categorie_name.'</label>
                                                </div>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="submit-container">
                            <input class="btn submit-btn" type="submit" value="Créer le jeu (définif)">
                        </div>

                    </form>
                
                </section>
        </main>

        <?php includeFooter(); ?>

    </body>

    <?php
        closeDB($mysqli);
    ?>


</html>