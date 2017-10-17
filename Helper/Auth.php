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
    protected $autorized =false;
    protected $role = false;

    public function autorized()
    {
        return $this->autorized;
    }

    public function authorize()
    {
        Cookie::set('authorized',true);

        $this->autorized = true;

    }

    public function checkauthorize()
    {
        return Cookie::get('authorized');

    }

    public function unAuthorize()
    {
        Cookie::delete('authorized');

        $this->autorized = false;

    }



    public function authLikeAdmin()
    {
        Cookie::set('role',true);

        $this->role = true;

    }

    public function checkAuthLikeAdmin()
    {
        return Cookie::get('role');

    }

    public function unAuthorizeAdmin()
    {
        Cookie::delete('role');

        $this->role = false;

    }
}