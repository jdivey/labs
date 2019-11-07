<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: verify.class.php
 * Description:
 */

class Verify extends View
{

    //display function to verify login of user
    public function display()
    {
        parent::header();

        $message = "Please enter your username and password to login.";
        $login_status = '';
        if (isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }

//
        if ($login_status == 1) {
            echo "<p>You are logged in as ", $_SESSION['login'], ".</p>";
            exit;
        }


//user has just registered
        if ($login_status == 3) {
            echo "<p>Thank you for registering with us.  Your account has been created.</p>";
            exit;
        }
//the users last login attempt
        if ($login_status == 2) {
            $message = "Username or password is invalid.  Please try again.";
        }

        parent::footer();
    }


}