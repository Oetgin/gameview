<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');

function includeReview($reviewer_name, $pp_path, $date, $played_time, $grade, $title, $content) {
    if(intval($grade) > 79) {
        $background_class = "good";
    } else if (intval($grade) < 80 && intval($grade) > 39) {
        $background_class = "average";
    } else{
        $background_class = "bad";
    }

    echo '
    <div class="review-wrapper">
        <div class="review-container">
            <div class="grade ' .$background_class. '">
                ' .$grade. '
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
                    Le ' .$date. ' par :
                </div>

                <div class="reviewer-container">
                    <div class="reviewer-pp">
                        <img src="' .$pp_path. '" alt="User profile pic">
                    </div>
                    
                    <div class="reviewer-info">
                        <div class="reviewer-name">' .$reviewer_name. '</div>
                        <div class="reviewer-time">A joué <span>' .$played_time. ' h</span> à Cyberpunk 2077</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}

