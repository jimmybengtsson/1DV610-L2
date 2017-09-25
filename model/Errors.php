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

    public function isUserNameSet($username) {

        if (strlen($username) == 0) {

            return 'Username is missing';

        } else {
            return '';
        }
    }

    public function isPasswordSet($password) {

        if (strlen($password) == 0) {

            return 'Password is missing';

        } else {
            return '';
        }

    }

    public function compareUidAndPwdWithDatabase($username, $password, $connect)
    {

        $sql = "SELECT * FROM users WHERE BINARY user_uid='$username'";
        $result = mysqli_query($connect, $sql);
        $validateResult = mysqli_num_rows($result);

        if ($validateResult < 1) {
            return 'Wrong name or password';

        } else {

            if ($row = mysqli_fetch_assoc($result)) {

                $validatePassword = password_verify($password, $row['user_password']);

                if ($validatePassword == false) {

                    $_SESSION['Username'] = $username;

                    return 'Wrong name or password';

                }

            }
        }

        return '';
    }
}