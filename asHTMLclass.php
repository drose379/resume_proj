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
		$Names[] = "<h3>" . $education["Name"] . "</h3>";
	foreach ($education as $key => $value) {
		if ($key === "Name") {unset($key);}
		else {
		if (isset($value)) {
			$keys[] = $key;
			$Names[] = implode($keys);
			$keys = null;
		}
		}
	}
	}
	
	return implode($Names);
}


}