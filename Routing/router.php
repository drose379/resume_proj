<?php

//The router page should require the controller pages
//The controller pages will require the classes they need to use
//The classes that are called from the controller will have most of their methods inside a manager method (which will be static).
//So it can be called from the controller.

//Put all the formatClass methods into one large manager method, call that method from a controller, which will be called from the router.

//Router recieves request
//Matches the request up with an action
//Action is called and is passed the parameters (path-info)

//SHOWING AND SUBMITTING THE FORM SHOULD BE THE SAME ROUTE, INSIDE THE CONTROLLER THEY ARE SENT TO, CHECK IF POST DATA EXISTS AND DECIDE WHAT TO DO WITH IT.

require 'controllers.php';

class Router {
	
protected $routes = ["/" => ["controllers","newResume"], "/resume/new" => ["controllers","newResume"] ];    

public function match($url) {
    foreach ($this->routes as $pattern => $action) {
#================================================================================================================================
//Regex Explanation: # === delemeter, ^ === start of string , / === a slash at the end of the pattern ? === makes the slash optional , $ === end of string , # === ending delemeter , i === case insensitive. Overview: If the pattern is inside the $url either with or without a trailing slash, pass. $matches gives an array of which part of the haystack matches the needle. ?<> to specify a sub-pattern in the pattern.
#================================================================================================================================
        if (preg_match("#^$pattern/?$#i",$url,$matches)) {
            return [$action,$matches];
        }
    }
}
    
public function run($url) {
   // var_dump($url);
    list($action,$matches) = $this->match($url);
  //  var_dump($action);
    $action($matches);
}
    
}