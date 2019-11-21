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