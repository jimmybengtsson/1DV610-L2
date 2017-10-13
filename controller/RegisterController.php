<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-21
 * Time: 14:25
 */

namespace Controller;


use Model\UserDatabase;

class RegisterController
{
    /**
     * Listen for click on the register link
     *
     * @param UserDatabase $userDatabase
     */

    public function run(UserDatabase $userDatabase)
    {
        if (isset($_POST['RegisterView::Register'])) {

            $userDatabase->addNewUser();
        }
    }

}