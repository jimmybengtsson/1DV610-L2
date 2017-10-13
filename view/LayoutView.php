<?php

namespace View;

class LayoutView
{
    public function render($isLoggedIn, $loginView, DateTimeView $dateTimeView, ImageView $imageView)
    {
        echo '<!DOCTYPE html>
          <html>
            <head>
              <meta charset="utf-8">
              <link rel="stylesheet" type="text/css" href="/style/Styles.css">
              <title>Login Example</title>
            </head>
            <body>
            
              <div class="outerContainer">
                  <h1>Assignment 2</h1>
                  ' . $this->renderIsLoggedIn() . '
                  
                  <div class="container">
                      ' . $loginView->response($isLoggedIn) . '
                      
                      <div>' . $imageView->render() . '</div>
                      
                      ' . $dateTimeView->show() . '
                  </div>
              </div>
             </body>
          </html>
        ';
      }

  private function renderIsLoggedIn()
  {
    if ($_SESSION['isLoggedIn']) {
      return '<h2>Logged in</h2>';
    }
    else {
      return $this->registerOrBackButton() . '<h2>Not logged in</h2>';
    }
  }

  private function registerOrBackButton()
  {
      if ($_SESSION['registerPage']) {
          return $this->generateBackToIndexButton();
      }

      return $this->generateRegisterButton();
  }

  private function generateRegisterButton()
  {
      return '<a href="?register">Register a new user</a>';
  }

  private function generateBackToIndexButton()
  {
      return '<a href="?">Back to login</a>';
  }
}
