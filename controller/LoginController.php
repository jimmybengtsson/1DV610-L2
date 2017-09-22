<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-21
 * Time: 16:03
 */

namespace Controller;


class LoginController
{

    public function __construct()
    {
        if (isset($_POST['LoginView::Login'])) {
            $this->userLogin();
        }

        if (isset($_POST['LoginView::Logout'])) {
            $this->userLogout();
        }
    }

    public function userLogin() {


    }

    public function userLogout() {

            $_SESSION['isLoggedIn'] = false;

    }

}