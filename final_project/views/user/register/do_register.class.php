<?php
/*
 * Author: Victor Gonzalez
 * Date: 12/7/2019
 * Name: register.class.php
 * Description: This class defines a method "display" that confirms the user registration.
 */

class Do_Register extends IndexView {

    public function display($result) {

        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?BASE_URL?>/user/login/">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?BASE_URL?>/user/register/">Register</a></span>
        </div>

        <?php
    }

}
