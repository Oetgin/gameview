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
        includeHead('/src/styles/pages/profile.css');
        ?>

<body>
    
    <?php includeHeader(); ?>
    <script src="/src/pages/updateProfile.js" defer></script>
    
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
        <h2>Modifier mon profil</h2>
        <form class="modify-profile" action="/src/pages/updateProfile.php" method="post">
            <div class="profile">
                <div class="profile-main">
                    <div class="profile-user">
                        <div class="profile-picture">
                            <img src="/assets/images/pp/pp-<?php echo $user_id; ?>.png" alt="<?php echo $user_info['username']; ?>" id="profile-picture-image">
                            <div class="profile-picture-overlay">
                                <label for="profile-picture-input">Changer de photo de profil</label>
                                <input type="file" name="profile-picture-input" id="profile-picture-input">
                            </div>
                        </div>
                        <p class="username"><?php echo $user_info['username']; ?></p>
                    </div>
                    <div class="profile-info">
                        <label for="email" class="hide">Adresse email</label>
                        <input type="email" name="email" id="email" value="<?php echo $user_info['email']; ?>">
                        <div class="name">
                            <label for="surname" class="hide">Prénom</label>
                            <input type="text" name="surname" id="surname" value="<?php echo $user_info['surname']; ?>">
                            <label for="surname" class="hide">Nom</label>
                            <input type="text" name="name" id="name" value="<?php echo $user_info['name']; ?>">
                        </div>
                        <label for="birthdate" class="hide">Date de naissance</label>
                        <input type="date" name="birthdate" id="birthdate" value="<?php echo $user_info['birthdate']; ?>">
                    </div>
                </div>
                <div class="bio">
                    <h3>Bio</h3>
                    <label for="bio" class="hide">Écrivez quelques mots sur vous</label>
                    <textarea name="bio" id="bio"><?php echo ($user_info['bio']==null?"":$user_info['bio']); ?></textarea>
                </div>
                <div class="actions">
                    <div class="section">
                        <button type="submit" class="button">Enregistrer les modifications</button>
                        <a href="/src/pages/profile.php">
                            <button type="button" class="button" id="cancel">Annuler</button>
                        </a>
                    </div>
                    <div class="section">
                        <a href="/src/pages/changePassword.php">
                            <button type="button" class="button button-danger" id="update-password">Modifier mon mot de passe</button>
                        </a>
                        <a href="/src/pages/deleteAccount.php">
                            <button type="button" class="button button-danger" id="delete-account">Supprimer mon compte</button>
                        </a>
                    </div>
                </div>
            </div>
                
        </form>
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