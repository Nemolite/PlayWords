<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 9:41
 */

namespace Helper;


class Tools {

    public function show($print)
    {
        echo "<pre>";
        print_r($print);
        echo "</pre>";
    }

    public function show_dump($print)
    {
        echo "<pre>";
        var_dump($print);
        echo "</pre>";
    }
}