<?php

//INCLUDE THE FILES NEEDED...
require_once('controller/RunApplication.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/SignupView.php');
require_once('model/Session.php');
require_once('model/SQLUsers.php');


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$runApplication = new \Controller\RunApplication();


$runApplication->run();

