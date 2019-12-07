<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: index.php
 * Description:
 */
//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();

//create an object of UserController
$user_controller = new UserController();

//retrieve the action from a querystring variable named "action"
if (!($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING))) {
    $action = "index";  //default action
}

//take different action depending on the action value
switch ($action) {
    case "index":
        $user_controller->index();
        break;
    case "register":
        $user_controller->register();
        break;
    case "do_register":
        $user_controller->do_register();
        break;
    case "login":
        $user_controller->login();
        break;
    case "verify":
        $user_controller->verify();
        break;
    case "logout":
        $user_controller->logout();
        break;
    case "reset":
        $user_controller->reset();
        break;
    case "do_reset":
        $user_controller->do_reset();
        break;
    default:
        $user_controller->error("Invalid action was requested.");
}