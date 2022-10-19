<?php

namespace app\controller;

class homeController {

    public static function page ()
    {    
        \view::render('index');
    }

}