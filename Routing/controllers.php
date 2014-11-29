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
    
public static function saveResume() {
    //Create a new DB save class object and use it with $_POST array.
    //Grab the last insert id and tell the user their resumes ID number.
    //Save method must be passed a $RESUME object.
    $Resume = new Resume($_POST);
    $Insert = new insertClass(/*PDO DB CONNECTION*/);
    $Insert->Save($Resume);
}
    
}