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
</body>
</html>
HTML;

return $HTML;