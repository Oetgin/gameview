<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/config/constants.php');


function includeArticleHeader($game_id, $game_name, $title, $author_name) {

    $background_video_type = 'mp4';
    $background_video_path = '/assets/videos/article-backgrounds/background-' .$game_id.'.' .$background_video_type. '';  


    echo '
    
    <section class="title-section">
        <div class="title-content">
            <h2 class="game">' .stripslashes($game_name). '</h2>
            <p class="title">"' .stripslashes($title). '"</p>
            <p class="reviewer">Review par ' .stripslashes($author_name). '</p>
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


function includeArticleRecap($title, $date, $categories, $price, $synopsis, $cover_path, $article_rating, $global_rating, $platforms) {
    // Clean categories display
    if(count($categories) == 0){
        $categories_string = "";
    } else {
        $categories_string = $categories[0];
    }

    if (count($categories) > 1) {
        foreach($categories as $key => $value) {
            if ($key > 0){
                $categories_string = $categories_string . ', ' . $value;
            }
        }
    }

    // Clean game platforms display
    $game_platforms_display = "";
    foreach($platforms as $key => $value) {
        $game_platforms_display = $game_platforms_display . '<img class="platform" src="/assets/icons/platforms/'. strtolower($value) .'.svg" alt="Plateform '. $value .'">';
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

    if ($global_rating == null) {
        $global_rating_background_class = "na";
        $global_rating_text = "N/A";
    }
    else if(intval($global_rating) > 79) {
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
        <div class="cover-and-platforms-wrapper">
            <div class="cover-wrapper">
                <img class="cover" src="' .$cover_path. '" alt="Cyberpunk Cover">
                <div class="platforms-container">
                    '.$game_platforms_display.'
                </div>
            </div>
        </div>
        
        <div class="game-info-container">
            <p class="game-title">' .stripslashes($title). '</p>
            <p class="release-date"><span class="underline">Date de sortie :</span> ' .$date. '</p>
            <p class="devs"><span class="underline">Prix :</span> ' .$price. '</p>
            <p class="game-type"><span class="underline">Genre :</span> ' .stripslashes($categories_string). '</p>
            <p class="-game-description">'.stripslashes(nl2br($synopsis)).'</p>
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
                    <p class="grade-info-title">Note des joueurs</p>
                    <p class="grade-info-more">' .$global_rating_text. '</p>
                </div>
            </div>
    </div>
</section>
    ';
}


function includeArticleContent($article_id, $game_name, $article_title, $content, $article_rating, $points) {
    // Grade display
    if(intval($article_rating) > 79) {
        $article_rating_background_class = "good";
    } else if (intval($article_rating) < 80 && intval($article_rating) > 39) {
        $article_rating_background_class = "average";
    } else{
        $article_rating_background_class = "bad";
    }

    echo '
        <section class="article-section">
            <h3 class="article-catch">' .stripslashes($game_name). ' : ' .stripslashes($article_title). '</h3>

    ';
    $img_number = 0;
    foreach($content as $key => $value) {
        $type = $value[0];
        $element_content = $value[1];

        if ($type == "intro") {

            echo '
                <p class="intro">
                    ' .stripslashes(nl2br($element_content)). '
                </p> 
            ';

        } else if ($type == "part-title") {

            echo '
                <h4 class="part-title">
                    ' .stripslashes($element_content). '
                </h4>
            ';

        } else if ($type == "corpus") {

            echo '
            <p class="corpus">
                ' .stripslashes(nl2br($element_content)). '
            </p>
            ';

        } else if ($type == "image") {

            $image_path = '/assets/images/articles/article-'.$article_id.'/img-'.$img_number.'.png';
            $image_caption = stripslashes($element_content[1]);
            $image_alt = stripslashes($element_content[2]);

            echo '
            <div class="image-container">
                <img class="image" src="' .$image_path. '" alt="' .$image_alt. '">
                <p class="caption">
                    ' .$image_caption. '
                </p>
            </div>
            ';

            $img_number ++;

        } else {
            
            // If the types doesnt exist (it should not happen anyways) we consider its just text
            echo '
                <p class="corpus">
                    ' .$element_content. '
                </p>
            ';

        }
    }

    echo '

            <div class="final-grade-plus-minus-wrapper">
                <div class="plus-minus-wrapper">
                    <div class="final-grade-container">
                        <div class="final-grade-title">
                            La note de GameView
                        </div>
                        <div class="grade ' .$article_rating_background_class. '">
                                '.$article_rating.'
                        </div>
                    </div>

                    <div class="plus-minus-container">
                        <div class="plus-container column">
                            <div class="column-title">
                                Points forts
                            </div>
                            <ul>
    ';

    // display positive points
    $positive_points = $points[0];
    foreach ($positive_points as $key => $value) {
        echo '<li class="plus">' .stripslashes($value). '</li>';
    }

    echo '
                            </ul>
                        </div>
                        
                        <div class="minus-container column">
                            <div class="column-title">
                                    Points faibles
                            </div>
                            <ul>
    ';

    // display positive points
    $negative_points = $points[1];
    foreach ($negative_points as $key => $value) {
        echo '<li class="minus">' .stripslashes($value). '</li>';
    }

    echo '
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    ';
}