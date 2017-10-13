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

    /**
     * Handle user login and logout
     *
     * @param UserDatabase $userDatabase
     * @return mixed
     */

    public function run(UserDatabase $userDatabase)
    {
        $this->database = $userDatabase;

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

    private function userLogin() {

            return $this->database->handleLogin();
    }

    private function userLogout() {

            $_SESSION['isLoggedIn'] = false;
            $_SESSION['Message'] = 'Bye bye!';

    }

}