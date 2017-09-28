<?php

//INCLUDE THE FILES NEEDED...
require_once('controller/RunApplication.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/Session.php');
require_once('model/UserDatabase.php');
require_once('controller/RegisterController.php');
require_once('controller/LoginController.php');
require_once('../.config/Config.php');
require_once('model/Errors.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$runApplication = new \Controller\RunApplication();


$runApplication->run('');

