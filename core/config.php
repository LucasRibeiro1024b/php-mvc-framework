<?php

class config
{
    static function app()
    {
        if (file_exists('.env'))
        {
            $config = parse_ini_file('.env');
            $stdClass = new stdClass;

            foreach ($config as $key => $value)
            {
                $stdClass->$key = $value;
            }

            return $stdClass;
        }
        else
        {
            die('Variables file is missing!');
        }
    }
}