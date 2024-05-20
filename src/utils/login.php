<?php

function loggedIn() {
    session_start();
    $logged_in = isset($_SESSION['user_id']);
    session_write_close();
    return $logged_in;
}

function getId() {
    session_start();
    $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    session_write_close();
    return $id;
}
