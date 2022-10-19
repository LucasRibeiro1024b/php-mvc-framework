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

        try {
            if ($route != '')
            {
                if (!in_array($route, \middleware::$exceptLog))
                {
                    if (!\auth::logged())
                    {
                        throw new Exception('Access denied - 403', 1);
                    }

                    if ((string)\strpos($route, '/') != '')
                    {
                        
                    }
                }
            }
        }
        catch(\Exception $e) {
            if ($type == 'view')
            {
                die($e->getMessage());
            }
            else if ($type == 'api')
            {
                die(json_encode(['cod' => 2, 'message' => $e->getMessage()]));
            }
        }
    }
}