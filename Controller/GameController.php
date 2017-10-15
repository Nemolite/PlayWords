<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 18:35
 */

namespace Controller;

use Core\ViewController;
class GameController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('game');
            self::$include = true;
        }
    }

}