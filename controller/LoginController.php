<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-21
 * Time: 16:03
 */

namespace Controller;


use Model\UserDatabase;

class LoginController
{

    private $database;

    public function run(UserDatabase $userDatabase) {

        $this->database= $userDatabase;

        if (isset($_POST['LoginView::Login'])) {


            if ($_SESSION['isLoggedIn'] == true) {

                $_SESSION['Message'] = '';


            } else {

                return  $this->userLogin();
            }
        }

        if (isset($_POST['LoginView::Logout'])) {

            if ($_SESSION['isLoggedIn'] == false) {

                $_SESSION['Message'] = '';


            } else {
                $this->userLogout();
            }
        }
    }

    public function userLogin() {

            return $this->database->handleLogin();
    }

    public function userLogout() {

            $_SESSION['isLoggedIn'] = false;
            $_SESSION['Message'] = 'Bye bye!';

    }

}