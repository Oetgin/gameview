<?php

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');


//__________Functions__________

// To udpate article content
function updateArticleContent($article_id, $article_content) {
    global $update_article_content_prepared;

    $json_formatted_content = json_encode($article_content);

    mysqli_stmt_bind_param($update_article_content_prepared, "si", $json_formatted_content, $article_id);
    
    writeDB($update_article_content_prepared);
}


// To update article points
function updateArticlePoints($article_id, $article_points) {
    global $update_article_points_prepared;

    $json_formatted_content = json_encode($article_points);

    mysqli_stmt_bind_param($update_article_points_prepared, "si", $json_formatted_content, $article_id);

    writeDB($update_article_points_prepared);
}