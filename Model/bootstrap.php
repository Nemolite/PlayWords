<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.10.2017
 * Time: 17:04
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Controller\connect;
use Controller\Router;

use Helper\Tools; //It is only for debuging


try {

    $debug = new Tools(); // debug

    Router::add('/login', ['controller'=>'LoginController','action'=>'check']); //default
    Router::add('/register', ['controller'=>'RegisterController','action'=>'add']);
    Router::add('/index', ['controller'=>'HomeController','action'=>'display']);


    $debug->show(Router::getRoutes());

    $db = new connect();

    $view_login = __DIR__.'/../View/login.php';

    if (file_exists($view_login)){
        //require_once $view_login;
        $debug->show("ok");

    }else
    {
       //redirect 404
       $debug->show("error");
    }

    $query = $_SERVER['REQUEST_URI'];
    echo $query;

    if (Router::compareRoute($query)){
        $debug->show(Router::getRoute());
    }
    else {
        //redirect 404
    }


}catch (\ErrorException $e){
    echo $e->getMessage();
}