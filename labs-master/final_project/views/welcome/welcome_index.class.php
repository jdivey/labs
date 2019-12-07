<?php
/**
 * Author: Jacob Ivey
 * Date: 11/20/2019
 * File: welcome_index.class.php
 * Description:
 */

class WelcomeIndex extends IndexView
{
    public function display() {
        //display page header
        parent::displayHeader("E-Auto Store Home");
        ?>
        <br>
        <div id="welcomemessage">
            <p>Welcome to E-Auto Store Online!</p>
            <p>Make purchasing your next vehicle easier,<br> without the hassle of salesmen and right from your home!</p>
        </div>
<br>
        <div id="thumbnails" style="text-align: center; border: 5px">



            <a href="<?= BASE_URL ?>/vehicle/index">
                <h1> Start Here!</h1>
            </a>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}