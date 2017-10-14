<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 8:57
 */

namespace Controller;


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

}