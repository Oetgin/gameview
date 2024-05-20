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
    $prefilled_images_positions = array();                // To store the prefilled images ids

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    foreach ($_POST as $key => $value) {

        if ($key == "title-0") {

            $article_title = addslashes($value);

        } else if ($key == "description-0") {

            $article_description = addslashes($value);

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


            $file = $_FILES[$key]["tmp_name"];
            $file_name = $_FILES[$key]["name"];

            $caption = addslashes($value["caption"]);
            $alt = addslashes($value["alt"]);
            $position = $value["prefill"];

            $article_content[$counter] = array("image", array($file, $caption, $alt, $position));

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




    // ____________Modify/create the article____________
    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/article.php');


    // If the article already exists
    if ($article_id > -1) {

        echo '<br> The article already exists its id is ' . $article_id. '<br>';

        $dir_path = DOCUMENT_ROOT . '/assets/images/articles/article-'.$article_id;
        if (!file_exists($dir_path)) {
            mkdir($dir_path);
        }

        $prefilled_images_number = count(glob($dir_path.'/*'));
        echo 'prefilled images number = ' . $prefilled_images_number. '<br>';
        $images = array();

        foreach ($article_content as $key => $value) {
            if ($value[0] == "image") {
                $images[] = $value[1][0];

                // To store the prefilled images ids
                if (isset($value[1][3])) {
                    $prefilled_images_positions[] = $value[1][3];
                }
            }
        }
        
        echo '<pre>';
        print_r($article_content);
        echo '</pre>';

        // Delete the removed images
        for($i = 0; $i < $prefilled_images_number; $i++) {
            if (!in_array($i, $prefilled_images_positions)) {
                unlink($dir_path . '/img-' . $i . '.png');
            }
        }

        foreach($images as $key => $value) {

            if ($value["file"] != null){
                // New images management

                move_uploaded_file($value["file"], $dir_path.'/' . basename('img-'.$key.'.png'));
            
            }

        }

        // rename all the images in the directory in the right order
        $images = glob($dir_path.'/*');
        $images_number = count($images);

        for($i = 0; $i < $images_number; $i++) {
            rename($images[$i], $dir_path . '/img-' . $i . '.png');
        }
        
        // To update the content
        updateArticle($article_id, $article_title, $article_description, $article_content, $rating, $date,$author_id, $article_points);
    
    } 
    
    // If the article doesn't exist
    else {

        $new_article_id = readQuery($mysqli, 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE table_name = "article" AND table_schema = "gameview"')[0]['AUTO_INCREMENT'];
        echo 'The article doesnt exist yet, its new id will be : ' . $new_article_id;
    
        // Create the images folder
        $dir_path = DOCUMENT_ROOT . '/assets/images/articles/article-'.$new_article_id;
        deleteDirectory($dir_path);
        mkdir($dir_path);

        // Fill the new folder with the uploaded images
        $images = array();
        foreach ($article_content as $key => $value) {
            if ($value[0] == "image") {
                $images[] = $value[1][0];
            }
        }

        foreach ($images as $key => $value) {
            move_uploaded_file($value['file'], $dir_path.'/' . basename('img-'.$key.'.png'));
        }

        // To create the article
        createArticle($mysqli, $article_id, $article_title, $article_description, $article_content, $rating, $date, $author_id, $game_id, $article_points);
    }


    // Redirect
    closeDB($mysqli);
    header('Location: ../pages/article.php?id='.$article_id);
    exit;

}
else {
    header('Location: ../../index.php');
}