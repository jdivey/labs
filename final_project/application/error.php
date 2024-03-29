<?php
/**
 * Author: Jacob Ivey
 * Date: 11/18/2019
 * File: error.php
 * Description:
 */

$page_title = "Error";
//display header
IndexView::displayHeader($page_title);

?>
    <div id = "main-header">Error</div>
    <hr>
    <table style = "width: 100%; border: none">
        <tr>
           <td style = "vertical-align: middle; text-align: center; width:100px">
               <img src = '<?= BASE_URL ?>/www/img/error.jpg' style = "width: 80px; border: none"/>
            </td>
            <td style = "text-align: left; vertical-align: top;">
                <h3> Sorry, but an error has occurred.</h3>
                <div style = "color: red">
                    <?= urldecode($message)
                    ?>
                </div>
                <br>
            </td>
        </tr>
    </table>
    <br><br><br><br><hr>
    <a href="<?= BASE_URL ?>/vehicle/index">Back to vehicle list</a>

<?php
//display footer
IndexView::displayFooter();