<?php

class controller {
    static function render() {
        $route = "";
        $type = "";

        if(get('view')) {
            $route = get('view');
            $type = 'view';
        }

        if(get('api')) {
            $route = get('api');
            $type = 'api';
        }
    }
}