<?php

/*
 * Author: your name
 * Date: today's date
 * Name: index.php
 * Description: short description about this file
 */

//include code in vendor/autoload.php file
require_once("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//add your code below this line to complete this file
$action = "action";

//retrieve value of action from querystring variable
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
}

//invoke appropriate method depending on the action value
if ($action == "action") {
    $user_controller->getIndex();
} elseif ($action == "register") {
    $user_controller->getRegister();
} elseif ($action == "login") {
    $user_controller->getLogin();
} elseif ($action = "verify") {
    $user_controller->getVerify();
} elseif ($action == "logout") {
    $user_controller->getLogout();
} elseif ($action == "reset") {
    $user_controller->getReset();
} elseif ($action == "do_reset") {
    $user_controller->getDoReset();
}elseif ($action == "error") {
    $user_controller->getError();

} else {

}