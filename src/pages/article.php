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
        $author = readQuery($mysqli, 'SELECT * FROM user WHERE id = ' .$article[0]["authorID_article"]);
        
        $game[0] = array_merge($game[0], array("cover-path" => COVERS_FOLDER_PATH . 'cover-' . $game[0]["id"] . '.png'));
        $game[0] = array_merge($game[0], array("categories" => $game_category));
        $article[0]["content"] = json_decode($article[0]["content"]);
        $article[0]["points"] = json_decode($article[0]["points"]);


        // __________Temp tests__________
        $test = array(array("intro", "Le lancement de Cyberpunk 2077 en décembre 2020 fut pour le moins chaotique, mais CD Projekt RED n\'a jamais abdiqué. Au contraire, les studios polonais se sont attelés à rectifier le tir une update après l\'autre afin de s\'assurer que leur Action-RPG futuriste tienne toutes ses promesses. Avec la mise à jour 2.0, V accède-t-elle au statut de légende ? Il est grand temps de retourner à Night City en quête de réponses."), array("part-title", "Un univers toujours plus \"Premios\""), array("corpus", "Le monde ouvert bâti par CD Projekt RED était l\'une des forces de Cyberpunk 2077 avec ses quartiers aux ambiances variées débordant de vie. Toutefois, cet univers imaginé à l\'origine par Mike Pondsmith en 1988 ne pouvait pleinement s\'épanouir sans une intelligence artificielle digne de ce nom. Si le comportement des citoyens lambda demeurent dans les grandes lignes inchangés, il en va autrement pour les ennemis qui se dressent sur le chemin de V. L\'update 2.0 de CP 2077 a mis à jour leur logiciel ce qui leur permet d\'opposer une résistance un peu plus coriace. Les paumards et autres edgerunners font parfois preuve \'initiative, et mettent en avant leurs atouts pour prendre le dessus lors des affrontements. Ces derniers utilisent régulièrement les piratages rapides, tentent de vous déloger avec des grenades et misent sur leurs forces pour vous éliminer. Les comportements demeurent encore artificiels, voire sommaires, mais la différence est notable. Néanmoins, ce sont les forces de l\'ordre de Night City qui bénéficient de la mise à jour la plus significative."), array("image", array("/assets/images/illustrations/cyberpunk-illustration.jpg", "Depuis la mise à jour 2.0, Night City est plus réaliste que jamais. Le jeu nous offre un apeçu fascinant et effrayant des villes du futur.", "Image ingame de Cyberpunk 2077")), array("part-title", "Une personnalisation plus \"Nova\" que jamais"), array("corpus", "La personnalisation de V avait séduit les joueurs, mais restait perfectible sur de nombreux points. Conscients de cela, les développeurs proposent avec la mise à jour 2.0 une refonte totale des mécaniques RPG de Cyberpunk 2077 afin de coller au plus près de l\'univers et donner une plus grande liberté aux mercenaires. Cela passe en premier lieu par un nouveau système d\'avantages qui n\'a plus rien à voir avec l\'ancien, même s\'il repose toujours sur les attributs du protagoniste (Constitution, Réflexes, Capacité Technique, Sang Froid et Intelligence). La majorité des attributs ont été modifiés tandis que d\'autres font une entrée remarquée. Cette nouvelle approche a pour principal objectif de traduire par le gameplay vos choix et donc d\'impacter l\'expérience de jeu dans sa globalité. Il en va de même pour les implants qui deviennent encore plus essentiels. Point important, l\'armure est désormais liée à votre matériel cybernétique et non à vos vêtements. Il est également conseillé d\'améliorer votre matos en recyclant les composants, ce qui permet d\'éviter de repasser à la caisse. CD Projekt RED s\'assure ainsi que vos augmentations influent sur l\'évolution de votre personnage, et c\'est d\'autant plus vrai avec la limitation mise en place. En effet, V ne peut supporter qu\'une quantité limitée d\'implants ce qui vous force à faire des choix parfois drastiques. Fort heureusement, cette limitation augmente en parallèle du gain d\'expérience et garantit à votre mercenaire une destinée hors du commun. L\'immersion se veut ludique, mais aussi visuelle. Les visites chez le charcudoc bénéficient d\'une interface repensée et de cinématiques post-opératoires, histoire de ressentir un peu plus les changements effectués sur votre corps même si cela reste au final un gimmick plaisant. Enfin, la mise à jour 2.0 vous force à réattribuer vos points d\'avantages déjà gagnés avec votre version de V, à moins que vous ne souhaitiez recommencer l\'aventure du début... ce qui peut avoir son charme."), array("part-title", "Conclusion"), array("corpus", "Cyberpunk 2077 revient de loin, de très loin même, et sa résurrection est à la hauteur de ses débuts chaotiques. Avec les changements opérés par CD Projekt RED via la mise à jour 2.0, cet Action-RPG gomme les derniers errements des versions vanilla et 1.6, optimise ce qui devait l\'être, et rend la personnalisation plus “Nova” que jamais. Assister à l\'ascension de V dans les rues malfamées de Night City n\'a jamais été aussi grisant. Cyberpunk 2077 renaît définitivement de ses cendres... et c\'est un sans faute (ou presque) !")); 
        $points = array(array("L\'expérience Cyberpunk 2077 sublimée", "Les interventions de la Police", "La refonte du système d'avantages et des implants"), array("L'IA ennemie toujours perfectible", "Le manque de nouveau contenu"));

        updateArticleContent($mysqli, $article_id, $test);



        includeHead('/src/styles/pages/article.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <?php 
                includeArticleHeader($article_id, $game[0]["title"], $article[0]["title"], $author[0]["username"]);

                includeArticleRecap($game[0]["title"], $game[0]["releaseDate"], $game[0]["categories"], $game[0]["price"], $game[0]["synopsis"], $game[0]["cover-path"], $article[0]["rating"], 95);
            ?>


            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-white.svg" alt="divider">


            <?php
                includeArticleContent($game[0]["title"], $article[0]["title"], $article[0]["content"], $article[0]["rating"], $article[0]["points"])
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