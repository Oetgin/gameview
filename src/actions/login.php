<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to log in to your account</p>
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
    $old_password = $_POST['password'];


    // Get user info
    mysqli_stmt_bind_param($user_login_prepared, 's', $username);
    $user_login = readDB($user_login_prepared)[0];
    

    // Check if user exists
    if ($user_login) {
        // Check password
        if (password_verify($old_password, $user_login['password'])) {
            closeDB($mysqli);
            
            // Start session
            session_start();
            $_SESSION['user_id'] = $user_login['id'];
            $_SESSION['role'] = $user_login['role'];
            
            redirect('/index.php', 'success', 'Logged in successfully');
        }
        else {
            closeDB($mysqli);
            redirect('/src/pages/login.php', 'error', 'Incorrect password');
        }
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/login.php', 'error', 'Failed to login');
    }

}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('src/pages/register.php', 'error', 'Invalid request. Please use the form.');
}