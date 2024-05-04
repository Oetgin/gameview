<?php

function getScoreBar($rating) {
    /* TODO */

    // If we want dynamic styles with PHP, we need to put the style directly in the HTML
    return '
    <div class="score-bar" style="background-color:' . getColor($rating, true) . '">
        <div class="score-bar-progress" style="width:' . $rating * 10 . '%;background-color:' . getColor($rating, false) . '">
        </div>
    </div>
    ';
}

function getColor($rating, $dark=false) {
    if ($dark) {
        $lightness = 50;
        $saturation = 25;
    } else {
        $lightness = 75;
        $saturation = 50;
    }
    $hue = $rating * 12; // 120 is green, 0 is red

    return "hsl($hue, $saturation%, $lightness%)";
}