<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Core;


class ViewController {

    public static function loadFile($nameFile,$array_date=[])
    {
        $templateFile = $_SERVER['DOCUMENT_ROOT'] . '/View/'.$nameFile.'.php';



        if (is_file($templateFile)){
            if(!empty($array_date)) {
               extract($array_date);

            }
            require $templateFile;

        }
        else
        {
            throw new \Exception(
                sprintf('View file $s does not exist',$templateFile)
            );
        }
    }







}