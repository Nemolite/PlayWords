<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 8:57
 */

namespace Controller;

use Controller\HomeController;


class Router {

  public $controller;

  protected static $routes=[]; // table
  protected  static $route =[]; // current

    /**
     * @param $reg
     * @param array $route
     */
  public static function add($reg, $route =[])
  {
      self::$routes[$reg] = $route;
  }

   // for testing
    /**
     * @return array
     */
  public static function getRoutes()
  {
      return self::$routes;
  }

    /**
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    public static function compareRoute($url)
    {
        foreach(self::$routes as $pattern => $route)
        {
            if ($url==$pattern) {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //dispacher

    public static function dipacher($url)
    {
        if (self::compareRoute($url)){
           $controller = self::$route['controller'];

           $file_controller = __DIR__.'\\'.$controller.'.php';
           if (is_file($file_controller)) {
               switch ($url) {
                   case '/':
                       $obj = new HomeController();
                       break;
                   case '/login':
                       $obj = new LoginController();
                       break;
                   case '/register':
                       $obj = new RegisterController();
                       break;
                   default:
                       echo "404";
               }
           }else{
               //not file
               sprintf('File $s does not exist',$file_controller);
           }



        }else {
            //redirct
        }
    }

}