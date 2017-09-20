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

class RunApplication
{

    public function run()
    {

        $loginView = new LoginView();
        $dateTimeView = new DateTimeView();
        $layoutView = new LayoutView();
        $signupView = new SignupView();

        echo 'Run';

        $layoutView->render(false, $loginView, $dateTimeView, $signupView);
    }
}