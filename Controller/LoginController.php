<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:05
 */

namespace Controller;

use Core\ViewController;

class LoginController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('login');
            self::$include = true;
        }
    }

}