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
use Core\DatabaseController as Basa;

class AdminController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){
            //$auth = new Auth();


            if ((1==$_SESSION['role'])&&(isset($_SESSION['id']))) {

/*
                $admin_line = new DatabaseController();
                $admin_line->dbconnect;
                $sql_id = 'SELECT `id_words` FROM `wordstable`';
               $array_data = $admin_line->query($sql_id);

*/
                $admin = new Basa();
                $array_data = $admin->requestWords('id_words','wordstable');
                $id_arr=[];

                foreach ($array_data as $arr){
                    foreach($arr as $value){
                        $id_arr[] ='id'.$value;
                    }
                }

/*
                $sql_val = 'SELECT `words` FROM `wordstable`';

                $array_val = $admin_line->query($sql_val);

*/

                $array_val = $admin->requestWords('words','wordstable');
                $val_arr= [];

                foreach ($array_val as $arr_val){
                    foreach($arr_val as $val){
                        $val_arr[] =$val;
                    }
                }


                $result_array = array_combine ( $id_arr, $val_arr);

                extract($result_array);

                ob_start();
                ob_implicit_flush();

               ViewController::loadFile('admin');
                echo ob_get_clean();

                self::$include = true;
            }else{

                ViewController::loadFile('404');

            }

        }
    }
}