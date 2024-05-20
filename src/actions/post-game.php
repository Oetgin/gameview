<?php

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="process-message">
    <p>Trying to post your article</p>
    </div>';
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

    require_once(DOCUMENT_ROOT . '/src/utils/hash.php');
    require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');

    require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
    require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');
    

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $title = $_POST['title'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $synopsis = $_POST['synopsis'];

    $mysqli = connectionDB();
    require_once(DOCUMENT_ROOT . '/src/utils/article.php');

    // ____________Check that game doesnt already exists____________
    mysqli_stmt_bind_param($check_game_name_prepared, "s", $title);
    $game_already_existing = readDB($check_game_name_prepared);

    if ($game_already_existing) {
        echo 'This game already exists';

        if (isset($_GET["redirect"])) {
            header('Location: ../pages/game-creator.php?error=Le+jeu+existe+déjà&redirect=article-creator');
            exit();
        } else {
            $header_location = "../actions/post-game.php";
        }
        
    }

    // ____________Prepare the redirection if the user comes from the article creation____________
    if (isset($_GET["redirect"])) {
        if ($_GET["redirect"] == "article-creator") {
            $header_location = "../pages/article-editor.php?id=".$game_id;
        } else {
            $header_location = "../actions/post-game.php";
        }
    } else {
        $header_location = "../actions/post-game.php";
    }


    // ____________Modify/create the game____________
    // Create the new game
    mysqli_stmt_bind_param($create_game_prepared, "ssds", $title, $date, $price, $synopsis);
    writeDB($create_game_prepared);
    $game_id = mysqli_insert_id($mysqli);

    // Create the game categories
    $game_categories = $_POST['categories'];

    foreach ($game_categories as $name => $checked) {
        mysqli_stmt_bind_param($create_game_categories_prepared, "ss", $game_id, $name);
        writeDB($create_game_categories_prepared);
    }

    // Create the game plateforms
    $game_plateforms = $_POST['platforms'];
    
    foreach ($game_plateforms as $name => $checked) {
        mysqli_stmt_bind_param($create_game_plateforms_prepared, "ss", $game_id, $name);
        writeDB($create_game_plateforms_prepared);
    }

    // Create the game cover
    move_uploaded_file($_FILES['cover']['tmp_name'], DOCUMENT_ROOT . '/assets/images/covers/' . basename('cover-'.$game_id . '.png'));

    // Create the game background video
    move_uploaded_file($_FILES['background-video']['tmp_name'], DOCUMENT_ROOT . '/assets/videos/article-backgrounds/' . basename('background-'.$game_id . '.mp4'));
    


    // ____________Prepare the redirection____________
    if (isset($_GET["redirect"])) {
        if ($_GET["redirect"] == "article-creator") {
            $header_location = "../pages/article-editor.php?id=".$game_id;
        } else {
            $header_location = "../pages/editor-dashboard.php?msg=Le+jeu+a+bien+été+créé";
        }
    } else {
        $header_location = "../pages/editor-dashboard.php?msg=Le+jeu+a+bien+été+créé";
    }


    // Redirect
    closeDB($mysqli);
    header('Location: '.$header_location);
    exit;

}
else {
    header('Location: ../../index.php');
}