<?php
/**
 * Author: Jacob Ivey
 * Date: 12/3/2019
 * File: vehicle_edit.class.php
 * Description:
 */

class VehicleEdit extends VehicleIndexView
{
    public function display($vehicle) {
        //display page header
        parent::displayHeader("Edit Vehicle");


        //retrieve movie details by calling get methods
        $id = $vehicle->getId();
        $model = $vehicle->getModel();
        $year = $vehicle->getYear();
        $price = $vehicle->getPrice();
        $stock = $vehicle->getStock();
        $image = $vehicle->getImage();
        $description = $vehicle->getDescription();
        ?>

        <div id="main-header">Edit Vehicle Details</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/vehicle/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Model</strong><br>
                <input name="model" type="text" size="100" value="<?= $model ?>" required autofocus></p>
            <p><strong>Year</strong>: <input name="year" type="text" value="<?= $year ?>" required=""></p>
            <p><strong>Price</strong>: <input name="price" type="text" value="<?= $price ?>" required=""></p>
            <p><strong>Stock</strong>: <br>
                <input name="stock" type="text" size="40" value="<?= $stock ?>" required=""></p>
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>"></p>
            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?= $description ?></textarea></p>
            <input type="submit" name="action" value="Update Vehicle">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/vehicle/detail/" . $id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
}