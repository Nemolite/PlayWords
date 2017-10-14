<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 10:06
 */

namespace Controller;


class ViewController {

    public static function loadFile($nameFile)
    {
        $templateFile = ROOT_DIR. '/View/'.$nameFile.'.php';

        if (is_file($templateFile)){
           require_once $templateFile;
        }
        else
        {
            throw new \Exception(
                sprintf('View file $s does not exist',$templateFile)
            );
        }
    }







}