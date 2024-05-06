<?php

function redirect($url, $type, $message) {
    header('Location: ' . $url . '?redirect=' . $type . '&msg=' . $message);
    exit();
}