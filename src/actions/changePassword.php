<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to delete your account</p>
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
    $old_password = $_POST['old-password'];


    // Get user info
    mysqli_stmt_bind_param($user_login_prepared, 's', $username);
    $user_login = readDB($user_login_prepared)[0];

    // Check if user exists
    if ($user_login) {
        // Check password
        if (password_verify($old_password, $user_login['old-password'])) {
            closeDB($mysqli);
            
            // Start session
            session_start();
            $_SESSION['user_id'] = $user_login['id'];
            
            $new_password = $_POST['new-password'];
            $old_password = $_POST['old-password'];

            // Validate form data
            if ($new_password != $new_password_verify) {
                redirect('/src/pages/changePassword.php', 'error', 'Passwords do not match');
            }
            if (!validPassword($new_password)) {
                redirect('/src/pages/changePassword.php', 'error', 'Invalid password. Please use at least 8 characters, one uppercase, one lowercase, one digit and one special character');
            }

            // Hash password
            $hashed_password = hashPassword($old_password);

            // Insert new password
            mysqli_stmt_bind_param($change_password_prepared, 'si', $hashed_password, $user_id);
            $insert_user = writeDB($change_password_prepared);

            if ($insert_user) {
                closeDB($mysqli);
                redirect('/index.php', 'success', 'Password changed successfully');
            }
            else {
                closeDB($mysqli);
                redirect('/src/pages/changePassword.php', 'error', 'Failed to change password');
            }
        }
        else {
            closeDB($mysqli);
            redirect('/src/pages/changePassword.php', 'error', 'Incorrect password');
        }
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/changePassword.php', 'error', 'Failed to change password');
    }

}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('src/pages/changePassword.php', 'error', 'Invalid request. Please use the form.');
}