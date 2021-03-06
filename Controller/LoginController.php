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
//use Helper\Auth as Auth;


class LoginController {

    static private $include = false;

       private $id;
       private $role;

    public function display()
    {
        if (!self::$include){
            ViewController::loadFile('login');
            self::$include = true;
        }
    }

    public function send()
    {

        $params['login'] = htmlspecialchars($_REQUEST['login']);
        $params['password'] = md5(htmlspecialchars($_REQUEST['password']));

        $connect = new DatabaseController();

                if ($connect->setConnect()) {

                    $sql = 'SELECT *
                    FROM `users`
                    WHERE name ="' . $params['login'] . '"
                    AND password = "' . $params['password'] . '"
                    LIMIT 1
                    ';

                    $array = $connect->query($sql, $params);
                }

          if (!empty($array)) {
                // id and role remember
                foreach ($array as $value) {
                    $this->id = $value['id'];
                    $this->role = $value['role'];
                    }

                $_SESSION['id']= $this->id;
                $_SESSION['role']= $this->role;

            }


    }





}