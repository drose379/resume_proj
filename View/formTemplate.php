<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action='$BasePath/resume/new' method="POST">
	<h4>General Info</h4>
	Name: <input type='text' name="Name" />
	Telephone Number: <input type='text' name='Tele' />
	<h4>Location:</h4>
	Country: <input type="text" name="Location[Country]" />
	State: <input type="text" name="Location[State]" />
	City: <input type="text" name="Location[City]" />
	Address: <input type="text" name="Location[Address]" />
	<h4>Educational History</h4>
	School: <input type='text' name='Education[0][Name]' />
	Years Of Attendance: <input type='text' name='Education[0][YearsOfAttendance]' />
	Activities: <input type='text' name='Education[0][Activities][]' />
	<h4>Further Education (<i>Optional</i>)</h4>
	School: <input type='text' name='Education[1][Name]' />
	Years Of Attendance: <input type='text' name='Education[1][YearsOfAttendance]' />
	Activities: <input type='text' name='Education[1][Activities][]' />
	Major: <input type='text' name='Education[1][Major]' />
	Degree: <input type='text' name='Education[1][Degree]' />
	<h4>Work Experience</h4>
	Years of Employment: <input type='text' name='WorkExperience[0][YearsOfEmployment]' />
	Position : <input type='text' name='WorkExperience[0][Position]' />
	Brief Job Description <i>150 Chars or less</i>: <textarea name='WorkExperience[0][JobDescription]'></textarea>
	<br>
	<b>Company Info</b>: <i>Name</i> : <input type='text' name='WorkExperience[0][CompanyInfo][Name]' />
	<i>Telephone</i> <input type='text' name='WorkExperience[0][CompanyInfo][Telephone]' />
	<h4>Skills</h4>
	1: <input type='text' name='Skills[]' />
	<br>
	<input type='submit' />
</form>

</body>
</html>
HTML;

return $HTML;