<?php

require('getClass.php');
require('viewEngine.php');
require('formatClass.php');




$Display = new viewEngine('temp1.php'); 

$Resume = new FormatResume ($_POST);

$Display->attach("Name", $Resume->getName());
$Display->attach("Tele", $Resume->getTele());
$Display->attach("Location", $Resume->LocationFormatted());
$Display->attach("Education", $Resume->EducationFormatted());
$Display->attach("Work", $Resume->WorkFormatted());
$Display->attach("Skills", $Resume->SkillsFormatted());
echo $Display->view();







