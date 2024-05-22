<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');
require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to redirect you to the right page</p>
    </div>';
    
    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');

    $mysqli = connectionDB();

    // Get the info
    $redirect = $_GET['redirect'];
    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if ($redirect == "game-creator") {

        header('Location: ../pages/game-creator.php');
        exit();

    } else if ($redirect == "article-creator") {

        $game_info = $_POST['article-creator'];

        if ($game_info == "Nouveau jeu") {

            header('Location: ../pages/game-creator.php?redirect=article-creator');
            exit();

        } else {

            preg_match('/\((\d+)\)/', $game_info, $matches);
            if (empty($matches)) {
                header('Location: ../pages/editor-dashboard.php?error=Le+jeu+n%27existe+pas&select=article-creator');
                exit();
            }

            $game_id = $matches[1];

            // Check if the game exists
            $game = readQuery($mysqli, "SELECT * FROM game WHERE id = $game_id");

            if (empty($game)) {
                header('Location: ../pages/editor-dashboard.php?error=Le+jeu+n%27existe+pas&select=article-creator');
                exit();
            }

            header('Location: ../pages/article-editor.php?id=' . $game_id);
            exit();

        }

    } else if ($redirect == "article-editor") {

        $game_info = $_POST['article-editor'];

        preg_match('/\((\d+)\)/', $game_info, $matches);
        if (empty($matches)) {
            header('Location: ../pages/editor-dashboard.php?error=L%27article+n%27existe+pas&select=article-editor');
            exit();
        }
        $game_id = $matches[1];

        header('Location: ../pages/article-editor.php?id=' . $game_id);
        exit();

    }

    // Redirect
    closeDB($mysqli);
    exit;

}
else {
    echo 'la requet methode n est pas post wtf';
}