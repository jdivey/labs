<?php
/**
 * Author: Jacob Ivey
 * Date: 11/18/2019
 * File: vehicle_index_view.class.php
 * Description:
 */

class VehicleIndexView
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
        <!--
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/book/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search books by title" autocomplete="off">
                <input type="submit" value="Go"/>
            </form>
            <div id="suggestionDiv"></div>
        </div> -->
        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();
    }
}