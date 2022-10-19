<?php

class auth {
    static function attempt($callback)
    {
        
    }

    private function permissions ()
    {
        return explode(',', $_SESSION[config::app()->PROJECT_CODE]->permission);
    }

    static function validateAccessRoute ($route)
    {
        if (array_key_exists(config::app()->PROJECT_CODE, $_SESSION))
        {
            if ($_SESSION[config::app()->PROJECT_CODE]->nivel == 'MASTER')
            {
                return true;
            }
            else
            {
                $codeRoutes = array_map(
                    function ($item)
                    {
                        return $item['routes'];
                    },
                    permissions::$config
                );

                foreach ($codeRoutes as $code => $routes)
                {
                    if (in_array($route, $routes))
                    {
                        return in_array($code, self::permissions());
                    }
                }

                throw new Exception("Access denied! You don't have permission to access this resource.", 1);
            }
        }
    }

    static function logged()
    {
        if (array_key_exists(config::app()->PROJECT_CODE, $_SESSION))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}