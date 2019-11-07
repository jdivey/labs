<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: reset.class.php
 * Description:
 */

class Reset extends View
{
    //display function to reset user password
    public function display($user)
    {
        parent::header();
        //if loop to get cookie for user's username
        if (isset($COOKIE)) {
            ?>
            <div class="top-row">Password Reset</div>
            <div class="middle-row">
            <form method="post" action="index.php?action=do_reset">
                <div class="top-row">Password Reset</div>

                <!-- middle row -->

                   <div> Username: <input type="text" name="username" required><br></div>
                   <div> New Password: <input type="password" name="password" minlength="5" required value="<?= $user ?>" readonly=""><br></div>
                </div>

                <!-- bottom row for links  -->
                <div class="bottom-row">
                    <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                    <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
                </div>
            </form>
            <!-- page specific content ends -->}
            <?php

        }
        parent::footer();
    }
}