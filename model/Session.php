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

        if (isset($_SESSION['isSessionSet'])) {

            if ($_SESSION['browserInfo'] === $_SERVER['HTTP_USER_AGENT']) {

                return;

            } else {

                $_SESSION['isLoggedIn'] = false;
            }

        } else {

            $_SESSION['isSessionSet'] = true;

            $_SESSION['Message'] = '';

            $_SESSION['browserInfo'] = $_SERVER['HTTP_USER_AGENT'];

            if (!isset($_SESSION['isLoggedIn'])) {
                $_SESSION['isLoggedIn'] = false;
            }

        }


    }

}