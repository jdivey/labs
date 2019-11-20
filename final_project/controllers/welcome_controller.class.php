<?php
/**
 * Author: Jacob Ivey
 * Date: 11/20/2019
 * File: welcome_controller.class.php
 * Description:
 */

class WelcomeController
{
    //put your code here
    public function index() {
        $view = new WelcomeIndex();
        $view->display();
    }
}