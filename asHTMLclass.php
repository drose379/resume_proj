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
	list($title,$array) = $this->titleMaker($experience,"CompanyInfo","Name");
	}
	//call generalFormatter	
}

public function titleMaker($masterArray,$subArray,$titleKey) {
	if (isset($subArray)) {
		$Title = $masterArray[$subArray][$titleKey];
		unset($masterArray[$subArray][$titleKey]);
	}
	return [$Title, $masterArray];
}

public function generalFormatter($array, $title) {

}

}