<?php


class Request
{
    public $user_select;
    public $user_answer;

    public $server_select;
    public $server_answer;

    public $result_select; //isCorrect
    public $result_answer; //score

    public  function request($select,$answer) //from user
    //"exerciseId": "select1"
    //"answer": 0
    {
       $this->user_select= $select["exerciseId"];
       $this->user_answer = $answer["answer"];

       $this-> inBasa($this->user_select,$this->user_answer); // в базу

       $this->fromBase(); //из базы правильные результаты

       $this->compare(); // проверка и начисление балов

       $this->result_answer = $this->ball(); //баллы

       $this->response(); // отправка резульата ученику

    }

    public function inBasa($select,$answer)
    {
        //отправка данных на сервер
    }

    public function fromBase()
    {
        //запрос к базе данных
        $this->server_select = "banana"; //вариант правильного ответа из базы
        $this->server_answer = "correct text";//вариант правильного текста из базы

    }

    public function compare()

    {
        if ($this->user_select === $this->server_select ){
           $this->result_select = true;
        } else {
            $this->result_select = false;
        }

    }

    public function response()
    {

        return [
            "isCorrect"=>$this->result_select,
            "score"=>$this->result_answer
        ];
    }

    public function ball()
    {
        //o	общего количества возможных ответов в конкретном упражнении;
        //максимального балла для упражнения.
        $allBall = 3;
        $max = 3;
        $ball = $allBall + $max;

        if ($this->user_answer===$this->server_answer){
            return   $ball/3; //1
        } else {
            return  $ball/6 ; // -0.5
        }

    }
}






