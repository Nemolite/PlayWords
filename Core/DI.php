<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.2017
 * Time: 10:12
 */

namespace Core;


class DI {
    /**
     * @var array
     */
    private $continer = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value){
        $this->continer[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return bool
     */

    public function get($key){
        return $this->has($key);
    }

    /**
     * @param $key
     * @return bool
     */
    public  function has($key){

        return isset($this->continer[$key])?$this->continer[$key]: null;
    }

}