<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Controller;

use Controller\ViewController;
class RegisterController {

    public function __construct()
    {
        ViewController::loadFile('Register');
    }

}