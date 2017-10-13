<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-23
 * Time: 14:46
 */

namespace Model;

class Validate
{

    public function registerForm($userName, $password, $passwordRepeat, $connectToDatabase)
    {
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

        if ($userName != strip_tags($userName)) {

            $errorMessages .= 'Username contains invalid characters.';

            $_SESSION['Username'] = strip_tags($userName);
        }

        return $errorMessages;
    }

    public function loginForm($username, $password, $connectToDatabase)
    {
        if (strlen($this->isUserNameSet($username)) > 0) {

            return $this->isUserNameSet($username);

        } else if (strlen($this->isPasswordSet($password)) > 0) {

            $_SESSION['Username'] = $username;
            return $this->isPasswordSet($password);

        } else if (strlen($this->compareUidAndPwdWithDatabase($username, $password, $connectToDatabase)) > 0) {

            return $this->compareUidAndPwdWithDatabase($username, $password, $connectToDatabase);

        } else {

            return '';
        }
    }

    public function imageForm($targetFile, $imageFileType)
    {
        if (file_exists($targetFile)) {

            return 'Sorry, file already exists.';
        }

        if ($_FILES['ImageView::FileToUpload']['size'] > 2000000) {

            return 'Sorry, your file is too large.';
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            return 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        }

    }

    private function isUserNameSet($username)
    {
        if (strlen($username) == 0) {

            return 'Username is missing';

        } else {

            return '';
        }
    }

    private function isPasswordSet($password)
    {
        if (strlen($password) == 0) {

            return 'Password is missing';

        } else {

            return '';
        }

    }

    private function compareUidAndPwdWithDatabase($username, $password, $connect)
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

    private function checkUsernameLength ($username)
    {
        if (strlen($username) < 3) {

            return 'Username has too few characters, at least 3 characters.';
        }

        return '';
    }

    private function checkPasswordLength ($password)
    {
        if (strlen($password) < 6) {

            return 'Password has too few characters, at least 6 characters.';
        }

        return '';
    }

    private function checkIfUsernameExists($username, $connect)
    {
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