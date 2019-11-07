<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: login.class.php
 * Description:
 */

class Login extends View {

    //call the header method defined in the parent class to add the header
    public function display()
    {
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <doctype html>
            <html>
            <head>
                <title>Login</title>
                <!-- Link to css page -->
                <link type="text/css" rel="stylesheet" href="css/style.css"/>
            </head>
            <body>

            <!-- Sign Up Form -->
            <form action="index.php" method="post">
                <h2>Login</h2>
                Username: <input type="text" name="username" required><br>
                Password: <input type="password" name="password" minlength="5" required><br>
                <input type="submit" value="login">
            </form>

            <!-- require footer for every page -->
            </body>
            </html>


        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}