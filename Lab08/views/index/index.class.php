<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: index.class.php
 * Description:
 */

class Index extends View
{
    //display function to display table to register new user
    public function display()
    {

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
            <form action="index.php" method="post">
                <h2>Sign Up/ Register</h2>
                First Name: <input type="text" name="firstname" required>
                Last Name: <input type="text" name="lastname" required><br>
                Username: <input type="text" name="username" required><br>
                E-mail: <input type="email" name="email" required><br>
                Password: <input type="password" name="password" minlength="5" required><br>
                <input type="submit" value="Sign Up">
            </form>

            <!-- require footer for every page -->
            </body>
            </html>

        <?php
    }
    }