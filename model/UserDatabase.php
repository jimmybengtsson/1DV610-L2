<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-19
 * Time: 12:52
 */

namespace Model;

use \Config\DatabaseConfig as DatabaseConfig;
use View\DateTimeView;
use View\LayoutView;
use View\LoginView;

class UserDatabase
{
    private $dbServerName;
    private $dbUserName;
    private $dbPassword;
    private $dbName ;
    private $connectToDatabase;

    public function __construct() {

        $config = new DatabaseConfig();

        $this->dbServerName = $config->dbServerName;
        $this->dbUserName = $config->dbUserName;
        $this->dbPassword = $config->dbPassword;
        $this->dbName = $config->dbName;

        $this->connectToDatabase = mysqli_connect($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
    }

    public function addNewUser($registerPost) {

        $userName = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::UserName']);
        $password = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::Password']);
        $passwordRepeat = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::PasswordRepeat']);

        // TODO Check for errors

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user_uid, user_password) VALUES ('$userName', '$hashedPassword');";

        $_SESSION['isLoggedIn'] = true;
        $_SESSION['registerPage'] = false;
        mysqli_query($this->connectToDatabase, $sql);

        return header('Location: /');


    }

    public function handleLogin() {

        $username = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::UserName']);
        $password = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::Password']);

        $errors = new Errors();

        // TODO Check for errors

        $checkUsername = $errors->checkLoginUsername($username);
        $checkPassword = $errors->checkLoginPassword($password);

        if (strlen($errors->isUserNameSet($username)) > 0) {

            $_SESSION['Message'] = $errors->isUserNameSet($username);

        } elseif (strlen($errors->isPasswordSet($password)) > 0) {

            $_SESSION['Message'] = $errors->isPasswordSet($password);

        } elseif (strlen($errors->compareUidAndPwdWithDatabase($username, $password, $this->connectToDatabase)) > 0) {

            $_SESSION['Message'] = $errors->compareUidAndPwdWithDatabase($username, $password, $this->connectToDatabase);

        } else {

            $_SESSION['isLoggedIn'] = true;
            $_SESSION['Message'] = 'Welcome';
        }
    }
}
