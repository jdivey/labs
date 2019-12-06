<?php
/**
 * Author: Jacob Ivey
 * Date: 11/20/2019
 * File: index_view.class.php
 * Description:
 */

class IndexView
{
    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel='shortcut icon' href='<?/*= BASE_URL */?>/www/img/favicon.ico' type='image/x-icon' />
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id='wrapper'>
        <div id="banner">
            <a href="<?= BASE_URL ?>/vehicle/index.php" style="text-decoration: none" title="Online Autostore">
               <div id="left">
                    <span style='color: #000; font-size: 36pt; font-weight: bold; vertical-align: top'>
                                    E-Auto Store
                                </span>
                    <div style='color: #000; font-size: 14pt; font-weight: bold'>Buy your next vehicle online!</div>
                </div>
            </a>
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
       <div id="footer"><br>&copy 2019 E-Autostore. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}