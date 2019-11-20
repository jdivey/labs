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
        parent::displayHeader("Kung Fu Panda Media Library Home");
        ?>

        <div id="thumbnails" style="text-align: center; border: none">



            <a href="<?= BASE_URL ?>/vehicle/index">
                <h1>Welcome</h1>
            </a>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}