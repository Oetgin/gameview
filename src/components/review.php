<?php

function includeReview($reviewer_id, $reviewer_name, $pp, $date, $played_time, $rating, $title, $content, $game_name, $review_id, $article_id) {
    if(intval($rating) > 79) {
        $background_class = "good";
    } else if (intval($rating) < 80 && intval($rating) > 39) {
        $background_class = "average";
    } else{
        $background_class = "bad";
    }

    echo '<script src="/src/components/review.js"></script>';

    echo '
    <div class="review-wrapper">
        <div class="review-container" id="review-'.$review_id.'" data-rating="'.$rating.'" data-title="'.$title.'" data-content="'.$content.'" data-canedit="'.(getId() == $reviewer_id ? 'true' : 'false').'" data-candelete="'.(isAdmin() || isModerator() || getId() == $reviewer_id ? 'true' : 'false').'" data-reviewer_id="'.$reviewer_id.'" data-reviewer_name="'.$reviewer_name.'" data-date="'.phpDateToFrenchDate($date).'" data-played_time="'.$played_time.'" data-game_name="'.$game_name.'" data-background_class="'.$background_class.'" data-article_id="'.$article_id.'">
            '.
            (isAdmin() || isModerator() || getId() == $reviewer_id ?
            '<div class="delete-review">
                <a class="delete-btn" href="/src/actions/deleteReview.php?id=' .$review_id. '&article-id='.$article_id.'">
                    <img src="/assets/icons/minus.svg" alt="Delete comment">
                    <div class="hover-msg">Supprimer ce commentaire</div>
                </a>
                '.
                (getId() == $reviewer_id ?
                
                '<button class="edit-btn" onclick="editReview('.$review_id.')">
                    <img src="/assets/icons/edit.svg" alt="Edit comment">
                    <div class="hover-msg">Modifier ce commentaire</div>
                </button>'
                :
                '')
                .'
            </div>'
            :
            '')
            .'
            <div class="grade ' .$background_class. '">
                ' .$rating. '
            </div>

            <div class="review-title">
                ' .$title. '
            </div>

            <div class="review-content">
                ' .$content. '
            </div>

            <div class="review-divider"></div>

            <div class="reviewer-wrapper">
                <div class="review-date">
                    Le ' .phpDateToFrenchDate($date). ' par :
                </div>

                <div class="reviewer-container">
                    <a class="reviewer-pp profile-btn btn" href="/src/pages/profile.php?id='.$reviewer_id.'">
                        '. $pp .'
                    </a>
                    
                    <div class="reviewer-info">
                        <a class="reviewer-name btn" href="/src/pages/profile.php?id='.$reviewer_id.'">' .stripslashes($reviewer_name). '</a>
                        <div class="reviewer-time">A joué <span>' .$played_time. ' h</span> à '. $game_name .'</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
