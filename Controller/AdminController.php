<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.2017
 * Time: 13:47
 */

namespace Controller;
use Core\ViewController;
//use Helper\Auth;
use Core\DatabaseController;

class AdminController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            //$auth = new Auth();


            if ((1==$_SESSION['role'])&&(isset($_SESSION['id']))) {


                $admin_line = new DatabaseController();
                $admin_line->dbconnect;
                $sql_admin = 'SELECT words FROM `wordstable`';

                ob_start();

                $array_data = $admin_line->query($sql_admin);

                echo "<pre>";
               print_r($array_data);
                echo "</pre>";

                echo "<br>";
                echo $array_data[0][words];

                $key = $array_data[0][words];



               // extract($array_data);

                echo "<pre>";
              //  print_r(extract($array_data));
                echo "</pre>";



                //включаем неявный сброс
                ob_implicit_flush();

                try {

                ViewController::loadFile('admin');
                   // echo "<pre>";
                   // print_r($array_data);
                   // echo "</pre>";

                }catch (\Exception $e){
                    //  если ошибка отключаем и очищаем буфер при этом данные будут стерты
                    ob_end_clean();
                    throw $e;
                }
                // ob_get_flush — Сброс буфера вывода,
                // возвращая его содержимое и
                // отключение буферизации вывода
                // данные будут выведены
                echo ob_get_clean();


                self::$include = true;
            }else{

                ViewController::loadFile('404');

            }

        }
    }
}