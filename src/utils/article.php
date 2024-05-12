<?php

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');


//__________Functions__________

// To create article title
function createArticle($mysqli, $article_id, $article_title, $content, $rating, $date, $author_id, $game_id, $points) {

    // Create the new article (without its content and the points)
    $query = "INSERT INTO article (title, content, rating, date, authorID_article, gameID_article, points) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $prepared_query = mysqli_prepare($mysqli, $query);
    $temp = "temp";     // Temporary content. It will be updated right after with updateArticleContent funciton

    mysqli_stmt_bind_param($prepared_query, "ssdsiis", $article_title, $temp, $rating, $date, $author_id, $game_id, $points);    

    writeDB($prepared_query);

    // Update the just created article
    $article_id = mysqli_insert_id($mysqli);
    updateArticleContent($mysqli, $article_id, $content);
    updateArticlePoints($mysqli, $article_id, $points);
}




// To update an entire article
function updateArticle($mysqli, $article_id, $article_title, $article_content) {
    updateArticleTitle($mysqli, $article_id, $article_title);
    updateArticleContent($mysqli, $article_id, $article_content);
}


// To update article title
function updateArticleTitle($mysqli, $article_id, $article_title) {
    $query = "UPDATE article SET title = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $article_title, $article_id);

    writeDB($prepared_query);
}

// To udpate article content
function updateArticleContent($mysqli, $article_id, $article_content) {
    $json_formatted_content = json_encode($article_content);

    $query = "UPDATE article SET content = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $json_formatted_content, $article_id);
    
    writeDB($prepared_query);
}


// To update article points
function updateArticlePoints($mysqli, $article_id, $article_points) {
    $json_formatted_content = json_encode($article_points);

    $query = "UPDATE article SET points = ? WHERE id = ?";
    $prepared_query = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($prepared_query, "si", $json_formatted_content, $article_id);

    writeDB($prepared_query);
}