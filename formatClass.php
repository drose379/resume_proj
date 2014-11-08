<?php

include_once 'getClass.php';

class HTMLResume extends Resume {


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
		list($output) = $this->generalFormatter($array,$title);
		$outputArray[] = $output;
	}
	return implode($outputArray);
}

public function WorkFormatted() {
	foreach ($this->Experience as $experience) {
		list($array,$title) = $this->titleMaker($experience,"CompanyInfo","Name");
		list($output) = $this->generalFormatter($array,$title);
	}
	return $output;
}

public function SkillsFormatted() {
	foreach ($this->Skills as $skills) {
		list($output) = $this->generalFormatter($skills,null);	
	}
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
		foreach ($array as $key => $value) {
			$fullInfo .= "<ul>";
			if (isset($value)) {
				$fullInfo .= "<li>";
				$fullInfo .= "<h4>" . $key . "</h4>";
				if (is_array($value)) {
					$fullInfo .= "<ul>";
					foreach ($value as $v) {
						$fullInfo .= "<li>" . $v . "</li>";
					}
					$fullInfo .= "</ul>";
				} 
				else {
					$fullInfo .= "<ul>";
					$fullInfo .= "<li>" . $value . "</li>";
					$fullInfo .= "</ul>";
				}
			}
			$fullInfo .= "</ul>";
		}
		return [$fullInfo];
}

}