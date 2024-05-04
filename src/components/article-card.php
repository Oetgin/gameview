<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/components/score-bar.php');

function includeArticleCard($game_name, $image_path, $title, $description, $rating, $author_name, $author_role, $author_image) {
    echo '
    <div class="article-card">
        <div class="article-card-image">
            <img src="'.$image_path.'" alt="'.$game_name.'">
            <div class="article-card-image-title">
                <h3>'.$game_name.'</h3>
            </div>
        </div>
            <div class="article-card-content">
            <div class="article-card-title">
                <h3>'.$title.'</h3>
            </div>
            ' .
            getScoreBar($rating) 
            . '
            <div class="article-card-description">
                <p>'.$description.'</p>
            </div>
            <div class="article-card-author">
                <div class="article-card-author-info">
                    <p>'.$author_name.'</p>
                    <p>'.$author_role.'</p>
                </div>
                <div class="article-card-author-image">
                    <img src="'.$author_image.'" alt="'.$author_name.'">
                </div>
            </div>
        </div>
    </div>
    ';
}