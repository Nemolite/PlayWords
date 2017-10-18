<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 18:35
 */

namespace Controller;

use Core\ViewController;
use Controller\LoginController as Login;
use Helper\Auth;

class GameController {

    static private $include = false;

    public function display()
    {
        if (!self::$include){

                $user = new Login();
                $user->send();

          //  print_r($_SESSION);

               if (isset($_SESSION['id'])) { //

                    $this->isAdmin(); //for admin

                    ViewController::loadFile('game');
                    self::$include = true;

                }else  {
                    ViewController::loadFile('login');
                    echo "<p>Вам необходимо пройти регистрацию<p>";
                }

        }
    }


   public function isAdmin()
      {
          if(1==$_SESSION['role']){
               echo "Привет, admin!";
               echo "
               <p><a href=\"/admin\">В панель упарвления</a></p>
                   ";
           }
      }

    public function locicGame()
    {
        //парсим uri
        // достаем переданное слово
        // проверяем его по базе
    }

}