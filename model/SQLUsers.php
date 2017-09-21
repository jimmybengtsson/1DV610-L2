<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-19
 * Time: 12:52
 */

namespace Model;

class UserDatabase
{
    private $dbServerName = 'localhost';
    private $dbUserName = 'root';
    private $dbPassword = 'root';
    private $dbName = 'users';

    public function run() {

        return mysqli_connect($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
    }

    public function addNewUser($registerPost) {
        var_dump($registerPost);
    }
}
