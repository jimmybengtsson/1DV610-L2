<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-10-13
 * Time: 10:27
 */

namespace Model;


class Image
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;

    }

}