<?php

$HTML = <<< HTML
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='temp_1.css' />
</head>
<body>
<h3 class='centerHeading'>$Name</h3>
<h3 class='centerHeading'>$Tele</h3>
<p class='location'><i>Location: </i>$Location</p>

<h2>Education</h2>
$Education
<h2>Work Experience</h2>
$Work
<h2>Special Skills</h2>
$Skills

</body>
</html>
HTML;

return $HTML;