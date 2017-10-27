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

    public $request = [];

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

        // проверка уже было это слово или нет

        if ( $req->selectWordTmp($word) ){

            $this->request[0] =  $word;  // 0 - word user, 1 - word comuter
                                         // 3 - false , if нет слов у компьютера
                                         // 4 - false , если слово уже было

            //echo "все нормально";
            $req->insertWordTmp($word); // заносим в во временную базу cлов

            $arrOnLetter =$this->requestArray($word); // вернет массив по последней букве

            if (empty($arrOnLetter)){
               // echo "я проиграл, я не знаю больше слов";
                $this->request[3] = false;
            } else {

            $arrTmp = $req->requestWordsTmpAll();

            $result = array_diff ( $arrOnLetter , $arrTmp );

                if (empty($result)){
                  //  echo "я проиграл, все слова которые нужно было уже названы";
                    $this->request[3] = false;
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



        } else {
           // echo 0; //0 - признак того что было уже такое слово
            $this->request[4] = false;
        }

         //return $this->request;
        //echo $this->request;
        //echo '['.implode(",",$this->request).']';
        echo json_encode($this->request);

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