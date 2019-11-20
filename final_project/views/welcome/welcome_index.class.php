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
            <p>Click an image below to explore a library. Click the logo in the banner to come back to this page.</p>


            <a href="<?= BASE_URL ?>/vehicle/index">
                <img src="<?= BASE_URL ?>/www/img/car.jpg" title="Auto Library"/>
            </a>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}