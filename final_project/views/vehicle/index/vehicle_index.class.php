<?php
/**
 * Author: Jacob Ivey
 * Date: 11/18/2019
 * File: vehicle_index.class.php
 * Description:
 */

class VehicleIndex extends VehicleIndexView
{
    /*
     * the display method accepts an array of vehicle objects and displays
     * them in a grid.
     */

    public function display($vehicles) {
        //display page header
        parent::displayHeader("List All Vehicles");
        ?>
        <div id="main-header"> Vehicles in the Library</div>

        <div class="grid-container">
            <?php
            if ($vehicles === 0) {
                echo "No vehicle was found.<br><br><br><br><br>";
            } else {
                //display vehicles in a grid; six vehicles per row
                foreach ($vehicles as $i => $vehicle) {
                    $id = $vehicle->getId();
                    $model = $vehicle->getModel();
                    $year = $vehicle->getYear();
                    $price = $vehicle->getPrice();
                    $image = $vehicle->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . BOOK_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/vehicle/detail/$id'><img src='" . $image .
                        "'></a><span>$model<br>Category $category<br>" . $publish_date->format('m-d-Y') . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($vehicle) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}