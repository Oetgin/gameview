<?php

function includeHeader() {
    echo '
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="assets/icons/logo/small/logo-white.svg" alt="logo">
            </a>
        </div>
        <div class="search-bar">
            <img src="assets/icons/search.svg" alt="search">
            <input type="text" placeholder="Search">
        </div>
        <div class="user">
            <a href="login.php">
                <img src="assets/icons/user-icon-hollow-black.png" alt="user">
            </a>
        </div>
    </header>    
    ';
}