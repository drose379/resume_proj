<?php

require ('getClass.php');
require ('viewEngine.php');
require ('formatClass.php');
require ('redirectClass.php');
require ('insertClass.php');

$Redirect = new redirect;

//if (empty($_POST)){
	echo "hello";
//}

try {
	$dbc = new PDO('mysql:host=localhost;dbname=resumesystem','root','root');
}
catch (Exception $conEx) {
	echo $conex->getMessage();
}

$Display = new viewEngine('temp1.php'); 
$Resume = new FormatResume ($_POST);
$Insert = new insertClass($dbc)

$Display->attach("Name", $Resume->getName());
$Display->attach("Tele", $Resume->getTele());
$Display->attach("Location", $Resume->LocationFormatted());
$Display->attach("Education", $Resume->EducationFormatted());
$Display->attach("Work", $Resume->WorkFormatted());
$Display->attach("Skills", $Resume->SkillsFormatted());
echo $Display->view();







