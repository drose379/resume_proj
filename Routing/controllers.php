<?php

require "View/viewEngine.php";

class controllers {
	
//THIS CONTROLLER SHOULD CHECK FOR POST AND SEND THE POST DATA OFF TO ANOTHER METHOD. MAKE A METHOD INSIDE THIS CLASS TO HANDLE POST. EX.) $THIS->METHOD.
public static function newResume() {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $viewEngine = new viewEngine('View/formTemplate.php');
        echo $viewEngine->view();
    }
    else {
        self::formatResume();
    }
}
    
public static function formatResume() {
   echo "Post is submitted guy"; 
}
    
}