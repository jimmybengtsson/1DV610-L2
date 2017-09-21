<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-09-19
 * Time: 13:01
 */

namespace View;

class SignupView
{

    private static $register = 'RegisterForm';
    private static $name = 'SignupView::UserName';
    private static $password = 'SignupView::Password';
    private static $cookieName = 'SignupView::CookieName';
    private static $cookiePassword = 'SignupView::CookiePassword';
    private static $messageId = 'SignupView::Message';

    public function response()
    {

        $message = '';

        return $this->render($message);
    }

    private function render($message)
    {
        return '
			<form method="post"> 
				<fieldset>
					<legend>Register a new user - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					
					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>
		';
    }
}