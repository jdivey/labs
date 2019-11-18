<?php

/*
 * Author: Victor Gonzalez
 * Date: 11/6/2019
 * Name: index.php
 * Description: Homepage, retrieves an action and calls the appropriate method.
 */

//include code in vendor/autoload.php file
require_once("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//add your code below this line to complete this file
$action = "index";

//retrieve value of action from querystring variable
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
}

//invoke appropriate method depending on the action value
if ($action == "index") {
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
    $user_controller->getError($message);

} else {
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        $message = $_GET['error'];
    }

    $user_controller->getError($message);

}else{
    $message = "Invalid action was requested";
    $user_controller->error($message);
}

