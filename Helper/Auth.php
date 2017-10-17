<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.10.2017
 * Time: 9:15
 */

namespace Helper;

use Helper\Cookie;

class Auth {
    protected  $autorized =false;

    public function autorized()
    {
        return $this->autorized;
    }

    public function authorize()
    {
        Cookie::set('auth_authorized',true);

        $this->autorized = true;

    }

    public function checkauthorize()
    {
        return Cookie::get('auth_authorized');

    }

    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');

        $this->autorized = false;

    }
}