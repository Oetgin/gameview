<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

require_once(DOCUMENT_ROOT . '/src/components/score-bar.php');

function includeArticleCard($article_id, $game_name, $game_id, $title, $description, $rating, $author_name, $author_role, $author_id) {
    $rating = $rating/10; // Convert rating from 0-100 to 0-10
    echo '
    <a href="/src/pages/article.php?id='.$article_id.'">
        <div class="article-card">
            <div class="article-card-image">
                <img src="/assets/images/covers/cover-'.$game_id.'.png" alt="'.$game_name.'">
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
                <div class="article-card-bottom">
                    <div class="article-card-description">
                        <p>'.$description.'</p>
                    </div>
                    <div class="article-card-author">
                        <div class="article-card-author-info">
                            <p>'.$author_name.'</p>
                            <p>'.$author_role.'</p>
                        </div>
                        <div class="article-card-author-image">
                            <img src="/assets/images/pp/pp-'.$author_id.'.png" alt="'.$author_name.' class="profile-picture">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    ';
}