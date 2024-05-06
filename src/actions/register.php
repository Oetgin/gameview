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
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];

    // Validate form data
    if (empty($username) || empty($email) || empty($password) || empty($password_confirm) || empty($surname) || empty($name) || empty($birthdate)) {
        redirect('/src/pages/register.php', 'error', 'Please fill in all fields');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check if email is valid
        redirect('/src/pages/register.php', 'error', 'Invalid email');
    }

    if ($password !== $password_confirm) {
        redirect('/src/pages/register.php', 'error', 'Passwords do not match');
    }

    /* TODO : Add minimum password requirements */


    // Check if user already exists
    mysqli_stmt_bind_param($user_exists_prepared, 'ss', $username, $email);
    $user_exists = readDB($user_exists_prepared);

    if ($user_exists) {
        closeDB($mysqli);
        redirect('/src/pages/login.php', 'error', 'User already exists. Try logging in.');
    }


    // Hash password
    $hashed_password = hashPassword($password);

    // Insert user into database
    mysqli_stmt_bind_param($insert_user_prepared, 'ssssss', $username, $email, $hashed_password, $surname, $name, $birthdate);
    $insert_user = writeDB($insert_user_prepared);

    if ($insert_user) {
        closeDB($mysqli);
        redirect('/index.php', 'success', 'Account created successfully');
    }
    else {
        closeDB($mysqli);
        redirect('/src/pages/register.php', 'error', 'Failed to create account');
    }

}
else {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    redirect('/register.php', 'error', 'Invalid request. Please use the form.');
}