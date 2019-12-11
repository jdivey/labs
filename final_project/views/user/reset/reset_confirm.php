<?php
/*
 * Author: Louie Zhu
 * Date: 9/25/2018
 * Name: login.class.php
 * Description: This class defines a method "display" that confirms the password reset.
 */

class ResetConfirm extends IndexView {

    public function display($result) {
        IndexView::header();
        ?>

        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">         
            <span style="float: left">
                <?php
                if (strpos($result, "successful") == true) { //display the logout button
                    echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                } else { //display the reset button
                    echo "Reset password? <a href='index.php?action=reset'>Reset</a>";
                }
                ?>
            </span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <?php
        IndexView::footer();
    }

}
