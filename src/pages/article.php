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
        includeHead('/src/styles/pages/article.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <section class="title-section">
                <div class="title-content">
                    <h2 class="game">Cyberpunk 2077</h2>
                    <p class="title">"Le jeu de la décennie"</p>
                    <p class="reviewer">Review par John Doe</p>
                </div>
                <div class="background-video">
                    <video class="boomerang" id="background-video" autoplay loop muted plays-inline>
                        <source src="/assets/videos/cyberpunk.webm" type="video/webm">
                    </video>
                    <div class="gradient"></div>
                </div>
            </section>


            <section class="recap-section">
                <div class="game-container">
                    <img class="cover" src="/assets/images/covers/cyberpunk-cover.jpg" alt="Cyberpunk Cover">
                    <div class="game-info-container">
                        <p class="game-title">Cyberpunk 2077</p>
                        <p class="release-date"><span class="underline">Date de sortie :</span> 10 décembre 2020</p>
                        <p class="devs"><span class="underline">Développeurs :</span> CD Projekt RED</p>
                        <p class="game-type"><span class="underline">Genre :</span> RPG, FPS</p>
                        <p class="-game-description">Cyberpunk 2077 est un jeu vidéo d'action-RPG en vue à la première personne développé par CD Projekt RED et édité par CD Projekt, inspiré du jeu de rôle sur table Cyberpunk 2020 conçu par Mike Pondsmith.</p>
                    </div>
                </div>

                <div class="reviews-container">
                        <div class="grade-container">
                            <div class="grade global-grade average">
                                75
                            </div>
                            <div class="grades-info-container">
                                <p class="grade-info-title">Note moyenne</p>
                                <p class="grade-info-more">Généralement favorable</p>
                            </div>
                        </div>
                        <div class="grade-container">
                            <div class="grade global-grade good">
                                95
                            </div>
                            <div class="grades-info-container">
                                <p class="grade-info-title">Votre note</p>
                                <p class="grade-info-more">Très favorable</p>
                            </div>
                        </div>
                </div>
            </section>

            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-white.svg" alt="divider">

            <section class="article-section">
                <h3 class="article-catch">Cyberpunk 2077 : Le jeu de la décennie</h3>
                <p class="intro">Le lancement de Cyberpunk 2077 en décembre 2020 fut pour le moins chaotique, mais CD Projekt RED n'a jamais abdiqué. Au contraire, les studios polonais se sont attelés à rectifier le tir une update après l'autre afin de s'assurer que leur Action-RPG futuriste tienne toutes ses promesses. Avec la mise à jour 2.0, V accède-t-elle au statut de légende ? Il est grand temps de retourner à Night City en quête de réponses.</p>
                
                <h4 class="part-title">Un univers toujours plus “Premios”</h4>
                <p class="corpus">
                    Le monde ouvert bâti par CD Projekt RED était l'une des forces de Cyberpunk 2077 avec ses quartiers aux ambiances variées débordant de vie. Toutefois, cet univers imaginé à l'origine par Mike Pondsmith en 1988 ne pouvait pleinement s'épanouir sans une intelligence artificielle digne de ce nom. Si le comportement des citoyens lambda demeurent dans les grandes lignes inchangés, il en va autrement pour les ennemis qui se dressent sur le chemin de V. L'update 2.0 de CP 2077 a mis à jour leur logiciel ce qui leur permet d'opposer une résistance un peu plus coriace. Les paumards et autres edgerunners font parfois preuve d'initiative, et mettent en avant leurs atouts pour prendre le dessus lors des affrontements. Ces derniers utilisent régulièrement les piratages rapides, tentent de vous déloger avec des grenades et misent sur leurs forces pour vous éliminer. Les comportements demeurent encore artificiels, voire sommaires, mais la différence est notable. Néanmoins, ce sont les forces de l'ordre de Night City qui bénéficient de la mise à jour la plus significative.
                </p>

                <div class="image-container">
                    <img class="image" src="/assets/images/illustrations/cyberpunk-illustration.jpg" alt="Cyberpunk ingame">
                    <p class="caption">
                        Depuis la mise à jour 2.0, Night City est plus réaliste que jamais. Le jeu nous offre un apeçu fascinant et effrayant des villes du futur.
                    </p>
                </div>
                
                <h4 class="part-title">Une personnalisation plus “Nova” que jamais</h4>
                <p class="corpus">
                    La personnalisation de V avait séduit les joueurs, mais restait perfectible sur de nombreux points. Conscients de cela, les développeurs proposent avec la mise à jour 2.0 une refonte totale des mécaniques RPG de Cyberpunk 2077 afin de coller au plus près de l'univers et donner une plus grande liberté aux mercenaires. Cela passe en premier lieu par un nouveau système d'avantages qui n'a plus rien à voir avec l'ancien, même s'il repose toujours sur les attributs du protagoniste (Constitution, Réflexes, Capacité Technique, Sang Froid et Intelligence). La majorité des attributs ont été modifiés tandis que d'autres font une entrée remarquée. Cette nouvelle approche a pour principal objectif de traduire par le gameplay vos choix et donc d'impacter l'expérience de jeu dans sa globalité. Il en va de même pour les implants qui deviennent encore plus essentiels. Point important, l'armure est désormais liée à votre matériel cybernétique et non à vos vêtements. Il est également conseillé d'améliorer votre matos en recyclant les composants, ce qui permet d’éviter de repasser à la caisse. CD Projekt RED s’assure ainsi que vos augmentations influent sur l’évolution de votre personnage, et c’est d’autant plus vrai avec la limitation mise en place. En effet, V ne peut supporter qu’une quantité limitée d’implants ce qui vous force à faire des choix parfois drastiques. Fort heureusement, cette limitation augmente en parallèle du gain d’expérience et garantit à votre mercenaire une destinée hors du commun. L’immersion se veut ludique, mais aussi visuelle. Les visites chez le charcudoc bénéficient d’une interface repensée et de cinématiques post-opératoires, histoire de ressentir un peu plus les changements effectués sur votre corps même si cela reste au final un gimmick plaisant. Enfin, la mise à jour 2.0 vous force à réattribuer vos points d'avantages déjà gagnés avec votre version de V, à moins que vous ne souhaitiez recommencer l'aventure du début... ce qui peut avoir son charme.
                </p>
                
                <h4 class="part-title">Conclusion</h4>
                <p class="corpus">
                    Cyberpunk 2077 revient de loin, de très loin même, et sa résurrection est à la hauteur de ses débuts chaotiques. Avec les changements opérés par CD Projekt RED via la mise à jour 2.0, cet Action-RPG gomme les derniers errements des versions vanilla et 1.6, optimise ce qui devait l'être, et rend la personnalisation plus “Nova” que jamais. Assister à l'ascension de V dans les rues malfamées de Night City n'a jamais été aussi grisant. Cyberpunk 2077 renaît définitivement de ses cendres... et c'est un sans faute (ou presque) !
                </p>

                <div class="final-grade-plus-minus-wrapper">
                    <div class="plus-minus-wrapper">
                        <div class="final-grade-container">
                            <div class="final-grade-title">
                                La note de GameView
                            </div>
                            <div class="grade average">
                                    75
                            </div>
                        </div>

                        <div class="plus-minus-container">
                            <div class="plus-container column">
                                <div class="column-title">
                                    Points forts
                                </div>
                                <ul>
                                    <li class="plus">L'expérience Cyberpunk 2077 sublimée</li>
                                    <li class="plus">Les interventions de la Police</li>
                                    <li class="plus">La refonte du système d'avantages et des implants</li>
                                </ul>
                            </div>
                            
                            <div class="minus-container column">
                                <div class="column-title">
                                        Points faibles
                                </div>
                                <ul>
                                    <li class="minus">L'IA ennemie toujours perfectible</li>
                                    <li class="minus">Le manque de nouveau contenu</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <img class="divider triangle" src="/assets/images/utils/triangle-divider-to-black.svg" alt="divider">

            <section class="avis-section">

            </section>

        </main>

        <?php includeFooter(); ?>

    </body>

    <?php
        closeDB($mysqli);
    ?>


</html>