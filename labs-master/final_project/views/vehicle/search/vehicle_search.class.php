<?php
/**
 * Author: Jacob Ivey
 * Date: 11/25/2019
 * File: vehicle_search.class.php
 * Description:
 */

class VehicleSearch extends VehicleIndexView
{
    /*
    * the displays accepts an array of movie objects and displays
    * them in a grid.
    */

    public function display($terms, $vehicles) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($vehicles)) ? "( 0 - 0 )" : "( 1 - " . count($vehicles) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($vehicles === 0) {
                echo "No vehicle was found.<br><br><br><br><br>";
            } else {
                //display movies in a grid; six movies per row
                foreach ($vehicles as $i => $vehicle) {
                    $id = $vehicle->getId();
                    $model = $vehicle->getModel();
                    $year = $vehicle->getYear();
                    $image = $vehicle->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . VEHICLE_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='" . BASE_URL . "/vehicle/detail/$id'><img src='" . $image .
                        "'></a><span>$model<br>Year $year<br>" .  "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($vehicles) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/vehicle/index">Go to vehicle list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}