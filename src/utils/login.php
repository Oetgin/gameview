<?php

function loggedIn() {
    return isset($_SESSION['user_id']);
}

function getId() {
    return $_SESSION['user_id'];
}
