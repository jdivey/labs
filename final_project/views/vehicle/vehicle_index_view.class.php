<?php
/**
 * Author: Jacob Ivey
 * Date: 11/18/2019
 * File: vehicle_index_view.class.php
 * Description:
 */

class VehicleIndexView extends IndexView
{
    public static function displayHeader($model)
    {
        parent::displayHeader($model)
        ?>
        <script>
            //the object type
            var media = "vehicle";
        </script>
        <!--create the search bar -->

        <div id="searchbar">
        <form method="get" action="<?= BASE_URL ?>/vehicle/search">
               <input type="text" name="query-terms" id="searchtextbox" placeholder="Search vehicles by model" autocomplete="off">
                <input type="submit" value="Go"/>
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();
    }
}