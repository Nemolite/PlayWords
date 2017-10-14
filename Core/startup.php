<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.10.2017
 * Time: 17:04
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Controller\DatabaseController;
use Core\router;

use Helper\Tools; //It is only for debuging


try {

    $debug = new Tools(); // debug

    Router::add('/', ['controller'=>'HomeController']);//default
    Router::add('/login', ['controller'=>'LoginController']);
    Router::add('/register', ['controller'=>'RegisterController']);
    Router::add('/game', ['controller'=>'GameController']);

    $query = $_SERVER['REQUEST_URI'];

    Router::dipacher($query);

}catch (\ErrorException $e){
    echo $e->getMessage();
}