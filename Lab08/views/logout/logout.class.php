<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: logout.class.php
 * Description:
 */

class Logout extends View
{
    public function display() {

        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
       <h3>You have successfully been logged out.</h3>

        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}