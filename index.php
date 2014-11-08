<?php

require('getClass.php');
require('viewEngine.php');
require('formatClass.php');

$Display = new viewEngine('temp1.php'); 

$Resume = new HTMLResume (array (
	"Name" => "Roger Parker",
	"Tele" => "792-882-4431",
	"Location" => array('Country' => 'United States' , 'State' => 'Texas' , 'City' => 'Fort Worth' , 'Address' => '15 Long Blvd'),
	"Education" =>array(
				 array("Name" => 'Fairfield High School','YearsOfAttendance' => '2010-2014' , 'Activities' => array('Hockey','Lacrosse','Student Council')),
				 array("Name" => 'University of Miami','YearsOfAttendance' => '2014-2018','Activities' => array('Computer club','Ultimate Frisbee'), "Major" => 'Computer Science', "Degree" => "Masters")),
	"WorkExperience" =>array( 
		array("YearsOfEmployment" => "2005-Present" , "Position" => "Lead Software Engineer" , "JobDescription" => "Program various aplications and websites." , "CompanyInfo" => array("Name" => "IRC of USA" , "Telephone" => "554-223-4342")),
		),
	"Skills" => array(
	 array("Web Development (PHP Object Oriented)" , "Database Management (MYSQL and MYSQLI)")
	 )
	)
);

$Display->attach("Name", $Resume->getName());
$Display->attach("Tele", $Resume->getTele());
$Display->attach("Location", $Resume->LocationFormatted());
$Display->attach("Education", $Resume->EducationFormatted());
$Display->attach("Work", $Resume->WorkFormatted());
$Display->attach("Skills", $Resume->SkillsFormatted());
echo $Display->view();







