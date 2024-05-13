<?php

echo '<div class="process-message">
<p>Trying to log out</p>
</div>';

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');
require_once(DOCUMENT_ROOT . '/src/utils/login.php');

if (loggedIn()) {
    session_start();
    session_destroy();
    redirect('/index.php', 'success', 'Logged out successfully');
}
else {
    redirect('/index.php', 'error', 'You are not logged in');
}
