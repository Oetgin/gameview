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
        require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
        includeHead('/src/styles/pages/deleteAccount.css');
    ?>

    <body>
        
        <?php includeHeader(); ?>

        <main>
        <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

            require_once(DOCUMENT_ROOT . '/src/utils/login.php');
            
            if (!loggedIn()) {
                require_once(DOCUMENT_ROOT . '/src/utils/redirect.php');
                redirect('/src/pages/login.php', 'error', 'You must log in');
            }
            
            else {
                require_once(DOCUMENT_ROOT . '/src/utils/preparedQueries.php');
                $user_id = getId();
                
                mysqli_stmt_bind_param($user_info_prepared, 'i', $user_id);
                $user_info = readDB($user_info_prepared)[0];
        ?>
            <div class="delete-account">
                <h2>Modifier mon mot de passe</h2>
                <p>Êtes-vous sûr de vouloir modifier votre mot de passe ?</p>
                <form action="/src/actions/changePassword.php" method="post" class="classic-form">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="form-group">
                        <label for="old-password">Acien mot de passe</label>
                        <input type="password" name="old-password" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="new-password">Nouveau mot de passe</label>
                        <input type="password" name="new-password" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmer le mot de passe</label>
                        <input type="password" name="confirm-password" placeholder="Mot de passe">
                    </div>
                    <input type="submit" class="button button-danger" value="Modifier mon mot de passe">
                <?php
                // Redirect messages
                
                if (isset($_GET['redirect']) && isset($_GET['msg'])) {
                    // Prevent XSS
                    echo '<div class="redirect redirect-'.htmlspecialchars($_GET['redirect']).'">'.htmlspecialchars($_GET['msg']).'</div>';
                }
            ?>
                </form>


            </div>

                <?php
            }
        ?>
        </main>

    </body>

    <?php
        includeFooter();
        closeDB($mysqli);
    ?>


</html>