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

                $admin = new Basa();
                $array_data = $admin->requestWords('id_words','wordstable');
                $id_arr=[];

                foreach ($array_data as $arr){
                    foreach($arr as $value){
                        $id_arr[] ='id'.$value;
                    }
                }

                $array_val = $admin->requestWords('words','wordstable');
                $val_arr= [];

                foreach ($array_val as $arr_val){
                    foreach($arr_val as $val){
                        $val_arr[] =$val;
                    }
                }


                $result_array = array_combine ( $id_arr, $val_arr);

                ViewController::loadFile('admin', $result_array);
                // $templateFile = $_SERVER['DOCUMENT_ROOT'] . '/View/'.$nameFile.'.php';


                self::$include = true;
            }else{

                ViewController::loadFile('404');

            }

        }
    }
}