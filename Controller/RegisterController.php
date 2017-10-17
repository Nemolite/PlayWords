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



                $sql_insert = 'INSERT INTO users SET
                        name     = "'.$params['login'].'",
                        password = "'.$params['pwd1'].'"
                ';

                $insert = $line->query($sql_insert, $params);

                if ($insert){
                    echo "Данные в базе";
                }

                print_r($params);


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