<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to post your article</p>
    </div>';

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/article.php');

    // Update the role
    $user_username = $_POST['user'];
    $new_role = $_POST['role'];

    mysqli_stmt_bind_param($edit_user_role_prepared, 'ss', $new_role, $user_username);
    writeDB($edit_user_role_prepared);

    
    // Redirect
    closeDB($mysqli);
    header('Location: ../pages/moderation-dashboard.php');
    exit;

}
else {
    header('Location: ../../index.php');
}