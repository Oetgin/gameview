<?php

// Show errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR );


require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to delete your account</p>
    </div>';    

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');

    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    // Get form data
    $username = $_POST['username'];
    $old_password = $_POST['password'];


    // Get user info
    mysqli_stmt_bind_param($user_login_prepared, 's', $username);
    $user_login = readDB($user_login_prepared)[0];

    // Check if user exists
    if ($user_login) {
        // Check password
        if (password_verify($old_password, $user_login['password'])) {
            
            // Start session
            session_start();
            $_SESSION['user_id'] = $user_login['id'];
            
            // Delete account (user, articles, comments)
            $author_id = $user_login['id'];
            mysqli_stmt_bind_param($user_articles_prepared, 'i', $author_id);
            $articles = readDB($user_articles_prepared);
            for ($i = 0; $i < count($articles); $i++) {
                $article_id = $articles[$i]['id'];
                mysqli_stmt_bind_param($delete_article_comments_prepared, 'i', $article_id);
                $delete_article_comments = writeDB($delete_article_comments_prepared);
            }
            mysqli_stmt_bind_param($delete_comments_prepared, 'i', $author_id);
            mysqli_stmt_bind_param($delete_articles_prepared, 'i', $author_id);
            mysqli_stmt_bind_param($delete_user_prepared, 'i', $author_id);

            $delete_comments = writeDB($delete_comments_prepared);
            $delete_articles = writeDB($delete_articles_prepared);
            $delete_user = writeDB($delete_user_prepared);
        
            closeDB($mysqli);
            redirect('/src/actions/logout.php', 'success', 'Account deleted successfully');
        }
        else {
            closeDB($mysqli);
            redirect('/src/pages/login.php', 'error', 'Incorrect password');
        }
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/deleteAccount.php', 'error', 'Failed to delete account');
    }

}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('/src/pages/profile.php', 'error', 'Invalid request. Please use the form.');
}