<?php

require('getClass.php');
require('viewEngine.php');

$Display = new viewEngine('temp1.php'); 

$Resume = new Resume (array (
	"Name" => "Roger",
	"Tele" => "792-882-4431",
	"Location" => array('Country' => 'United States' , 'State' => 'Texas' , 'City' => 'Fort Worth' , 'Address' => '15 Long Blvd'),
	"Education" => array('YearsOfAttendance' => '2010-2014' , 'Activities' => array('Hockey','Lacrosse','Student Council'), "FurtherEducation" => array("College" => "University of Miami", "Major" => "Comp Sci", "Degree" => "Masters" )),
	"Work Experience" => array("YearsOfEmployment" => "2005-Present" , "Position" => "Lead Software Engineer" , "JobDescription" => "Program various aplications and websites." , "CompanyInfo" => array("Name" => "IRC Software" , "Telephone" => "554-223-4342")),
	"Skills" => array("Web Development (PHP Object Oriented)" , "Database Management (MYSQL and MYSQLI)")
	)
);

$Display->attach("LocationInfo",$Resume->getLocation());
$Display->attach("EducationInfo", $Resume->getEducation());
$Display->attach("Experience",$Resume->getExperience());
$Display->attach("Skills",$Resume->getSkills());
echo $Display->view();







