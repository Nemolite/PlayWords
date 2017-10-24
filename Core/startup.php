<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.10.2017
 * Time: 17:04
 */

require_once __DIR__ . '/../vendor/autoload.php'; // autoload classes (composer.json)

use Helper\Tools; //It is only for debuging
use Core\Router;
use Core\DatabaseController;


try {

    $debug = new Tools(); // debug

    // routes

    Router::add('/', ['controller'=>'HomeController']);//default
    Router::add('/login', ['controller'=>'LoginController']);
    //Router::add('/login/send', ['controller'=>'LoginController','action'=>'send']);

    Router::add('/register', ['controller'=>'RegisterController']);
    Router::add('/game', ['controller'=>'GameController']);
    //---------------------------------------------------------
    Router::add('/admin', ['controller'=>'AdminController']);


    $query = $_SERVER['REQUEST_URI'];

    $parse_query = parse_url($query, PHP_URL_QUERY);

    if (empty($parse_query)) {
        Router::dipacher($query);
    }

    //delete word
         if (!empty($parse_query)) {
             $tmp_id = explode ( '=' , $parse_query);//id=<numder>

             if ($tmp_id[0]==="id") { // from script.js

                 Router::dispacher_delete($tmp_id[1]);//$tmp_id[1] = id for delete
             }

             if ($tmp_id[0]==="word") { // from game.js
                 //

                 $word = urldecode($tmp_id[1]);

                 Router::dispacher_logicsGame($word);

             }

           }


}catch (\ErrorException $e){
    echo $e->getMessage();
}