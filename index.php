<?php

define('BASEPATH',''); //Leave the basepath as blank because it is already defined in the .htaccess.

require 'Routing/router.php';

$router = new Router;

$route = $_SERVER["PATH_INFO"] . "/";

$router->run($route);

/*
* Testing autoloader on autoload.php
* Require autoloader file before anything else on idex.
*/