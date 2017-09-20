<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-19
 * Time: 12:52
 */

$dbServerName = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'users';

$connectToDb = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);