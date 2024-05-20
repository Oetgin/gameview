<?php

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');


//__________Functions__________

// To create article title
function createArticle($mysqli, $article_id, $article_title, $article_description, $content, $rating, $date, $author_id, $game_id, $points) {
    global $create_article_prepared;

    // Create the new article (without its content and the points)
    $temp = "temp";     // Temporary content and points. It will be updated right after with updateArticleContent funciton

    mysqli_stmt_bind_param($create_article_prepared, "sssdsiis", $article_title, $article_description, $temp, $rating, $date, $author_id, $game_id, $temp);    

    writeDB($create_article_prepared);

    // Update the just created article
    $article_id = mysqli_insert_id($mysqli);
    updateArticleContent($article_id, $content);
    updateArticlePoints($article_id, $points);
}




// To update an entire article
function updateArticle($article_id, $article_title, $article_description, $article_content, $rating, $article_date, $author_id, $article_points) {
    updateArticleTitle($article_id, $article_title);
    updateArticleDescription($article_id, $article_description);
    updateArticleContent($article_id, $article_content);
    updateArticlePoints($article_id, $article_points);
    updateArticleAttributes($article_id, $rating, $article_date, $author_id);
}


// To update article title
function updateArticleTitle($article_id, $article_title) {
    global $update_article_title_prepared;

    mysqli_stmt_bind_param($update_article_title_prepared, "si", $article_title, $article_id);

    writeDB($update_article_title_prepared);
}

// To update article description
function updateArticleDescription($article_id, $article_description) {
    global $update_article_description_prepared;

    mysqli_stmt_bind_param($update_article_description_prepared, "si", $article_description, $article_id);

    writeDB($update_article_description_prepared);
}

// To udpate article content
function updateArticleContent($article_id, $article_content) {
    global $update_article_content_prepared;
    
    // Update content
    $json_formatted_content = json_encode($article_content);

    mysqli_stmt_bind_param($update_article_content_prepared, "si", $json_formatted_content, $article_id);
    
    writeDB($update_article_content_prepared);
}


// To update article points
function updateArticlePoints($article_id, $article_points) {
    global $update_article_points_prepared;

    // We only keep the not empty points
    $new_article_points = array(array(), array());

    foreach($article_points as $type => $value) {
        foreach($value as $index => $point) {
            if($point != "") {
                array_push($new_article_points[$type], $point);
            }
        }
    }

    $json_formatted_content = json_encode($new_article_points);

    mysqli_stmt_bind_param($update_article_points_prepared, "si", $json_formatted_content, $article_id);

    writeDB($update_article_points_prepared);
}

// To update article attributes (date, $price, author)
function updateArticleAttributes($article_id, $rating, $date, $author_id) {
    global $update_article_attributes_prepared;

    mysqli_stmt_bind_param($update_article_attributes_prepared, "dsii", $rating, $date, $author_id, $article_id);

    writeDB($update_article_attributes_prepared);

}


function incrementEditorCounter($editor_id) {
    global $increment_editor_counter_prepared;

    mysqli_stmt_bind_param($increment_editor_counter_prepared, "i", $editor_id);

    writeDB($increment_editor_counter_prepared);
}


// To delete recursivly a dir
function deleteDirectory($directory) {
    if (!is_dir($directory)) {
        return false;
    }

    $items = array_diff(scandir($directory), ['.', '..']);
    foreach ($items as $item) {
        $path = "$directory/$item";
        if (is_dir($path)) {
            deleteDirectory($path);
        } else {
            if (!unlink($path)) {
                return false;
            }
        }
    }

    return rmdir($directory);
}