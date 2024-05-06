<?php

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT); // Hash the password (salt included in the hash)
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}