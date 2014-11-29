<?php

$HTML = <<< HTML
<!DOCTYPE html>
<html>
<head>

</head>
<body>
{$resumeObject->getName()}
{$resumeObject->getTele()}
<br>
{$resumeObject->LocationFormatted()}
{$resumeObject->EducationFormatted()}
{$resumeObject->WorkFormatted()}
{$resumeObject->SkillsFormatted()}

<a href='/oop_prac/resume_proj/index.php/resume/save'><h4>Save this resume</h4></a>

</body>
</html>
HTML;

return $HTML;