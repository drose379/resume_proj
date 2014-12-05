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

#================================================================================================================================
//Regex Explanation: # === delemeter, ^ === start of string , / === a slash at the end of the pattern ? === makes the slash optional , $ === end of string , # === ending delemeter , i === case insensitive. Overview: If the pattern is inside the $url either with or without a trailing slash, pass. $matches gives an array of which part of the haystack matches the needle. ?<> to specify a sub-pattern in the pattern.
#================================================================================================================================

#require 'Routing/controllers.php';

namespace drose379\Routing;

class router {
	
protected $routes = ["/" => ["controllers","newResume"], "/resume/new" => ["controllers","saveResume"] ];    

public function match($url) {
    foreach ($this->routes as $pattern => $action) {
        if (preg_match("#^$pattern/?$#i",$url,$matches)) {
            return [$action,$matches];
        }
    }
}
    
public function run($url) {
    list($action,$matches) = $this->match($url);
    $action($matches);
}
    
}