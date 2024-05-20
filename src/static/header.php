<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/login.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/user.php');

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
        <div class="right">
            '. editorLink() .'
            '. moderationLink() .'
            <div class="user">
                <a href="' . profileLink() . '">
                    '. profilePicture() .'
                </a>
            </div>
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

function editorLink() {
    if (loggedIn() && (getUserRole() == 'Éditeur' || getUserRole() == 'Administrateur')){
        return '
                <a class="btn header-btn" href="/src/pages/editor-dashboard.php">
                    Éditer
                </a>
                ';
    }
    else {
        return '';
    }
}

function moderationLink() {
    if (loggedIn() && getUserRole() == 'Administrateur'){
        return '
                <a class="btn header-btn" href="/src/pages/moderation-dashboard.php">
                    Modérer
                </a>
                ';
    }
    else {
        return '';
    }
}