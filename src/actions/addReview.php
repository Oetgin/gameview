<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to post your comment</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    require_once(DOCUMENT_ROOT . '/src/utils/login.php');
    
    // Get the article id
    if (isset($_GET["id"])) {
        $article_id = $_GET["id"];
    } else {
        redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }

    // Get the user id
    if (!loggedIn()) {
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Vous devez être connecté pour poster un commentaire");
    }

    $user_id = getId();

    // Get the comment
    if (isset($_POST["title"])) {
        $title = $_POST["title"];
    } else {
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["content"])) {
        $content = $_POST["content"];
    } else {
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["rating"])) {
        $rating = $_POST["rating"];
    } else {
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["played-time"])) {
        $played_time = $_POST["played-time"];
    } else {
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }

    // Insert the comment
    mysqli_stmt_bind_param($insert_comment_prepared, 'ssiiii', $title, $content, $rating, $played_time, $user_id, $article_id);
    $insert_comment = writeDB($insert_comment_prepared);

    // Update user stats
    $add_comment_query = "UPDATE user SET commentCount = commentcount + 1 WHERE id = ?";
    $add_comment_prepared = mysqli_prepare($mysqli, $add_comment_query);
    mysqli_stmt_bind_param($add_comment_prepared, 'i', $user_id);
    $add_comment = writeDB($add_comment_prepared);

    // Count the comments
    $count_comments_query = "SELECT COUNT(*) as count FROM comment WHERE authorID_comment = ?";
    $count_comments_prepared = mysqli_prepare($mysqli, $count_comments_query);
    mysqli_stmt_bind_param($count_comments_prepared, 'i', $user_id);
    $count_comments = readDB($count_comments_prepared);

    // Update user role
    if ($count_comments[0]["count"] >= 5 && isUser()) {
        $update_role_query = "UPDATE user SET role = 'Éditeur' WHERE id = ?";
        $update_role_prepared = mysqli_prepare($mysqli, $update_role_query);
        mysqli_stmt_bind_param($update_role_prepared, 'i', $user_id);
        $update_role = writeDB($update_role_prepared);
    }

    if (!$insert_comment) {
        closeDB($mysqli);
        redirect('/src/pages/article.php?id=' . $article_id, "error", "Erreur lors de l'ajout du commentaire");
    }

    else {
        // Redirect
        closeDB($mysqli);
        redirect('/src/pages/article.php?id=' . $article_id , "success", "Commentaire posté avec succès !");
    }
}
else {
    redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
}