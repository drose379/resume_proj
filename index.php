<?php

require('getClass.php');
require('viewEngine.php');

$Display = new viewEngine('temp1.php'); 

$resume = new Resume (array (
	"Name" => "Roger",
	"Tele" => "792-882-4431",
	"Location" => array('Country' => 'United States' , 'State' => 'Texas' , 'City' => 'Fort Worth' , 'Address' => '15 Long Blvd'),
	"Education" => array('Years of Attendance' => '2010-2014' , 'Activities' => array('Hockey','Lacrosse','Student Council'), "Further Education" => array("College" => "University of Miami", "Major" => "Comp Sci", "Degree" => "Masters" )),
	"Work Experience" => array("Years of Employment" => "2005-Present" , "Position" => "Lead Software Engineer" , "Job Description" => "Program various aplications and websites." , "Company Info" => array("Name" => "IRC Software" , "Telephone" => "554-223-4342")),
	"Skills" => array("Web Development (PHP Object Oriented)" , "Database Management (MYSQL and MYSQLI)")
	)
);

$Display->attach("Test", "Hello world");
$Display->view();







