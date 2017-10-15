<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.10.2017
 * Time: 17:04
 */


require_once __DIR__ . '/../vendor/autoload.php'; // autoload classes (composer.json)

use Helper\Tools; //It is only for debuging

use Core\DI;
use Core\engine;

try {

    $debug = new Tools(); // debug

    //code

    //Dependency Injection
    $di = new DI();
    //при добавлении зависимостей, они все попадут в систему (engine)
    $engine = new engine($di);
    $engine->run();

/*
    Router::add('/', ['controller'=>'HomeController']);//default
    Router::add('/login', ['controller'=>'LoginController']);
    Router::add('/register', ['controller'=>'RegisterController']);
    Router::add('/game', ['controller'=>'GameController']);

    $query = $_SERVER['REQUEST_URI'];

    Router::dipacher($query);

    */


}catch (\ErrorException $e){
    echo $e->getMessage();
}