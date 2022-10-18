<?php

function get($key) {
    if(isset($_GET) && array_key_exists($key, $_GET)) {
        if(is_array($_GET[$key])) {
            return $_GET[$key];
        } else {
            return filter_input(INPUT_GET, $key, FILTER_DEFAULT);
        }
    } else {
        return '';
    }
}