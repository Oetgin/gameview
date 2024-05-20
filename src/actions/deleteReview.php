<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to post your comment</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');


    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    require_once(DOCUMENT_ROOT . '/src/utils/login.php');
    
    // Get the comment id
    if (isset($_GET["id"])) {
        $comment_id = $_GET["id"];
    } else {
        redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }

    if (!loggedIn()) {
        redirect("/index.php", "error", "Vous devez être connecté pour supprimer un commentaire");
    }

    // Get the comment's author id
    mysqli_stmt_bind_param($get_comment_prepared, 'i', $comment_id);
    $get_comment = readDB($get_comment_prepared);

    if (empty($get_comment)) {
        closeDB($mysqli);
        redirect("/index.php", "error", "Ce commentaire n'existe pas");
    }

    $author_id = $get_comment[0]["authorID_comment"];


    // Delete the comment
    mysqli_stmt_bind_param($delete_comment_prepared, 'i', $comment_id);
    $delete_comment = writeDB($delete_comment_prepared);
    
    if (!$delete_comment) {
        closeDB($mysqli);
        redirect("/index.php", "error", "Erreur lors de la suppression du commentaire");
    }

    // Update user stats
    $add_comment_query = "UPDATE user SET commentCount = commentcount - 1 WHERE id = ?";
    $add_comment_prepared = mysqli_prepare($mysqli, $add_comment_query);
    mysqli_stmt_bind_param($add_comment_prepared, 'i', $author_id);
    $add_comment = writeDB($add_comment_prepared);

    // Count the comments
    $count_comments_query = "SELECT COUNT(*) as count FROM comment WHERE authorID_comment = ?";
    $count_comments_prepared = mysqli_prepare($mysqli, $count_comments_query);
    mysqli_stmt_bind_param($count_comments_prepared, 'i', $author_id);
    $count_comments = readDB($count_comments_prepared);

    // Update user role
    if ($count_comments[0]["count"] < 5 && isEditor()) {
        $update_role_query = "UPDATE user SET role = 'Utilisateur' WHERE id = ?";
        $update_role_prepared = mysqli_prepare($mysqli, $update_role_query);
        mysqli_stmt_bind_param($update_role_prepared, 'i', $author_id);
        $update_role = writeDB($update_role_prepared);
    }

    // Redirect
    closeDB($mysqli);
    redirect("/index.php", "success", "Commentaire supprimmé avec succès !");
}
else {
    redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
}