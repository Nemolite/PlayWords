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
use Controller\AdminController;
use Core\ViewController;


class Router {

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

    public static function compareRoute($url)//доработать


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

              // echo "$controller";

           $fullControllerName = '\\Controller\\' . $controller;

               if (class_exists($fullControllerName)){
                   $obj = new $fullControllerName;
                   $obj->display();

                   //логика обработки регистрации

                   if ($controller=='RegisterController'){
                       $obj->rgisterUser();
                   }

                  // if ($controller=='GameController'){
                  //     $obj->locicGame();
                  // }

                }else{

                   echo "does not exist";
               }

           }else {
            //redirct
               ViewController::loadFile('404');
        }


    }

    public static function dispacher_delete($id)
    {

        $del = new DatabaseController();
        $del->delete_word($id);

    }

    public static  function dispacher_logicsGame($word)
    {
        $game = new GameController();
        $game->logicsGame($word);
    }
}
