<?php

require "View/viewEngine.php";
require 'getClass.php';
require 'formatClass.php';

class controllers {
	
public static function newResume() {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $viewEngine = new viewEngine('View/formTemplate.php');
        echo $viewEngine->view();
    }
    else {
        self::viewResume();
    }
}
    
public static function viewResume() {
    //echo "Post is submitted guy";
    $Resume = new FormatResume($_POST);
    $viewEngine = new viewEngine('View/resumeTemplate.php');
    $viewEngine->attach("resumeObject" , $Resume);
    echo $viewEngine->view();
}
    
}