<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-10-13
 * Time: 10:32
 */

namespace Model;


class User
{
    public $name;
    public $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;

    }

}