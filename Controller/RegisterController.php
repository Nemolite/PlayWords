<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Controller;

use Core\ViewController;
use Core\DatabaseController;

class RegisterController {

    static private $include = false;

    public function display()
    {


        if (!self::$include){
            ViewController::loadFile('register');
            self::$include = true;
        }
    }

    public function rgisterUser()
    {
        if  (  (isset($_REQUEST['regname']))
            && (isset($_REQUEST['pwd1']))
            && (isset($_REQUEST['pwd2']))  )  {

            if ($this->validate()) {

                $params['login'] = htmlspecialchars($_REQUEST['regname']);
                $params['password'] = md5(htmlspecialchars($_REQUEST['pwd1']));

                $line = new DatabaseController();


                // check user in database

                if ($line->dbconnect) {

                        $sql = 'SELECT *
                                FROM `users`
                                WHERE name ="' . $params['login'] . '"
                                LIMIT 1
                                ';

                    $array = $line->query($sql, $params);
                    if (!empty($array)){
                        echo "Такой пользователь существует";
                    }
                }

               if ($line->insertUser($params['login'],$params['password'])){
                    $_SESSION['id'] = $line->insertUser($params['login'],$params['password']);
                   // print_r($_SESSION['id']);
                    echo "Вы успешно зарегистрировались";
                    echo "
                       <p><a href=\"/login\">Добро пожаловать на игру</a></p>
                       ";
                   return true;
                }

                //print_r($params);

            }

        }
    }

    private function validate(){
        if (!$_REQUEST['regname'] || trim($_REQUEST['regname']) == '') {
            echo "Login is empty";
            return false;
        }

        $pwd1 = trim($_REQUEST['pwd1']);
        $pwd2 = trim($_REQUEST['pwd2']);

        if ($pwd1 != $pwd2){
            echo "The passwords doesn't match";
            return false;
        } else if (strlen($pwd1) < 3){
            echo "The pasword is too short (less then 3 characters)";
            return false;
        }

        return true;
    }

}