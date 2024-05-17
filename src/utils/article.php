<?php

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');


//__________Functions__________

// To create article title
function createArticle($mysqli, $article_id, $article_title, $article_description, $content, $rating, $date, $author_id, $game_id, $points) {

    // Create the new article (without its content and the points)
    $query = "INSERT INTO article (title, description, content, rating, date, authorID_article, gameID_article, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $prepared_query = mysqli_prepare($mysqli, $query);
    $temp = "temp";     // Temporary content and points. It will be updated right after with updateArticleContent funciton

    mysqli_stmt_bind_param($prepared_query, "sssdsiis", $article_title, $article_description, $temp, $rating, $date, $author_id, $game_id, $temp);    

    writeDB($prepared_query);

    // Update the just created article
    $article_id = mysqli_insert_id($mysqli);
    updateArticleContent($mysqli, $article_id, $content);
    updateArticlePoints($mysqli, $article_id, $points);
}




// To update an entire article
function updateArticle($mysqli, $article_id, $article_title, $article_description, $article_content, $rating, $article_date, $author_id, $article_points) {
    updateArticleTitle($mysqli, $article_id, $article_title);
    updateArticleDescription($mysqli, $article_id, $article_description);
    updateArticleContent($mysqli, $article_id, $article_content);
    updateArticlePoints($mysqli, $article_id, $article_points);
    updateArticleAttributes($mysqli, $article_id, $rating, $article_date, $author_id);
}


// To update article title
function updateArticleTitle($mysqli, $article_id, $article_title) {
    $query = "UPDATE article SET title = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $article_title, $article_id);

    writeDB($prepared_query);
}

// To update article description
function updateArticleDescription($mysqli, $article_id, $article_description) {
    $query = "UPDATE article SET description = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $article_description, $article_id);

    writeDB($prepared_query);
}

// To udpate article content
function updateArticleContent($mysqli, $article_id, $article_content) {
    
    // Update content
    $json_formatted_content = json_encode($article_content);

    $query = "UPDATE article SET content = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $json_formatted_content, $article_id);
    
    writeDB($prepared_query);
}


// To update article points
function updateArticlePoints($mysqli, $article_id, $article_points) {

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

    $query = "UPDATE article SET points = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $json_formatted_content, $article_id);

    writeDB($prepared_query);
}

// To update article attributes (date, $price, author)
function updateArticleAttributes($mysqli, $article_id, $rating, $date, $author_id) {

    $query = "UPDATE article SET rating = ?, date = ?, authorID_article = ? WHERE id = ?";

    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "dsii", $rating, $date, $author_id, $article_id);

    writeDB($prepared_query);

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