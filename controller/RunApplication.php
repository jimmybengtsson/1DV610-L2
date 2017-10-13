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
        $this->imageView = new ImageView($this->fetchImagesFromStorage());
        $this->newSession = new Session();
        $this->registerController = new RegisterController();
        $this->userDatabase = new UserDatabase();
        $this->loginController = new LoginController();
        $this->imageController = new ImageController();

    }

    /**
     *  Starting the application
     */

    public function run()
    {
        $this->newSession->startSession();

        $this->registerController->run($this->userDatabase);
        $this->loginController->run($this->userDatabase);

        if ($_SESSION['isLoggedIn'])
        {
            $this->imageController->run();
        }

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

    /**
     *  Check if user wants to navigate to register page
     *
     * @return bool
     */

    private function checkIfRegisterClick()
    {

        if(isset($_GET['register'])) {
            $_SESSION['registerPage'] = true;
            return true;
        }

        $_SESSION['registerPage'] = false;
        return false;
    }

    /**
     *  Check if user wants to navigate to front page
     *
     * @return bool
     */

    private function checkIfBackClick()
    {
        if(isset($_GET[''])) {

            $_SESSION['registerPage'] = false;
            return false;
        }
    }

    /**
     * Get all uploaded images and return them in a array
     *
     * @return array
     */

    private function fetchImagesFromStorage()
    {
        $targetDir = 'uploads/';
        $files = array();
        $fetchFromDir = opendir($targetDir);
        while (false !== ($filename = readdir($fetchFromDir))) {
            $files[] = $filename;
        }

        return preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);

    }

}