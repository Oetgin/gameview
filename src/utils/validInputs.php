<?php

function validUsername($username) {
    return preg_match('/^[a-zA-Z0-9_-]{3,25}$/', $username); // 3-25 characters, letters, numbers, underscores and hyphens
}

function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z])(?:\S){8,100}$/', $password); // 8-100 characters, at least one lowercase, one uppercase, one digit, one special character, no whitespace
}

