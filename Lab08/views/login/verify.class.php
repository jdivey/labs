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
    public function display($verify)
    {
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Login</div>

        <!-- middle row -->
        <div class="middle-row">
            <?php
            if (!$verify) {
                echo "<p>login attempt fail</p>";
            }else{
                echo "<p>You have successfully logged in.</p>";
            }
            ?>
        </div>

        <!-- bottom row for links  -->
        <div class="bottom-row">
            <?php
            if (!$verify) {
                echo '  <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span';
                echo ' <span style="float: right">Don\'t have an account? <a href="index.php">Register</a></span>';
            } else {
                echo '<span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>';
                echo '<span style="float: right">Don\'t have an account? <a href="index.php">Register</a></span>';
            }
            ?>

        </div>
        <!-- page specific content ends -->


        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();


    }
}