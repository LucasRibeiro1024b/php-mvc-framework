<?php

class auth {
    static function attempt($callback)
    {
        
    }

    static function logged()
    {
       return array_key_exists(config::app()->PROJECT_CODE, $_SESSION);
    }
}