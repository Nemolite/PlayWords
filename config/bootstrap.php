<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.10.2017
 * Time: 17:04
 */
require_once __DIR__.'/../vendor/autoload.php';

use Controller\connect;


try {

    $db = new connect();

    if (is_object($db)) {
        echo "ок";
        echo "<br>";
    }

    $view_login = __DIR__.'/../View/login.php';

    if (file_exists($view_login)){
        require_once $view_login;

    }else
    {

        echo "error";//redirect 404
    }



}catch (\ErrorException $e){
    echo $e->getMessage();
}