<?php

#require "View/viewEngine.php";
#require 'getClass.php';
#require 'formatClass.php';
#require 'Database/insertClass.php';

namespace drose379\Routing;

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
    
public static function submitResume() {
    $Resume = new FormatResume($_POST);
    $viewEngine = new viewEngine('View/resumeTemplate.php');
    $viewEngine->attach("resumeObject" , $Resume);
    echo $viewEngine->view();
    #Save the resume to DB
    self::saveResume($Resume);
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
    
public function saveResume($Resume) {
    $Insert = new insertClass($this->getConnection());
    $Insert->Save($Resume);
}
    
}