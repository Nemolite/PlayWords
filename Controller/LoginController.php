<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:05
 */

namespace Controller;

use Controller\ViewController;

class LoginController {

    public function __construct()
    {
        ViewController::loadFile('login');
    }

}