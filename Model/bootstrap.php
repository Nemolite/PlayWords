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

    Router::add('/login', ['controller'=>'LoginController']); //default
    Router::add('/register', ['controller'=>'RegisterController']);
    Router::add('/', ['controller'=>'HomeController']);

/*
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
*/
    $query = $_SERVER['REQUEST_URI'];

    Router::dipacher($query);

}catch (\ErrorException $e){
    echo $e->getMessage();
}