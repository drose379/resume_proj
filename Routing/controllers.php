<?php

require "View/viewEngine.php";
require 'getClass.php';
require 'formatClass.php';
require 'Database/insertClass.php';

class controllers {
    
protected $PDOconnect;
	
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
    
public function setConnection() {
    $this->PDOconnect = new PDO ('mysql:host=localhost;dbname=resumesystem','root','root');
}
    
public function getConnection() {
    if (! $this->PDOconnect instanceof PDO) {
        $this->setConnection();   
    }
    return $this->PDOconnect;
}
    
public static function saveResume() {
    echo "Reached SaveResume()";
    //Call the PDO setter to create the connection to pass.
    //Create a new DB save class object and use it with $_POST array.
    //Grab the last insert id and tell the user their resumes ID number.
    //Save method must be passed a $RESUME object.
    $Resume = new Resume($_POST);
    $Insert = new insertClass($this->getConnection());
    $Insert->Save($Resume);
}
    
}