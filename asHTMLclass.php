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
	foreach ($education as $key => $value) {
		if (isset($value)) {
			$outerLoop[] = $key;
		}
		if (is_array($value)) {
			foreach ($value as $v) {
				$innerLoop[] = $v;
			}
		}
		else {
			$innerLoop[] = $value;
		}
	}
	}
	
	return implode($outerLoop);
}


}