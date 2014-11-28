<?php

require 'Routing/router.php';

$router = new Router;

$route = $_SERVER["PATH_INFO"] . "/";

echo $route;