<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: index.class.php
 * Description:
 */

class Index extends View
{
    public function display() {

    ?>
        <doctype html>
    <html>
    <head>
        <title>Sign Up</title>
        <!-- Link to css page -->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>

    <!-- Sign Up Form -->
    <form class="signupform">
        <h2>Sign Up/ Register</h2>
        First Name: <input type="text" name="firstname">
        Last Name: <input type="text" name="lastname"><br>
        Username: <input type="text" name="username"><br>
        E-mail: <input type="email" name="email"><br>
        Password: <input type="text" name="password"><br>
        <input type="checkbox" name="" id="newsletter" value="Yes">I agree to terms and conditions<br>
        <input type="submit" value="Sign Up">
    </form>

    <!-- require footer for every page -->
    </body>
    </html>
    }
}