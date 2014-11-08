<?php

include_once 'getClass.php';

class HTMLResume extends Resume {

protected $Experience;

public function LocationFormatted() {
	$Items = [];
	foreach ($this->Location as $key => $value) {
		$Items[] = "<b>" . $key . "</b>" . ": " . $value;
	}
	return implode(" | ",$Items);
}

public function EducationFormatted() {
	$fullInfo = "";
	foreach ($this->Education as $education) {
		$fullInfo .= "<h3 class='headerUnderlined'>" . $education["Name"] . "</h3>";
		$fullInfo .= "<ul>";
		unset($education["Name"]);
	foreach ($education as $key => $value) {
		if (isset($value)) {
			$fullInfo .= "<li>";
			$fullInfo .= "<h4>" . $key . "</h4>";
			if (is_array($value)) {
					$fullInfo .= "<ul>";
				foreach($value as $v) {
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
	}
		$fullInfo .= "</ul>";
	}
	return $fullInfo;	
}


public function WorkFormatted() {
	foreach ($this->Experience as $experience) {
		$this->titleMaker($experience,"CompanyInfo","Name");
	}
	return $this->Experience;
}

public function titleMaker($masterArray,$subArray,$titleKey) {
	if (isset($subArray)) {
		$Title = $masterArray[$subArray][$titleKey];
		unset($masterArray[$subArray][$titleKey]);
	}
	$this->generalFormatter($masterArray,$Title);
}

public function generalFormatter($array, $title) {
	$this->Experience = $title;
	var_dump($array);
}

}