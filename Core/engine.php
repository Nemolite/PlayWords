<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.2017
 * Time: 10:14
 */

namespace Core;


class engine {

    private $di;

    /**
     * @param $di
     */
    public  function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * run system
     */
    public function run()
    {
echo "Hello,World!";
    }

}