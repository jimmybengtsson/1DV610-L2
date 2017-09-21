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
use \View\SignupView as SignupView;
use \Model\Session as Session;
use \Model\UserDatabase as UserDatabase;
use \Controller\RegisterController as RegisterController;

class RunApplication
{

    private $loginView;
    private $dateTimeView;
    private $layoutView;
    private $signupView;
    private $newSession;
    private $userDatabase;
    private $registerController;

    public function __construct()
    {
        $this->loginView = new LoginView();
        $this->dateTimeView = new DateTimeView();
        $this->layoutView = new LayoutView();
        $this->signupView = new SignupView();
        $this->newSession = new Session();
        $this->registerController = new RegisterController();
        $this->userDatabase = new UserDatabase();
    }

    public function run()
    {
        $this->newSession->startSession();
        $this->userDatabase->run();
        $this->registerController->run($this->userDatabase);

        var_dump($_SESSION);

        if ($this->checkIRegisterClick()) {

            $this->layoutView->render(false, $this->signupView, $this->dateTimeView);

        } else {

            $this->layoutView->render(false, $this->loginView, $this->dateTimeView);

        }
    }

    private function checkIRegisterClick()
    {

        if(isset($_POST['Register']))
        {
            $_SESSION['registerPage'] = true;
            return true;
        }

        $_SESSION['registerPage'] = false;
        return false;
    }

}