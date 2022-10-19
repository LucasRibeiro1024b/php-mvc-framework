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
                }

                if ((string)\strpos($route, '/') != '')
                {
                    list($class, $method) = explode('/', $route);
                    $cls = '\\app\\controller\\'.$class.'Controller';

                    if (class_exists($cls))
                    {
                        $instance = new $cls;

                        if (method_exists($instance, $method))
                        {
                            if ($route != 'login/destroy' && $route != 'login/run')
                            {
                                auth::validateAccessRoute($route);
                            }

                            echo $instance->$method;
                        }
                        else 
                        {
                            throw new Exception("The method " . $method . " doesn't exist in " . $cls, 1);
                        }
                    }
                    else
                    {
                        throw new Exception("The class " . $cls . " doesn't exist!", 1);
                    }
                }
                else
                {
                    throw new Exception("Invalid route " . get('view'), 1);
                }
            }
            else
            {
                if (\auth::logged())
                {
                    \app\controller\homeController::page();
                }
                else
                {
                    \app\controller\loginController::page();
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