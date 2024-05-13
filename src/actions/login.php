<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to register your account</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');

    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = hashPassword($password);

    // Insert user into database
    mysqli_stmt_bind_param($user_login_prepared, 'ss', $username, $hashed_password);
    $user_login = readDB($user_login_prepared);

    if (!$user_login) {
        closeDB($mysqli);

        // Start session
        session_start();
        $_SESSION['user_id'] = $user_login['id'];

        redirect('/index.php', 'success', 'Logged in successfully');
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/login.php', 'error', 'Failed to login');
    }

}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('/register.php', 'error', 'Invalid request. Please use the form.');
}