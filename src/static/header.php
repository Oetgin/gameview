<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/login.php');

function includeHeader() {
    echo '
    <header>
        <div class="logo">
            <a href="/index.php">
                <img src="/assets/icons/logo/small/logo-white.svg" alt="logo">
            </a>
        </div>
        <div class="search-bar">
            <form action="/src/pages/search.php" method="get">
                <button type="submit">
                    <img src="/assets/icons/search.svg" alt="search">
                </button>
                <input type="text" name="search" placeholder="Search">
            </form>
        </div>
        <div class="user">
            <a href="' . profileLink() . '">
                '. profilePicture() .'
            </a>
        </div>
    </header>
    ';
}

function profileLink() {
    if (loggedIn()) {
        return '/src/pages/profile.php';
    }
    else {
        return '/src/pages/login.php';
    }
}

function profilePicture() {
    if (!loggedIn()) {
        return '<img src="/assets/icons/user-icon-hollow-black.png" alt="user" class="profile-picture">';
    }
    else {
        $user_id = getId();
        return '<img src="/assets/images/pp/pp-'.$user_id.'.png" alt="profile picture" class="profile-picture">';
    }
}