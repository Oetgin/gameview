<?php

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');


//__________Functions__________

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