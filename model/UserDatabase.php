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
    private $validate;

    private $config;


    public function __construct()
    {
        $this->config = new DatabaseConfig();
        $this->validate = new Validate();

        $this->dbServerName = $this->config->dbServerName;
        $this->dbUserName = $this->config->dbUserName;
        $this->dbPassword = $this->config->dbPassword;
        $this->dbName = $this->config->dbName;

        $this->connectToDatabase = mysqli_connect($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
    }

    public function addNewUser()
    {
        $user = new User(mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::UserName']),
            mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::Password']));

        $userName = $user->name;
        $password = $user->password;
        $passwordRepeat = mysqli_real_escape_string($this->connectToDatabase, $_POST['RegisterView::PasswordRepeat']);

        if (strlen($this->validate->registerForm($userName, $password, $passwordRepeat, $this->connectToDatabase)) > 0) {

            return $_SESSION['Message'] = $this->validate->registerForm($userName, $password, $passwordRepeat, $this->connectToDatabase);

        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (user_uid, user_password) VALUES ('$userName', '$hashedPassword');";

            $_SESSION['isLoggedIn'] = false;
            $_SESSION['registerPage'] = false;
            $_SESSION['registerMessage'] = 'Registered new user.';
            $_SESSION['Username'] = $userName;
            mysqli_query($this->connectToDatabase, $sql);

            header('Location: /');
            exit;
        }
    }

    public function handleLogin()
    {

        $user = new User(mysqli_real_escape_string($this->connectToDatabase, $_POST['LoginView::UserName']),
            mysqli_real_escape_string($this->connectToDatabase, $_POST['LoginView::Password']));

        $username = $user->name;
        $password = $user->password;

        if (strlen($this->validate->loginForm($username, $password,  $this->connectToDatabase)) > 0) {

            $_SESSION['Message'] = $this->validate->loginForm($username, $password,  $this->connectToDatabase);

        } else {

            $_SESSION['isLoggedIn'] = true;
            $_SESSION['Message'] = 'Welcome';
            $_SESSION['Username'] = '';
        }
    }
}
