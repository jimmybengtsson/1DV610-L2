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

    public function checkRegisterForm($userName, $password, $passwordRepeat, $connectToDatabase) {

        $errorMessages = '';


        if (strlen($this->checkUsernameLength($userName)) > 0) {

            $errorMessages .= $this->checkUsernameLength($userName) . ' ';
            $_SESSION['Username'] = $userName;
        }
        if (strlen($this->checkPasswordLength($password)) > 0) {

            $errorMessages .= $this->checkPasswordLength($password) . ' ';

            $_SESSION['Username'] = $userName;
        }
        if ($password != $passwordRepeat) {

            $errorMessages .= 'Passwords do not match. ';
            $_SESSION['Username'] = $userName;
        }
        if (strlen($this->checkIfUsernameExists($userName, $connectToDatabase)) > 0) {

            $errorMessages .= $this->checkIfUsernameExists($userName, $connectToDatabase) . ' ';

            $_SESSION['Username'] = $userName;
        }

        if (strlen($errorMessages) > 0) {

            return $_SESSION['Message'] = $errorMessages;

        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (user_uid, user_password) VALUES ('$userName', '$hashedPassword');";

            $_SESSION['isLoggedIn'] = false;
            $_SESSION['registerPage'] = false;
            $_SESSION['Message'] = 'Registered new user.';
            $_SESSION['Username'] = $userName;
            mysqli_query($connectToDatabase, $sql);

            return header('Location: /');

        }

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

    public function checkUsernameLength ($username) {

        if (strlen($username) < 3) {
            return 'Username has too few characters, at least 3 characters.';
        }

        return '';
    }

    public function checkPasswordLength ($password) {

        if (strlen($password) < 6) {
            return 'Password has too few characters, at least 6 characters.';
        }

        return '';
    }

    public function checkIfUsernameExists($username, $connect) {

        $sql = "SELECT * FROM users WHERE BINARY user_uid='$username'";
        $result = mysqli_query($connect, $sql);
        $validateResult = mysqli_num_rows($result);

        if ($validateResult > 0) {
            return 'User exists, pick another username.';

        } else {
            return '';
        }
    }
}