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
         $ini_array = parse_ini_file("config/config.ini");

         $dsn = 'mysql:dbname='.$ini_array[dbname].';host='.$ini_array[host];

         $user = $ini_array[username];
         $password = $ini_array[userpass];

         $this->dbconnect  = new PDO($dsn, $user, $password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

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

        return $stmt->execute();


    }

}

