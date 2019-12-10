<?php
/*
 * Author: Victor Gonzalez
 * Date: 12/7/2019
 * Name: register.class.php
 * Description: This class defines a method "display" that displays a user registration form.
 */

class Register extends IndexView {

    public function display() {
        parent::displayHeader("Register");
        ?>
        <br>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <br>
            <p>Please complete the entire form. All fields are required.</p>
            <br>
            <form method="post" action="action='<?= BASE_URL . "/user/Do_register/" ?>'">
                <div><input type="text" name="username" style="width: 99%"  placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%"  placeholder="Password, 5 characters minimum"></div>
                <div><input type="text" name="email" style="width: 99%" placeholder="Email"></div>
                <div><input type = 'text' name="firstname" style="width: 99%"  placeholder="First name"></div>
                <div><input type="text" name="lastname" style="width: 99%" placeholder="Last name"></div>
                <div><input type="submit" class="button" value="Register"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?BASE_URL?>/user/login/">Login</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
