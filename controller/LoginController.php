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
            $this->userLogin();
        }

        if (isset($_POST['LoginView::Logout'])) {
            $this->userLogout();
        }
    }

    public function userLogin() {

        if ($_SESSION['isLoggedIn']) {

            $_SESSION['Message'] = '';

        } else {

            return $this->database->handleLogin();
        }

    }

    public function userLogout() {

            $_SESSION['isLoggedIn'] = false;
            $_SESSION['Message'] = 'Bye bye!';

    }

}