# 1DV610 L2 and L3
Repository for 1DV610 assignment 2 and 3.

### L2
81% complete in the automated tests without any implementation of the cookie-requirements (3)

##### L2 use and test cases:

[Use Cases](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/UseCases.md)

[Test Cases](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/TestCases.md)

### L3

For L3 I added a function to upload images when signed in. Uploaded images is placed in a folder named `uploads`.
If the user is not signed in, only the list of images in the folder `/uploads/` is shown.

##### Added use and test cases for L3:

[Use Cases](/documentation/UseCasesL3.md)

[Test Cases](/documentation/TestCasesL3.md)



# Installation:

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