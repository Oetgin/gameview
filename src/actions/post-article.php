<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to post your article</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    require_once(DOCUMENT_ROOT . '/src/utils/article.php');

    $points = array(array("L\'expérience Cyberpunk 2077 sublimée", "Les interventions de la Police", "La refonte du système d'avantages et des implants"), array("L'IA ennemie toujours perfectible", "Le manque de nouveau contenu"));

    // Get form data
    $game_id = $_GET['game_id'];
    $author_id = $_GET['author_id'];
    $article_id = $_GET['article_id'];
    $date = date('Y-m-d');


    // Get all the content elements in right order
    $article_content = array();                     // To store the content
    $article_points = array(array(),array());       // To store the positive and negative points
    $counter = 0;                                   // Position of the content (we skip title cauz it's not part of the content)

    foreach ($_POST as $key => $value) {

        if ($key == "title-0") {

            $article_title = addslashes($value);

        } else if($key == "intro-0") {

            $article_content[$counter] = array("intro", addslashes($value));

            $counter++;

        } else if (str_starts_with($key, "part-title")) {

            $article_content[$counter] = array("part-title", addslashes($value));

            $counter++;

        } else if (str_starts_with($key, "corpus")) {

            $article_content[$counter] = array("corpus", addslashes($value));

            $counter++;

        } else if (str_starts_with($key, "image")) {


            $file_path = $_FILES[$key]["tmp_name"]["file"];
            $caption = addslashes($value["caption"]);
            $alt = addslashes($value["alt"]);

            $article_content[$counter] = array("image", array($file_path, $caption, $alt));

            $counter++;

        } else if (str_starts_with($key, "positive")) {

            foreach ($value as $index => $point) {
                array_push($article_points[0], addslashes($point));
            }

        } else if (str_starts_with($key, "rating")) {

            $rating = $value;

        } else if (str_starts_with($key, "negative")) {

            foreach ($value as $index => $point) {
                array_push($article_points[1], addslashes($point));
            }
        }
    }

    echo '<pre>';
    print_r($article_content);
    echo '</pre>';
    echo 'article id: '.$article_id;
    echo 'game id: '. $game_id;

    // Update the database
    $mysqli = connectionDB();


    // If the article already exists
    if ($article_id > -1) {
        updateArticle($mysqli, $article_id, $article_title, $article_content, $rating, $date,$author_id, $article_points);
    } else {
        echo 'L article n existe pas ';
        createArticle($mysqli, $article_id, $article_title, $article_content, $rating, $date, $author_id, $game_id, $article_points);
    }


    // Redirect
    // closeDB($mysqli);
    // header('Location: ../pages/article.php?id='.$article_id);
    // exit;

}
else {
    header('Location: ../../index.php');
}