<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
require_once(DOCUMENT_ROOT . '/src/utils/login.php');

function profilePicture($id=false) {
    // RETURNS the profile picture of the user
    if (!loggedIn()) {
        return '<img src="'.DEFAULT_PP_PATH.'" alt="user" class="profile-picture"'. ($id?" id=\"$id\"":"").'>';
    }
    else {
        $user_id = getId();
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/images/pp/pp-'.$user_id.'.png')) {
            return '<img src="'.DEFAULT_PP_PATH.'" alt="user" class="profile-picture"'. ($id?" id=\"'$id'\"":"").'>'; // Default profile picture
        }
        else {
            return '<img src="/assets/images/pp/pp-'.$user_id.'.png?'.microtime().'" alt="profile picture" class="profile-picture"'. ($id?" id=\"$id\"":"").'>'; // Add microtime to force refresh
        }
    }
}