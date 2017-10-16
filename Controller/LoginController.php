<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:05
 */

namespace Controller;

use Core\ViewController;
use Core\DatabaseController;

class LoginController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('login');
            self::$include = true;
        }
    }

    public function send()
    {

        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";

        $user['name'] = htmlspecialchars($_REQUEST['login']);

        $connect = new DatabaseController();

        if ( $connect->setConnect()){
            echo "basa";


            $sql = "SELECT name,role FROM `users` WHERE name=:name ";


            echo "<pre>";
            print_r($connect->query($sql,$user));
            echo "</pre>";
            $array = $connect->query($sql,$user;
            if  (!empty($array)) {
                
                                }

            } else {
                echo "такого пользователя нет в базе";
            }

        }





    }



}