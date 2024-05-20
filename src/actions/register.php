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

    require_once(DOCUMENT_ROOT . '/src/utils/validInputs.php');

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $old_password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];

    // Validate form data
    if (empty($username) || empty($email) || empty($old_password) || empty($password_confirm) || empty($surname) || empty($name) || empty($birthdate)) {
        redirect('/src/pages/register.php', 'error', 'Please fill in all fields');
    }
    
    if ($old_password !== $password_confirm) {
        redirect('/src/pages/register.php', 'error', 'Passwords do not match');
    }
    
    if (!validPassword($old_password)) {
        redirect('/src/pages/register.php', 'error', 'Invalid password. Please use at least 8 characters, one uppercase, one lowercase, one digit and one special character');
    }

    if (!validEmail($email)) {
        redirect('/src/pages/register.php', 'error', 'Invalid email');
    }

    if (!validUsername($username)) {
        redirect('/src/pages/register.php', 'error', 'Invalid username. Please use 3-25 characters, letters, numbers, underscores and hyphens');
    }

    if (!validName($surname) || !validName($name)) {
        redirect('/src/pages/register.php', 'error', 'Invalid name. Please use 2-50 characters, letters, spaces and hyphens');
    }

    // Check if user is at least 15 years old
    $birthdate = date('Y-m-d', strtotime($birthdate));
    $min_birthdate = date('Y-m-d', strtotime('-15 years'));
    if ($birthdate > $min_birthdate) {
        redirect('/src/pages/register.php', 'error', 'You must be at least 15 years old to register');
    }
    
    // Check if user already exists
    mysqli_stmt_bind_param($user_exists_prepared, 'ss', $username, $email);
    $user_exists = readDB($user_exists_prepared);

    if ($user_exists) {
        closeDB($mysqli);
        redirect('/src/pages/login.php', 'error', 'User already exists. Try logging in.');
    }


    // Hash password
    $hashed_password = hashPassword($old_password);

    // Insert user into database
    mysqli_stmt_bind_param($insert_user_prepared, 'ssssss', $username, $email, $hashed_password, $surname, $name, $birthdate);
    $insert_user = writeDB($insert_user_prepared);

    if ($insert_user) {        
        // Log in user
        mysqli_stmt_bind_param($user_login_prepared, 's', $username);
        $user_login = readDB($user_login_prepared)[0];
        
        session_start();
        $_SESSION['user_id'] = $user_login['id'];
        $_SESSION['role'] = $user_login['role'];
        
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

    redirect('src/pages/register.php', 'error', 'Invalid request. Please use the form.');
}