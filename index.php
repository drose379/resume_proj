<?php

require('getClass.php');
require('viewEngine.php');
require('asHTMLclass.php');

$Display = new viewEngine('temp1.php'); 

$Resume = new HTMLResume (array (
	"Name" => "Roger",
	"Tele" => "792-882-4431",
	"Location" => array('Country' => 'United States' , 'State' => 'Texas' , 'City' => 'Fort Worth' , 'Address' => '15 Long Blvd'),
	"Education" =>array(
				 array("Name" => 'X High School','YearsOfAttendance' => '2010-2014' , 'Activities' => array('Hockey','Lacrosse','Student Council')),
				 array("Name" => 'University of Miami','YearsOfAttendance' => '2014-2018','Activities' => array('Computer club','Ultimate Frisbee'), "Major" => 'Computer Science', "Degree" => "Masters")),
	"Work Experience" => array("YearsOfEmployment" => "2005-Present" , "Position" => "Lead Software Engineer" , "JobDescription" => "Program various aplications and websites." , "CompanyInfo" => array("Name" => "IRC Software" , "Telephone" => "554-223-4342")),
	"Skills" => array("Web Development (PHP Object Oriented)" , "Database Management (MYSQL and MYSQLI)")
	)
);

$Display->attach("Name",$Resume->getName());
$Display->attach("Location",$Resume->LocationFormatted());
echo $Display->view();







