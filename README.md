# 1DV610 L2
Repository for 1DV610 assignment 2.

81% complete in the automated tests without any implementation of the cookie-requirements (3)

### Installation:

Make shure you have **MAMP/LAMP/WAMP** installed on your computer or server. 

* Add a new **MySQL** database in **phpMyAdmin** and name it *users*. 
* Add a table in the *users* database with the rows *user_id*, *user_uid* and *user_password*.
```
CREATE TABLE users (
    user_id int(8) not null AUTO_INCREMENT PRIMARY KEY,
    user_uid varchar(256) not null,
    user_password varchar(256) not null
);
```
* Create a folder named `.config` in the same folder as your root folder of the application (`../`). 
Doing this to keep the settings-information outside of webroot when deployed on a public web server.
* Create a file named `Config.php` inside the `.config` folder. 
* Paste this code into `Config.php` including your personal settings. 
```
<?php

namespace Config;

class DatabaseConfig
{

    public $dbServerName = 'localhost';
    public $dbUserName = 'YOUR_DATABASE_USERNAME';
    public $dbPassword = 'YOUR_DATABASE_PASSWORD';
    public $dbName = 'users';

}
);
```
* Navigate to `localhost:”your port-setting in MAMP/LAMP/WAMP”`.
