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

        $userName = mysqli_real_escape_string($this->connectToDatabase, $_POST['SignupView::UserName']);
        $password = mysqli_real_escape_string($this->connectToDatabase, $_POST['SignupView::Password']);


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user_uid, user_password) VALUES ('$userName', '$hashedPassword');";

        $_SESSION['isLoggedIn'] = true;

        return mysqli_query($this->connectToDatabase, $sql);



    }
}
