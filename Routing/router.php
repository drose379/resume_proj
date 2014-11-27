<?php

//The router page should require the controller pages
//The controller pages will require the classes they need to use
//The classes that are called from the controller will have most of their methods inside a manager method (which will be static).
//So it can be called from the controller.

//Put all the formatClass methods into one large manager method, call that method from a controller, which will be called from the router.

//Router recieves request
//Matches the request up with an action
//Action is called and is passed the parameters (path-info)


class Router {
	
}