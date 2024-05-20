<?php

function redirect($url, $type, $message) {
    // Check if the URL already has a query string
    if (strpos($url, '?') !== false) {
        $url = $url . '&redirect=' . $type . '&msg=' . $message;
    } else {
        $url = $url . '?redirect=' . $type . '&msg=' . $message;
    }

    header('Location: ' . $url);
    exit();
}