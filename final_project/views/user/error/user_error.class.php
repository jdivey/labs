<?php
/**
 * Author: Jacob Ivey
 * Date: 12/9/2019
 * File: user_error.class.php
 * Description:
 */

class UserError extends VehicleIndex
{
    public function display($user) {
        //display page header
        parent::displayHeader("Delete User");

        ?>

        <?php
        //display page footer
        parent::displayFooter();
    }
}