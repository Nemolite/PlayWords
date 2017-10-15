<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Controller;

use Controller\ViewController;

class HomeController {

    private $include = false;

    public function index()
    {
        if (!$this->include){
            ViewController::loadFile('index');
            $this->include = true;
        }
    }



}