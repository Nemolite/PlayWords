<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 8:57
 */

namespace Core;

use Controller\LoginController;
use Controller\RegisterController;
use Controller\GameController;
use Controller\HomeController;


class Router {

  protected static $routes=[]; // table
  protected  static $route =[]; // current

    public $controller_info = [];

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
           $dir = "Controller";
           $file_controller = $_SERVER['DOCUMENT_ROOT'].'\\' .$dir .'\\'. $controller.'.php';

           if (is_file($file_controller)) {

            require_once $file_controller;
               $obj = new $controller;
               $obj->index();

           }else{
               //not file
               sprintf('File $s does not exist',$file_controller);
           }

        }else {
            //redirct
        }
    }

}
