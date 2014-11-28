<?php

require "View/viewEngine.php";

class controllers {
	
public static function newResume() {
    $viewEngine = new viewEngine('View/formTemplate.php');
    $viewEngine->attach("test","Hello world");
    echo $viewEngine->view();
}
    
}