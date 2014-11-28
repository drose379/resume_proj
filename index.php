<?php

//?
define('BASEPATH','/oop_prac/resume_proj/index.php');
//?

require 'Routing/router.php';

$router = new Router;

$route = $_SERVER["PATH_INFO"] . "/";

$router->run($route);