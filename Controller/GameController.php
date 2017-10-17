<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 18:35
 */

namespace Controller;

use Core\ViewController;
use Controller\LoginController as Login;
use Helper\Auth;

class GameController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){

            $auth = new Auth();

           //print_r($auth->checkauthorize());

            if ( !empty($auth->checkauthorize()) ) {
                ViewController::loadFile('game');
                self::$include = true;
            }else{
                ViewController::loadFile('404');
            }
        }
    }

}