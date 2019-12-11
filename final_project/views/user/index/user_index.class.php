<?php
/**
 * Author: Jacob Ivey
 * Date: 11/18/2019
 * File: user_index.class.php
 * Description:
 */

class UserIndex extends VehicleIndexView
{
    /*
     * the display method accepts an array of vehicle objects and displays
     * them in a grid.
     */

    public function display($users) {
        //display page header
        parent::displayHeader("List All Users");
        ?>
        <div style="font-size: larger" id="main-header"> Current Users </div>

        <div style="font-size: 30px" class="grid-container" style="align-content: center">
            <?php
            if ($users === 0) {
                echo "No user was found.<br><br><br><br><br>";
            } else {
                //display vehicles in a grid; six vehicles per row
                foreach ($users as $i => $user) {
                    $username = $user->getUsername();
                    $password = $user->getPassword();
                    $email = $user->getEmail();
                    $firstname = $user->getFirstName();
                    $lastname = $user->getLastName();
                    $role = $user->getRole();

                    echo "<div class='col'><p><a href='", BASE_URL, "/user/detail/'>
                        <br></a><span><br>Username:$username<br>Password:$password<br>Email: $email<br>Firstname:$firstname<br>Lastname:$lastname<br>Role:$role<br><div id=\"button-group\">
          
            <input type=\"button\" id=\"delete-button\" value=\"   Delete  \"
                   onclick=\"window.location.href = '<?= BASE_URL ?>/user/delete/<?= $username  ?>'\">&nbsp;
        </div>". "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 3 == 2 || $i == count($users) - 1) {
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