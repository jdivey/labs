<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: login.class.php
 * Description:
 */

class Login extends View
{
    //call the header method defined in the parent class to add the header
parent::header();
?>
    <!-- page specific content starts -->
    <!-- top row for the page header  -->
    <div class="top-row">Error</div>

    <!-- middle row -->
    <div class="middle-row">
    <h3>We are sorry, but an error has occurred.</h3>
    <p><?= $message ?></p>
    </div>

    <!-- bottom row for links  -->
    <div class="bottom-row">
        <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
        <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
    </div>
    <!-- page specific content ends -->


    <?php
    //call the footer method defined in the parent class to add the footer
    parent::footer();
}