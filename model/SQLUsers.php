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
    public function run() {

        $dbServerName = 'localhost';
        $dbUserName = 'root';
        $dbPassword = '';
        $dbName = 'users';

        return mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    }
}
