<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/utils/login.php');

if (!loggedIn()) {
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');
    redirect('/src/pages/login.php', 'error', 'You must be logged in to access this page');
}

else {
    require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
}