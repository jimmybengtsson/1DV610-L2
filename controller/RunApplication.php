<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-20
 * Time: 15:04
 */

namespace Controller;

use \View\LoginView as LoginView;
use \View\DateTimeView as DateTimeView;
use \View\LayoutView as LayoutView;
use \View\ImageView as ImageView;
use \View\RegisterView as RegisterView;
use \Model\Session as Session;
use \Model\User as User;
use \Model\UserDatabase as UserDatabase;
use \Controller\RegisterController as RegisterController;
use \Controller\LoginController as LoginController;
use \Controller\ImageController as ImageController;

class RunApplication
{
    private $loginView;
    private $dateTimeView;
    private $layoutView;
    private $registerView;
    private $imageView;
    private $newSession;
    private $userDatabase;
    private $registerController;
    private $loginController;
    private $imageController;


    public function __construct()
    {
        $this->loginView = new LoginView();
        $this->dateTimeView = new DateTimeView();
        $this->layoutView = new LayoutView();
        $this->registerView = new RegisterView();
        $this->imageView = new ImageView();
        $this->newSession = new Session();
        $this->registerController = new RegisterController();
        $this->userDatabase = new UserDatabase();
        $this->loginController = new LoginController();
        $this->imageController = new ImageController();

    }


    public function run()
    {
        $this->newSession->startSession();

        $this->registerController->run($this->userDatabase);
        $this->loginController->run($this->userDatabase);
        $this->imageController->run();

        $this->checkIfBackClick();

        if ($this->checkIfRegisterClick()) {

            $this->layoutView->render($_SESSION['isLoggedIn'], $this->registerView, $this->dateTimeView, $this->imageView);

        } else {

            $this->layoutView->render($_SESSION['isLoggedIn'], $this->loginView, $this->dateTimeView, $this->imageView);

        }

        // So messages doesn't repeat.
        $_SESSION['registerMessage'] = '';
        $_SESSION['Message'] = '';
    }


    private function checkIfRegisterClick()
    {

        if(isset($_GET['register'])) {
            $_SESSION['registerPage'] = true;
            return true;
        }

        $_SESSION['registerPage'] = false;
        return false;
    }

    private function checkIfBackClick()
    {
        if(isset($_GET[''])) {

            $_SESSION['registerPage'] = false;
            return false;
        }
    }

}