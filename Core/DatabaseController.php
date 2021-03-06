<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 10:14
 */
namespace Core;

use PDO;

class DatabaseController {

    public  $dbconnect;

    public function __construct()
    {
        $this->setConnect();
    }

    /**
     * @return $this
     */


     public function setConnect()
     {
         $ini_array = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/config/config.ini");

         $dsn = 'mysql:dbname='.$ini_array[dbname].';host='.$ini_array[host];

         $user = $ini_array[username];
         $password = $ini_array[userpass];


         $this->dbconnect = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


         return $this;

     }


    /**
     * @return array
     */
    public function query($sql,$value=[]){

        $line = $this->dbconnect->prepare($sql);

        $line->execute($value);

        $result = $line->fetchAll(PDO::FETCH_ASSOC);

        if($result=== false){
            return [];
        }

        return $result;

    }

    public function execute($sql, $values = [])
    {
        $sth = $this->dbconnect->prepare($sql);
        return $sth->execute($values);
    }

    public function insertUser($login,$password)
    {

        $stmt = $this->dbconnect->prepare("INSERT INTO `users` (name, password) VALUES (:name, :password)");
        $stmt->bindParam(':name', $login);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $this->dbconnect->lastInsertId(); //id


    }

    public function insertWordTmp($word)
    {
        $sql= "INSERT IGNORE INTO `tmptable` (tmpwords) VALUES (:word)";
//        $sql2 ="INSERT INTO `tmptable` (tmpwords)
//                SELECT DISTINCT :word
//                FROM tmptable
//                WHERE NOT EXISTS
//                (SELECT tmpwords FROM tmptable WHERE tmpwords = :word)";

        $ins = $this->dbconnect->prepare($sql);
        $ins->bindParam(':word',$word);
        $param = $ins->execute();

        return  $param ? true : false;
    }

    public function selectWordTmp($word)
    {
        $sql = "SELECT `tmpwords` FROM tmptable WHERE tmpwords = :word";

        $select = $this->dbconnect->prepare($sql);
        $select->bindParam(':word',$word);

        $select->execute();

        $result = $select->fetchAll(PDO::FETCH_ASSOC);

        return  empty($result) ? true : false;
    }

    public function requestWordsTmpAll()
    {

        $sql = "SELECT `tmpwords` FROM tmptable";

        $res = $this->dbconnect->query($sql);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $value){
            foreach($value as $el){
                $arr[] = $el;
            }

        }

        return $arr;

    }

    public function deleteTmpBasa()
    {
        $sql = "DELETE FROM tmptable WHERE 1";

        $this->dbconnect->exec($sql);
    }

    public function requestWords($filed,$table)
    {

        $sql = 'SELECT '.$filed.' FROM '.$table;

        $array = $this->dbconnect->query($sql);

       return $array;

    }

    public function delete_word($id)
    {

        $sql = "DELETE FROM wordstable WHERE id_words=".$id;

        $num = $this->dbconnect->exec($sql);

        echo $num;

    }

    public function requestWordsArray($letter)
    {

        $sql = 'SELECT words FROM wordstable WHERE words LIKE "'.$letter.'%"';
        // SELECT words FROM wordstable WHERE words LIKE "а%"

       $array = $this->dbconnect->query($sql);

       $result = $array->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            foreach ($result as $value) {
                foreach ($value as $el) {
                    $arr[] = $el;
                }

            }

            return $arr;
        } else {
            return $arr = [];
        }

    }

    public function transference()
    {

        $sql = "INSERT INTO wordstable(words)
                SELECT tmptable.tmpwords FROM
                tmptable";

        $this->dbconnect->exec($sql);

        $sql_delete_dublicat = "DELETE * FROM wordstable WHERE id_words<>id_words AND words=words;";

        $this->dbconnect->exec($sql_delete_dublicat );

    }

}

