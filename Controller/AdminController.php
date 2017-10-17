<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.2017
 * Time: 13:47
 */

namespace Controller;
use Core\ViewController;
use Helper\Auth;

class AdminController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            $auth = new Auth();


            if ((1==$_SESSION['role'])&&(isset($_SESSION['id']))) {
                ViewController::loadFile('admin');
                self::$include = true;
            }else{

                ViewController::loadFile('404');

            }

        }
    }
}