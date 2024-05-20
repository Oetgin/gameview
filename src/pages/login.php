<?php

// Affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Imports
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/config/dbConfig.php');
require_once(DOCUMENT_ROOT . '/src/utils/dbQueries.php');

require_once(DOCUMENT_ROOT . '/src/static/head.php');
require_once(DOCUMENT_ROOT . '/src/static/header.php');
require_once(DOCUMENT_ROOT . '/src/static/footer.php');
require_once(DOCUMENT_ROOT . '/src/static/nav.php');

require_once(DOCUMENT_ROOT . '/src/components/article-card.php');


?>
<!DOCTYPE html>

<html lang="fr">
    

    <?php
        $mysqli = connectionDB();
        includeHead('/src/styles/pages/register.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
            <form action="/src/actions/login.php" method="post" class="classic-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Log In</button>
            <?php
                // Redirect messages
                
                if (isset($_GET['redirect']) && isset($_GET['msg'])) {
                    // Prevent XSS
                    echo '<div class="from-group redirect redirect-'.htmlspecialchars($_GET['redirect']).'"><p>'.htmlspecialchars($_GET['msg']).'</p></div>';
                }
            ?>
                <div class="form-group form-section">
                    <p>Don't have an account?</p>
                    <button type="button" onclick="window.location.href='/src/pages/register.php'">Register</button>
                </div>
            </form>
        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>