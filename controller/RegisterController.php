<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-21
 * Time: 14:25
 */

namespace Controller;


use Model\UserDatabase;

class RegisterController
{
    public function run(UserDatabase $userDatabase) {
        if (isset($_POST['RegisterView::RegisterForm'])) {
            $userDatabase->addNewUser($_POST);
        }
    }

}