<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-21
 * Time: 13:42
 */

namespace Model;


class Session
{
    public function startSession()
    {
        session_start();

        $_SESSION['Message'] = '';

        if (!isset($_SESSION['isLoggedIn'])) {
            $_SESSION['isLoggedIn'] = false;
        }


    }

}