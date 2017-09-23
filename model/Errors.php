<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-23
 * Time: 14:46
 */

namespace Model;

class Errors
{

    private $errorMessage = '';

    public function checkRegisterForm() {

    }

    public function checkLoginUsername($username) {

        return $this->isUserNameSet($username);

    }

    public function checkLoginPassword($password) {

        return $this->isPasswordSet($password);
    }

    private function isUserNameSet($username) {

        if (strlen($username) == 0) {

            return 'Username is missing';

        } else {
            return '';
        }
    }

    private function isPasswordSet($password) {

        if (strlen($password) == 0) {

            return 'Password is missing';

        } else {
            return '';
        }

    }
}