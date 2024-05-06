<?php
// Remember to bind statements before executing them

$mysqli = connectionDB();

// REGISTER
$user_exists_query = "SELECT * FROM user WHERE username = ? OR email = ?";
$insert_user_query = "INSERT INTO user (username, email, password, surname, name, birthdate) VALUES (?, ?, ?, ?, ?, ?)";

$user_exists_prepared = mysqli_prepare($mysqli, $user_exists_query);
$insert_user_prepared = mysqli_prepare($mysqli, $insert_user_query);


// LOGIN


// ARTICLES


// COMMENTS



