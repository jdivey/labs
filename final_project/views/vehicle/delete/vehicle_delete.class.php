<?php
/**
 * Author: Jacob Ivey
 * Date: 12/5/2019
 * File: vehicle_delete.class.php
 * Description:
 */

class VehicleDelete extends VehicleIndexView
{
    public function display($vehicle) {
        //display page header
        parent::displayHeader("Delete Vehicle");

        ?>

        <?php
        //display page footer
        parent::displayFooter();
    }
}