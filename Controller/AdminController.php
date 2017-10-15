<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.2017
 * Time: 13:47
 */

namespace Controller;
use Core\ViewController;

class AdminController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('admin');
            self::$include = true;
        }
    }
}