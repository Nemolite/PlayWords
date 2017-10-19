<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.10.2017
 * Time: 12:53
 */

//print_r($_REQUEST);
//echo "ok";
//echo "<br>";

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
//
//echo "ok";
//echo $_GET[id];

if (!empty($_GET[id])){

    //require $_SERVER['DOCUMENT_ROOT'] . '/Core/'.DatabaseController.'.'.php;
    //use DatabaseController;
    $class = $_SERVER['DOCUMENT_ROOT'].'/Core/'.DatabaseController.'()';
    echo $class;
    $del = new $class;

    echo ($del->del($_GET[id])) ? 1 : 0;

}



