<?php

class view {
    static function render ($path, $vars = [])
    {
        $include = "";

        if ((string) strpos($path, '.') != '')
        {
            list($dir, $file) = explode('.', $path);
            $include = $dir . '/' . $file . '.php';
        }
        else
        {
            $include = $path . '.php';
        }

        $dir = 'view/pages';

        if (file_exists($dir . $include))
        {
            if (count($vars))
            {
                foreach ($vars as $key => $value)
                {
                    $$key = $value;
                }
            }

            include $dir . $include;
        }
        else
        {
            die("File doesn't exist!");
        }
    }
}