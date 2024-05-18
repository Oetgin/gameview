<?php

function includeHead($stylesheet_path) {
    // Update last connection date
    require_once $_SERVER['DOCUMENT_ROOT'].'/src/config/constants.php';
    require_once DOCUMENT_ROOT.'/src/utils/dbQueries.php';

    if (loggedIn()) {
        $mysqli = connectionDB();
        $user_id = getId();
        $query = "UPDATE user SET lastConnection = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // To use the stylsheet related to the page
    if ($stylesheet_path != DEFAULT_STYLE_PATH) {
        $stylesheet = '<link rel="stylesheet" href="'.$stylesheet_path.'">';
    } else {
        $stylesheet = '';
    }

    echo '
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="'.META_DESCRIPTION.'">
        <meta name="keywords" content="'.META_KEYWORDS.'">
        <meta name="author" content="'.META_AUTHOR.'">


        <link rel="stylesheet" href="'.NORMALIZE_PATH.'">
        <link rel="stylesheet" href="'.DEFAULT_STYLE_PATH.'">
        ' .$stylesheet. '

        <link rel="icon" type="image/x-icon" href="'.LOGO_BLUE_PATH.'">
        <title>'.WEBSITE_TITLE.'</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montaga&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    </head>
    ';
}