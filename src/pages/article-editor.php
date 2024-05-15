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
        session_start();
        // $author_id = $_SESSION['user_id'];
        $author_id = 1;

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
        $test = array(array("intro", "Le lancement de Cyberpunk 2077 en décembre 2020 fut pour le moins chaotique, mais CD Projekt RED n\'a jamais abdiqué. Au contraire, les studios polonais se sont attelés à rectifier le tir une update après l\'autre afin de s\'assurer que leur Action-RPG futuriste tienne toutes ses promesses. Avec la mise à jour 2.0, V accède-t-elle au statut de légende ? Il est grand temps de retourner à Night City en quête de réponses."), array("part-title", "Un univers toujours plus \"Premios\""), array("corpus", "Le monde ouvert bâti par CD Projekt RED était l\'une des forces de Cyberpunk 2077 avec ses quartiers aux ambiances variées débordant de vie. Toutefois, cet univers imaginé à l\'origine par Mike Pondsmith en 1988 ne pouvait pleinement s\'épanouir sans une intelligence artificielle digne de ce nom. Si le comportement des citoyens lambda demeurent dans les grandes lignes inchangés, il en va autrement pour les ennemis qui se dressent sur le chemin de V. L\'update 2.0 de CP 2077 a mis à jour leur logiciel ce qui leur permet d\'opposer une résistance un peu plus coriace. Les paumards et autres edgerunners font parfois preuve \'initiative, et mettent en avant leurs atouts pour prendre le dessus lors des affrontements. Ces derniers utilisent régulièrement les piratages rapides, tentent de vous déloger avec des grenades et misent sur leurs forces pour vous éliminer. Les comportements demeurent encore artificiels, voire sommaires, mais la différence est notable. Néanmoins, ce sont les forces de l\'ordre de Night City qui bénéficient de la mise à jour la plus significative."), array("image", array("/assets/images/illustrations/cyberpunk-illustration.jpg", "Depuis la mise à jour 2.0, Night City est plus réaliste que jamais. Le jeu nous offre un apeçu fascinant et effrayant des villes du futur.", "Image ingame de Cyberpunk 2077")), array("part-title", "Une personnalisation plus \"Nova\" que jamais"), array("corpus", "La personnalisation de V avait séduit les joueurs, mais restait perfectible sur de nombreux points. Conscients de cela, les développeurs proposent avec la mise à jour 2.0 une refonte totale des mécaniques RPG de Cyberpunk 2077 afin de coller au plus près de l\'univers et donner une plus grande liberté aux mercenaires. Cela passe en premier lieu par un nouveau système d\'avantages qui n\'a plus rien à voir avec l\'ancien, même s\'il repose toujours sur les attributs du protagoniste (Constitution, Réflexes, Capacité Technique, Sang Froid et Intelligence). La majorité des attributs ont été modifiés tandis que d\'autres font une entrée remarquée. Cette nouvelle approche a pour principal objectif de traduire par le gameplay vos choix et donc d\'impacter l\'expérience de jeu dans sa globalité. Il en va de même pour les implants qui deviennent encore plus essentiels. Point important, l\'armure est désormais liée à votre matériel cybernétique et non à vos vêtements. Il est également conseillé d\'améliorer votre matos en recyclant les composants, ce qui permet d\'éviter de repasser à la caisse. CD Projekt RED s\'assure ainsi que vos augmentations influent sur l\'évolution de votre personnage, et c\'est d\'autant plus vrai avec la limitation mise en place. En effet, V ne peut supporter qu\'une quantité limitée d\'implants ce qui vous force à faire des choix parfois drastiques. Fort heureusement, cette limitation augmente en parallèle du gain d\'expérience et garantit à votre mercenaire une destinée hors du commun. L\'immersion se veut ludique, mais aussi visuelle. Les visites chez le charcudoc bénéficient d\'une interface repensée et de cinématiques post-opératoires, histoire de ressentir un peu plus les changements effectués sur votre corps même si cela reste au final un gimmick plaisant. Enfin, la mise à jour 2.0 vous force à réattribuer vos points d\'avantages déjà gagnés avec votre version de V, à moins que vous ne souhaitiez recommencer l\'aventure du début... ce qui peut avoir son charme."), array("part-title", "Conclusion"), array("corpus", "Cyberpunk 2077 revient de loin, de très loin même, et sa résurrection est à la hauteur de ses débuts chaotiques. Avec les changements opérés par CD Projekt RED via la mise à jour 2.0, cet Action-RPG gomme les derniers errements des versions vanilla et 1.6, optimise ce qui devait l\'être, et rend la personnalisation plus “Nova” que jamais. Assister à l\'ascension de V dans les rues malfamées de Night City n\'a jamais été aussi grisant. Cyberpunk 2077 renaît définitivement de ses cendres... et c\'est un sans faute (ou presque) !")); 
        $points = array(array("L\'expérience Cyberpunk 2077 sublimée", "Les interventions de la Police", "La refonte du système d'avantages et des implants"), array("L'IA ennemie toujours perfectible", "Le manque de nouveau contenu"));

        

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

                            echo '
                            <script type="text/javascript">
                                addImageInput();
                                fillInput("image", '.$image_number.', '.$current_content.');
                            </script>
                            ';

                            $image_number ++;
                        }
                    }
                    
                    // Fill the positive points
                    foreach ($article[0]["points"][0] as $key => $point) {

                        echo '<script type="text/javascript">fillInput("positive-point", '.($key+1).', "'.$point.'");</script>';

                    }

                    // Fill the negative points
                    foreach ($article[0]["points"][0] as $key => $point) {

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