<?php

include_once 'getClass.php';

class FormatResume extends Resume {
    

public function LocationFormatted() {
	$Items = [];
	foreach ($this->Location as $key => $value) {
		$Items[] = "<b>" . $key . "</b>" . ": " . $value;
	}
	return implode(" | ",$Items);
}

public function EducationFormatted() {
	foreach ($this->Education as $education) {
		list($array,$title) = $this->titleMaker($education,null,"Name");
		$output = $this->generalFormatter($array,$title);
		$outputArray[] = $output;
	}
	return implode($outputArray);
}

public function WorkFormatted() {
	foreach ($this->Experience as $experience) {
		list($array,$title) = $this->titleMaker($experience,"CompanyInfo","Name");
		$output = $this->generalFormatter($array,$title);
	}
	return $output;
}

public function SkillsFormatted() {
	$output = $this->generalFormatter($this->Skills,null);	
	return $output;
}

public function titleMaker($masterArray,$subArray,$titleKey) {
	if (isset($subArray)) {
		$Title = $masterArray[$subArray][$titleKey];
		unset($masterArray[$subArray][$titleKey]);
	} else {
		$Title = $masterArray[$titleKey];
		unset($masterArray[$titleKey]);
	}
	return [$masterArray, $Title];
}

public function generalFormatter($array, $title) {
	$fullInfo = "";
	$fullInfo .= "<h3 class='headerUnderlined'>" . $title . "</h3>";
	$fullInfo .= "<ul>";
		foreach ($array as $key => $value) {
			if (isset($value)) {
				$fullInfo .= "<li>";
				if (! is_int($key)) {$fullInfo .= "<h4>" . $key . "</h4>";}
				if (is_array($value)) {
					$fullInfo .= "<ul>";
					foreach ($value as $v) {
						$fullInfo .= "<li>" . $v . "</li>";
					}
					$fullInfo .= "</ul>";
				} 
				else {
					$fullInfo .= "<p>" . $value . "</p>";
				}
				$fullInfo .= "</li>";
			}
		}
		$fullInfo .= "</ul>";
		return $fullInfo;
}

}