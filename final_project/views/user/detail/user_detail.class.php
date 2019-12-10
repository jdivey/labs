<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: user_detail.class.php
 * Description:
 */

class UserDetail extends VehicleIndexView
{
    public function display($vehicle, $confirm = "")
    {
        //display page header
        parent::displayHeader("User Details");

        //retrieve vehicle details by calling get methods
        $model = $vehicle->getModel();
        $year = $vehicle->getYear();
        $price = $vehicle->getPrice();
        $stock = $vehicle->getStock();
        $image = $vehicle->getImage();
        $description = $vehicle->getDescription();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . VEHICLE_IMG_IMG . $image;
        }
        ?>

        <div  id="main-header">Vehicle Details</div>
        <hr>
        <!-- display vehicle details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $model ?>"/>
                </td>
                <td style="width: 130px;">
                    <p><strong>Model:</strong></p>
                    <p><strong>Year:</strong></p>
                    <p><strong>Price:</strong></p>
                    <p><strong>Stock:</strong></p>
                    <p><strong>Description:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit  "
                               onclick="window.location.href = '<?= BASE_URL ?>/vehicle/edit/<?= $id  ?>'">&nbsp;
                    </div>

                </td>
                <td>
                    <p><?= $model ?></p>
                    <p><?= $year ?></p>
                    <p><?= $price ?></p>
                    <p><?= $stock ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>

        </table>
        <div id="button-group">
            <input type="button" id="delete-button" value="   Delete  "
                   onclick="window.location.href = '<?= BASE_URL ?>/vehicle/delete/<?= $id  ?>'">&nbsp;
        </div>
        <a href="<?= BASE_URL ?>/vehicle/index">Go to vehicle list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}