<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-19
 * Time: 12:52
 */

namespace Model;

use \Config\DatabaseConfig as DatabaseConfig;

class UserDatabase
{
    private $dbServerName;
    private $dbUserName;
    private $dbPassword;
    private $dbName ;
    private $connectToDatabase;


    public function __construct()
    {
        $config = new DatabaseConfig();

        $this->dbServerName = $config->dbServerName;
        $this->dbUserName = $config->dbUserName;
        $this->dbPassword = $config->dbPassword;
        $this->dbName = $config->dbName;

        $this->connectToDatabase = mysqli_connect($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
    }

    public function addNewUser()
    {
        $userName = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::UserName']);
        $password = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::Password']);
        $passwordRepeat = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::PasswordRepeat']);

        $errors = new Errors();

        $errors->checkRegisterForm($userName, $password, $passwordRepeat, $this->connectToDatabase);
    }

    public function handleLogin()
    {
        $username = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::UserName']);
        $password = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::Password']);

        $errors = new Errors();

        if (strlen($errors->isUserNameSet($username)) > 0) {

            $_SESSION['Message'] = $errors->isUserNameSet($username);

        } else if (strlen($errors->isPasswordSet($password)) > 0) {

            $_SESSION['Message'] = $errors->isPasswordSet($password);
            $_SESSION['Username'] = $username;

        } else if (strlen($errors->compareUidAndPwdWithDatabase($username, $password, $this->connectToDatabase)) > 0) {

            $_SESSION['Message'] = $errors->compareUidAndPwdWithDatabase($username, $password, $this->connectToDatabase);

        } else {

            $_SESSION['isLoggedIn'] = true;
            $_SESSION['Message'] = 'Welcome';
            $_SESSION['Username'] = '';
        }
    }
}
