<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');


function includeArticleHeader($game_id, $game_name, $title, $author_name) {

    $background_video_type = 'mp4';
    $background_video_path = '/assets/videos/article-backgrounds/background-' .$game_id.'.' .$background_video_type. '';  


    echo '
    
    <section class="title-section">
        <div class="title-content">
            <h2 class="game">' .$game_name. '</h2>
            <p class="title">"' .$title. '"</p>
            <p class="reviewer">Review par ' .$author_name. '</p>
        </div>
        <div class="background-video">
            <video class="boomerang" id="background-video" autoplay loop muted plays-inline>
                <source src="' .$background_video_path. '" type="video/' .$background_video_type. '">
            </video>
            <div class="gradient"></div>
        </div>
    </section>
    
    ';
}


function includeArticleRecap($title, $date, $categories, $price, $synopsis, $cover_path, $article_rating, $global_rating) {

    // Clean categories display
    if(count($categories[0]) == 0){
        $categories_string = "";
    } else {
        $categories_string = $categories[0]["category"];
    }

    if (count($categories[0]) > 1) {
        foreach($categories[0] as $key => $value) {
            $categories_string = $categories_string . ', ' . $value;
        }
    }

    // Grade display
    if(intval($article_rating) > 79) {
        $article_rating_background_class = "good";
        $article_rating_text = "Très favorable";
    } else if (intval($article_rating) < 80 && intval($article_rating) > 49) {
        $article_rating_background_class = "average";
        $article_rating_text = "Généralement favorable";
    } else if (intval($article_rating) < 50 && intval($article_rating) > 39) {
        $article_rating_background_class = "average";
        $article_rating_text = "Peu favorable";
    } else{
        $article_rating_background_class = "bad";
        $article_rating_text = "Défavorable";
    }

    if(intval($global_rating) > 79) {
        $global_rating_background_class = "good";
        $global_rating_text = "Très favorable";
    } else if (intval($global_rating) < 80 && intval($global_rating) > 49) {
        $global_rating_background_class = "average";
        $global_rating_text = "Généralement favorable";
    } else if (intval($global_rating) < 50 && intval($global_rating) > 39) {
        $global_rating_background_class = "average";
        $global_rating_text = "Peu favorable";
    } else {
        $global_rating_background_class = "bad";
        $global_rating_text = "Défavorable";
    }
    

    // Include the section
    echo '
    <section class="recap-section">
    <div class="game-container">
        <img class="cover" src="' .$cover_path. '" alt="Cyberpunk Cover">
        <div class="game-info-container">
            <p class="game-title">' .$title. '</p>
            <p class="release-date"><span class="underline">Date de sortie :</span> ' .$date. '</p>
            <p class="devs"><span class="underline">Prix :</span> ' .$price. '</p>
            <p class="game-type"><span class="underline">Genre :</span> ' .$categories_string. '</p>
            <p class="-game-description">'.$synopsis.'</p>
        </div>
    </div>

    <div class="reviews-container">
            <div class="grade-container">
                <div class="grade article-grade ' .$article_rating_background_class. '">
                    ' .$article_rating. '
                </div>
                <div class="grades-info-container">
                    <p class="grade-info-title">Note de Gameview</p>
                    <p class="grade-info-more">' .$article_rating_text. '</p>
                </div>
            </div>
            <div class="grade-container">
                <div class="grade global-grade ' .$global_rating_background_class. '">
                    ' .$global_rating. '
                </div>
                <div class="grades-info-container">
                    <p class="grade-info-title">Votre note</p>
                    <p class="grade-info-more">' .$global_rating_text. '</p>
                </div>
            </div>
    </div>
</section>
    ';
}


function includeArticleContent($article_id, $game_name, $image_path, $title, $description, $rating) {

}



function includeReview($reviewer_name, $pp_path, $date, $played_time, $rating, $title, $content) {
    if(intval($rating) > 79) {
        $background_class = "good";
    } else if (intval($rating) < 80 && intval($rating) > 39) {
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
                ' .$rating. '
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

