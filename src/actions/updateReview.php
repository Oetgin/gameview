<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to edit your comment</p>
    </div>';
    
    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    require_once(DOCUMENT_ROOT . '/src/utils/login.php');
    require_once(DOCUMENT_ROOT . '/src/utils/user.php');
    
    // Get the comment id
    if (isset($_GET["id"])) {
        $comment_id = $_GET["id"];
    } else {
        redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }

    // Get the user id
    if (!loggedIn()) {
        redirect("/index.php", "error", "Vous devez être connecté pour éditer un commentaire");
    }

    mysqli_stmt_bind_param($select_comment_prepared, 'i', $comment_id);
    $author_id = readDB($select_comment_prepared)[0]["authorID_comment"];

    // Get the comment
    if (isset($_POST["title-".$comment_id])) {
        $title = $_POST["title-".$comment_id];
    } else {
        redirect("/index.php", "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["content-".$comment_id])) {
        $content = $_POST["content-".$comment_id];
    } else {
        redirect("/index.php", "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["rating-".$comment_id])) {
        $rating = $_POST["rating-".$comment_id];
    } else {
        redirect("/index.php", "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }
    if (isset($_POST["played_time-".$comment_id])) {
        $played_time = $_POST["played_time-".$comment_id];
    } else {
        redirect("/index.php", "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
    }

    // Check permissions
    if (!isAdmin() && !getId() == $author_id) {
        closeDB($mysqli);
        redirect("/index.php", "error", "Vous n'êtes pas autorisé à éditer ce commentaire");
    }

    // Update the comment
    mysqli_stmt_bind_param($update_comment_prepared, 'ssiii', $title, $content, $rating, $played_time, $comment_id);
    $update_comment = writeDB($update_comment_prepared);

    if (!$update_comment) {
        closeDB($mysqli);
        redirect("/index.php", "error", "Erreur lors de l'ajout du commentaire");
    }

    // Redirect
    closeDB($mysqli);
    redirect("/index.php" , "success", "Commentaire posté avec succès !");
}
else {
    redirect('/index.php', "error", "Vous n'êtes pas autorisé à accéder à cette page directement");
}