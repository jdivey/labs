<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: vehicle_error.class.php
 * Description:
 */

class VehicleError extends VehicleIndexView
{
    public function display($message)
    {

        //display page header
        parent::displayHeader("Error");
        ?>

        <div id="main-header">Error</div>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <hr>
        <a href="<?= BASE_URL ?>/vehicle/index">Back to vehicle list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}