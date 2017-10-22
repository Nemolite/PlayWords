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

             if (is_int($tmp_id)) {
                 Router::dispacher_delete($tmp_id[1]);//$tmp_id[1] = id for delete
             } else {
                 //
                 echo urldecode ( $tmp_id[1] );
                 // передаем слово в диспечер

                 $word = urldecode($tmp_id[1]);
                 Router::dispacher_locicGame($word);

             }

           }


}catch (\ErrorException $e){
    echo $e->getMessage();
}