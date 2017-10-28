<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.10.2017
 * Time: 18:35
 */

namespace Controller;

use Core\DatabaseController;
use Core\ViewController;
use Controller\LoginController as Login;
use Helper\Auth;

class GameController {

      public $request;
      public $separator = ",";
      public $attrib_rep = "false";// false - no repeat or true- repeat
      public $attrib_lost = "false";// false - no lost or true - lost (not words of computer)

    static private $include = false;

    public function display()
    {
        if (!self::$include){

                $user = new Login();
                $user->send();


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

    /**
     * @param $word from game.js (user word)
     */
    public function logicsGame($word)
    {

        $req = new DatabaseController();

        //$req->deleteTmpBasa(); // удаление слов из временной базы

           // $req->transference(); //перенос слов из временной базы в основную

        // проверка было это слово или нет
       // echo $req->selectWordTmp($word);

        if ( !$req->selectWordTmp($word) ) {

            $this->attrib_rep = "true";

            $this->request = $this->attrib_rep.$this->separator.$word;

            echo $this->request;
        }

            //echo "все нормально";
            $req->insertWordTmp($word); // заносим в во временную базу cлов

            $arrOnLetter =$this->requestArray($word); // вернет массив по последней букве

            if (empty($arrOnLetter)){
               // echo "я проиграл, я не знаю больше слов";
                $this->request[2] = false;
            } else {

            $arrTmp = $req->requestWordsTmpAll();

            $result = array_diff ( $arrOnLetter , $arrTmp );

                if (empty($result)){
                  //  echo "я проиграл, все слова которые нужно было уже названы";
                    $this->request[2] = false;
                }

                $this->request[1] = $result[array_rand($result)];
                //echo "<pre>";
                //print_r($result[array_rand($result)]);
                //echo "</pre>";


                $req->insertWordTmp($result[array_rand($result)]); // заносим в во временную базу cлов

            }

            //занести его во временную базу $compword
            // потом формировать массив [$word,$compword]

            // и отправить его js скрипту на обработку


         //return $this->request;
        //echo $this->request;
       // $string = implode(", ", $this->request);
       // echo $string;


    }

    public function requestArray($word)
    {
        $lenght = mb_strlen($word);

        $letter = mb_substr ( $word , $lenght-1, $lenght );


        if ($letter ==="ь"){
            $letter = mb_substr ( $word , $lenght-2, -1 );
        }

        $request = new DatabaseController();
        $arr_words = $request->requestWordsArray($letter);
        return $arr_words;
    }



}