<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Controller;

use Core\ViewController;
class RegisterController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('register');
            self::$include = true;
        }
    }

}