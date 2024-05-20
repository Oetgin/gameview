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
    <p>Trying to change your profile</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');

    require_once(DOCUMENT_ROOT . '/src/utils/login.php');
    require_once(DOCUMENT_ROOT . '/src/utils/validInputs.php');

    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    // Get form data
    $email = $_POST['email'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $bio = $_POST['bio'];
    $pp = $_FILES['profile-picture-input'];
    
    // Check if user is logged in
    if (loggedIn()) {
        // Get user info
        $author_id = getId();

        // Validate form data
        if (!validEmail($email)) {
            closeDB($mysqli);
            redirect('/src/pages/updateProfile.php', 'error', 'Invalid email');
        }
        if ($name == "" || $surname == "") {
            closeDB($mysqli);
            redirect('/src/pages/updateProfile.php', 'error', 'Please enter your name and surname');
        }
        if (!validName($surname) || !validName($name)) {
            closeDB($mysqli);
            redirect('/src/pages/updateProfile.php', 'error', 'Invalid name. Please use 2-50 characters, letters, spaces and hyphens');
        }
        if ($birthdate == "") {
            closeDB($mysqli);
            redirect('/src/pages/updateProfile.php', 'error', 'Please enter your birthdate');
        }
        $max_birthdate = date('Y-m-d', strtotime('-15 years'));
        if ($birthdate > $max_birthdate) {
            closeDB($mysqli);
            redirect('/src/pages/updateProfile.php', 'error', 'You must be at least 15 years old');
        }
        if ($bio == "") {
            $bio = null;
        }
        
        // Update user info
        mysqli_stmt_bind_param($change_user_info_prepared, 'sssssi', $email, $surname, $name, $birthdate, $bio, $author_id);
        $change_user_info = writeDB($change_user_info_prepared);

        // Update profile picture
        if ($pp) {
            $pp_path = '/assets/images/pp/pp-' . $author_id . '.png';
            move_uploaded_file($pp['tmp_name'], DOCUMENT_ROOT . $pp_path);
            closeDB($mysqli);
            redirect('/src/pages/profile.php', 'success', 'Profile updated successfully');
        }
        else {
            if ($change_user_info) {
                closeDB($mysqli);
                redirect('/src/pages/profile.php', 'success', 'Profile updated successfully');
            }
            else {
                closeDB($mysqli);
                redirect('/src/pages/updateProfile.php', 'error', 'Failed to change info');
            }
        }
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/updateProfile.php', 'error', 'Failed to change info. Please login.');
    }
}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('src/pages/updateProfile.php', 'error', 'Invalid request. Please use the form.');
}