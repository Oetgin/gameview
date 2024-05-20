<?php

function includeReview($reviewer_name, $pp, $date, $played_time, $rating, $title, $content, $game_name) {
    if(intval($rating) > 7.9) {
        $background_class = "good";
    } else if (intval($rating) < 8 && intval($rating) > 3.9) {
        $background_class = "average";
    } else{
        $background_class = "bad";
    }

    echo '
    <div class="review-wrapper">
        <div class="review-container">
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
                    <div class="reviewer-pp">
                        '. $pp .'
                    </div>
                    
                    <div class="reviewer-info">
                        <div class="reviewer-name">' .stripslashes($reviewer_name). '</div>
                        <div class="reviewer-time">A joué <span>' .$played_time. ' h</span> à '. $game_name .'</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
