<?php
/*
 * Author: Victor Gonzalez
 * Date: 12/7/2019
 * Name: verify.class.php
 * Description: This class defines a method "display" that displays a login confirmation message.
 */

class Verify extends IndexView {

    public function display($result){
        parent::displayHeader("Successful Login");


        $message = "Please enter your username and password to login.";
        $login_status = '';
        if (isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        if ($login_status == 1) {
            echo "<p>You are logged in as ", $_SESSION['login'], ".</p>";
            exit;
        }
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if (strpos($result, "successful") == true) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='<?BASE_URL?>/user/verify_user/'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "Already have an account? <a href='index.php?action=login'>Login</a>";
                }
                ?>
            </span>
            <span style="float: right">Reset password? <a href="<?BASE_URL?>/user/reset">Reset</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
