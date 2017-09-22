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

        // TODO Check for errors

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user_uid, user_password) VALUES ('$userName', '$hashedPassword');";

        $_SESSION['isLoggedIn'] = true;

        return mysqli_query($this->connectToDatabase, $sql);



    }

    public function handleLogin() {

        $username = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::UserName']);
        $password = mysqli_escape_string($this->connectToDatabase, $_POST['LoginView::Password']);

        // TODO Check for errors

        $sql = "SELECT * FROM users WHERE user_uid='$username'";
        $result = mysqli_query($this->connectToDatabase, $sql);
        $validateResult = mysqli_num_rows($result);

        if ($validateResult < 1) {
            //Todo Change error handling
            throw new \Exception('Wrong username');

        } else {

            if ($row = mysqli_fetch_assoc($result)) {

                $validatePassword = password_verify($password, $row['user_password']);

                if ($validatePassword == false) {
                    //Todo Change error handling
                    throw new \Exception('Wrong password');

                } elseif ($validatePassword == true) {
                    // Todo Login the user
                    $_SESSION['isLoggedIn'] = true;
                }
            }
        }

    }
}
